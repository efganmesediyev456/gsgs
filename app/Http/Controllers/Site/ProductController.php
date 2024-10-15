<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Entities\Blog;
use App\Models\Entities\Brend;
use App\Models\Entities\Category;
use App\Models\Entities\Feature as FeatureModal;
use App\Models\Entities\Menu;
use App\Models\Entities\Parameter;
use App\Models\Entities\Partner as PartnerModal;
use App\Models\Entities\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use function Psy\debug;

class ProductController extends Controller
{
    public function index(Request $request, $language = null, $category = null)
    {
        $orderby                   = $request->get('filter');
        $limit                     = $request->get('limit');
        $seo                       = Menu::status()->whereSlug('products')->latest()->first();
        $filter                    = $request->get('filter', null);
        $brend_id                  = $request->brend;
        $parameters                = $request->parameter;
        $min                       = $request->min ?? 0;
        $max                       = $request->max ?? 1000;
        $latest_products           = Product::status()->latest()->get()->take(3);
        $search                    = $request->search;
        $selectedParametersParent  = [];
        $items                     = $this->getProducts();
        if(is_null($category)) {
            $category = $request->get("category");
        }
        $items                     = $this->priceFilter($items,$min, $max);
        if($search){
            $items                 = $this->searchFilter($items,$search);
        }
        if($parameters)
            $selectedParametersParent=Parameter::whereIn('id', $parameters)->pluck('parent_id')->toArray();

        if($filter){
            $items                 = $this->productsSort($items,$filter);
        }
        if($category){
            $items                 = $this->categoryFilter($items,$category);
            $category              = Category::whereSlug($category)->first();
            $seo                   = $category;
        }
        if($brend_id){
           $items                  = $this->brendFilter($items,$brend_id);
        }

        if ($parameters && is_array($parameters) && count($parameters)) {
            $items = $this->parameterFilter($items,$parameters);
        }
        $items                     = $items->get();
        $brends                    = $items->pluck('brend')->unique()->filter();
        $parameters = $items->flatMap(function ($item) {
             return $item->parameters->whereNull('deleted_at');
        })->unique();
        $perPage                   = $limit;

        if($perPage!='all' and $perPage!=''){
            $currentPage               = LengthAwarePaginator::resolveCurrentPage();
            $currentItems              = $items->slice(($currentPage - 1) * $perPage, $perPage)->all();
            $items = new LengthAwarePaginator($currentItems, $items->count(), $perPage, $currentPage, [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'query' => $request->query()
            ]);
        }
        $categories = Category::all();
        return view('site.pages.product.index', compact('items', 'categories', 'seo', 'orderby', 'brends', 'category','parameters', 'selectedParametersParent', 'limit', 'latest_products'));
    }

    public function single ($lang,$slug)
    {

        $item          = Product::whereStatus(1)->whereSlug($slug)->firstOrFail();
        $seo           = $item;
        $item->view    = $item->view+1;
        $item->save();
        $items         = Product::status()->orderBy("id")->paginate(6);
        $moreproducts  = Product::status()->orderBy("id")->get()->take(12);
        return view('site.pages.product.single', compact('item', 'items', 'moreproducts', 'seo'));
    }

    public function filter(Request $request)
    {
        $limit            = $request->get('limit');
        $brend            = Brend::find($request->get('brend'));
        $orderby          = $request->get('filter');
        $products         = Product::status();
        $min              = $request->min;
        $max              = $request->max;
        $selectedBrend    = $brend;
        $category_id      = $request->category_id;
        $category         = Category::find($category_id);
        $parameters       = $request->parameter;
        $selectedParameters  = $request->parameter;
        $selectedParametersParent = collect();
        if($selectedParameters)
            $selectedParametersParent=Parameter::whereIn('id', $selectedParameters)->pluck('parent_id');

        if ($brend) {
            $products = $products->where('brend_id', $brend->id);
        }



        if ($parameters && is_array($parameters) && count($parameters)) {
            $products = $products->whereHas('parameters', function ($query) use ($parameters) {
                $query->whereIn('parameter_id', $parameters)
                    ->groupBy('product_id')
                    ->havingRaw('COUNT(DISTINCT parameter_id) = ?', [count($parameters)]);
            });
        }

        $products = $products->where(function ($query) use ($min, $max) {
            $query->whereBetween('price', [$min, $max]);
            if(!$min) {
                $query->orWhereNull('price');
            }
        });

        if($category_id){
            $products = $products->whereHas('categories',function ($item) use ($category) {
                return $item->where('category_id', $category->id);
            });
        }


        $products = $products->get();

        $brends     = $products->pluck('brend')->unique()->filter();
        $parameters = $products->flatMap(function ($item) {
            return $item->parameters->whereNull('deleted_at');
        })->unique();

        $perPage     = $limit;
        if($perPage!='all' and $perPage!=''){
            $currentPage               = LengthAwarePaginator::resolveCurrentPage();
            $currentItems              = $products->slice(($currentPage - 1) * $perPage, $perPage)->all();
            $items = new LengthAwarePaginator($currentItems, $products->count(), $perPage, $currentPage, [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'query' => $request->query()
            ]);
            $items->setPath(url(app()->getLocale().'/products'));
            if($category_id){
                $items->setPath(url(app()->getLocale().'/category/'.$category->slug));
            }
        }else{
            $items = $products;
        }

        $brendView = view('site.pages.product.filter.brend', compact('brends', 'selectedBrend'))->render();
        $productView = view('site.pages.product.filter.products', compact('items', 'orderby', 'limit'))->render();
        $parametrView = view('site.pages.product.filter.parameters', compact('parameters','selectedParameters', 'selectedParametersParent'))->render();

        $queryParams = http_build_query($request->except('page', 'category_id'));
        $newUrl = url(app()->getLocale() . '/products?' . $queryParams);
        if($category_id){
            $newUrl = url(app()->getLocale() . '/category/'.$category->slug.'?'. $queryParams);
        }
        return response()->json([
            'brend'=>$brendView,
            'products'=>$productView,
            'parameters'=>$parametrView,
            'url' => $newUrl
        ]);
    }

