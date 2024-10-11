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
        $items  = Product::status()->latest()->get();
        return view('site.pages.product.index', compact('items'));

    }

}
