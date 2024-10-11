<?php

namespace App\Http\Controllers\Gopanel\Entities;

use App\Helpers\FileUploadHelper;
use App\Http\Controllers\Gopanel\GopanelController;
use App\Models\Entities\Blog;
use App\Models\Entities\Brend;
use App\Models\Entities\Category;
use App\Models\Entities\Parameter;
use App\Models\Entities\Product;
use Illuminate\Http\Request;

class ProductController extends GopanelController
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        return view('gopanel.pages.productslist.index');
    }

    public function updateOrSave(Product $item)
    {
//        $this->checkPermission($item,'features.update','features.store');

        try {
            if (is_null($item))
                $item = new Product();
            $route = route("gopanel.productslist.save", $item);
            $categories = Category::all();
            $brends      = Brend::all();
            $parameters   = Parameter::whereNull('parent_id')->get();
        } catch (\Exception $e) {
            $this->response['message']   .= $e->getMessage();
            return $this->response_json();
        }
        return view('gopanel.pages.productslist.save', compact('item','route', 'categories', 'brends', 'parameters'));
    }


    public function save(Product $item, Request $request)
    {
//        $this->checkPermission($item,'features.update','features.store');


        try {
            $data = $request->except(['_token']);
            if (!is_null($item)) {
                $message    = "Məlumat uğurla dəyişdirildi!";
            } else {
                $message    = "Məlumat uğurla yaradıldı!";
            }
            if ($request->hasFile('image')){
                $data['image'] = FileUploadHelper::uploadFile($request->file('image'), "products");
            }
            $item->sku  = $request->sku;
            $item       = $this->service->save($item, $data);
            if ($request->has('categories')) {
                $item->categories()->sync($request->categories);
            }
            if ($request->has('parameters')) {
                $item->parameters()->sync($request->parameters);
            }
            $this->createTranslations($item, $request);
            $this->success_response($item, $message);
        } catch (\Exception $e) {
            $this->response['message']   .= $e->getMessage();
        }
        return $this->response_json();
    }
}