    public function category(Request $request, $language = null, $category = null)
    {
        $orderby                   = $request->get('filter');
        $limit                     = $request->get('limit');
        $seo                       = Menu::status()->whereSlug('products')->latest()->first();
        $filter                    = $request->get('filter', null);
        $brend_id                  = $request->brend;
        $parameters                = $request->parameter;
        $min                       = $request->min ?? 0;
        $max                       = $request->max ?? 1000;
        $latest_products           = Product::status()->latest()->get()->take(3);
        $search                    = $request->search;
        $selectedParametersParent  = [];
        if(is_null($category)) {
            $category = $request->get("category");
        }
        $items                     = $this->getProducts();
        $items                     = $this->priceFilter($items, $min, $max);
        if($search){
            $items                 = $this->searchFilter($items, $search);
        }
        if($parameters)
            $selectedParametersParent=Parameter::whereIn('id', $parameters)->pluck('parent_id')->toArray();

        if($filter){
            $items                 = $this->productsSort($items, $filter);
        }
        if($category){
            $items                 = $this->categoryFilter($items, $category);
            $category = Category::whereSlug($category)->first();
            $seo      = $category;
        }

        if($brend_id){
            $items                 = $this->brendFilter($items, $brend_id);
        }

        if ($parameters && is_array($parameters) && count($parameters)) {
            $items                 = $this->parameterFilter($items, $parameters);
        }
        $items                     = $items->get();
        $brends                    = $items->pluck('brend')->unique()->filter();
        $parameters = $items->flatMap(function ($item) {
            return $item->parameters->whereNull('deleted_at');
        })->unique();
        $perPage                   = $limit;

        if($perPage!='all' and $perPage!=''){
            $currentPage               = LengthAwarePaginator::resolveCurrentPage();
            $currentItems              = $items->slice(($currentPage - 1) * $perPage, $perPage)->all();
            $items = new LengthAwarePaginator($currentItems, $items->count(), $perPage, $currentPage, [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'query' => $request->query()
            ]);
        }
        $categories = Category::all();
        return view('site.pages.product.category', compact('items', 'categories', 'seo', 'orderby', 'brends', 'category','parameters', 'selectedParametersParent', 'limit', 'latest_products'));

    }


    public function getProducts($language = null)
    {
        $language = !is_null($language) ? $language : app()->getLocale();
        return Product::status()
            ->select('products.*','ft.value')
            ->leftJoin('field_translations as ft', function ($join) use ($language) {
                $join->on('products.id', '=', 'ft.model_id')
                    ->where('ft.model_type', Product::class)
                    ->where('ft.key', 'title')
                    ->where('ft.locale', $language);
            });
    }

    public function priceFilter($items, $min, $max)
    {
        $items = $items->where(function ($query) use ($min, $max) {
            $query->whereBetween('price', [$min, $max]);
            if(!$min) {
                $query->orWhereNull('price');
            }
        });
        return $items;
    }

    public function searchFilter($items, $search, $language = null)
    {
        $language = !is_null($language) ? $language : app()->getLocale();
        $items = $items->where(function ($query) use ($search, $items, $language) {
            $items->whereHas('translations', function ($query) use ($search, $language) {
                $query->where('value', 'like', '%' . $search . '%');
                $query->where('locale', $language);
                $query->where('key', 'title');
            });
        });
        return $items;
    }

    public function productsSort($items, $sort, $language = null)
    {
        $language = !is_null($language) ? $language : app()->getLocale();
        switch ($sort) {
            case 'filter_from_a_to_z':
                $items=$items->orderBy('value');
                break;

            case 'filter_from_z_to_a':
                $items=$items->orderBy('value', 'desc');
                break;

            case 'filter_from_low_to_high':
                $items = $items->orderBy('price');

                break;
            case 'filter_from_high_to_low':
                $items = $items->orderBy('order', 'desc');
                break;
            case 'filter_latest_date':
                $items = $items->orderBy('created_at', 'desc');
                break;
            default:
                $items = $items->orderBy('order');
                break;
        }
        return $items;
    }

    public function categoryFilter($items, $category)
    {
        $category = Category::whereSlug($category)->first();
        $items = $items->whereHas('categories',function ($item) use ($category) {
            return $item->where('category_id', $category->id);
        });
        return $items;
    }

    public function brendFilter($items, $brend_id)
    {
        $items = $items->whereHas("brend", function ($item) use ($brend_id) {
            return $item->where('brend_id', $brend_id);
        });
        return $items;
    }

    public function parameterFilter($items, $parameters)
    {
        $items->whereHas('parameters', function ($query) use ($parameters) {
            $query->whereIn('parameter_id', $parameters)
                ->groupBy('product_id')
                ->havingRaw('COUNT(DISTINCT parameter_id) = ?', [count($parameters)]);
        });
        return $items;
    }

}
