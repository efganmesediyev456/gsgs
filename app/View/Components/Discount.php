<?php

namespace App\View\Components;

use App\Models\Entities\Blog as BlogModal;
use App\Models\Entities\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Discount extends Component
{
    /**
     * Create a new component instance.
     */
    public $products;

    public function __construct()
    {
        $this->products = Product::whereStatus(1)->where('discount_view',1)->latest()->get()->take(30);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('site.pages.home.components.discount');
    }
}
