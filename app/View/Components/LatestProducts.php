<?php

namespace App\View\Components;

use App\Models\Entities\Blog as BlogModal;
use App\Models\Entities\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LatestProducts extends Component
{
    /**
     * Create a new component instance.
     */
    public $products;

    public function __construct()
    {
        $this->products = Product::whereStatus(1)->latest()->get()->shuffle()->take(30);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('site.pages.home.components.latest_products');
    }
}
