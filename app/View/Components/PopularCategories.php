<?php

namespace App\View\Components;

use App\Models\Entities\Blog as BlogModal;
use App\Models\Entities\Category;
use App\Models\Entities\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PopularCategories extends Component
{
    /**
     * Create a new component instance.
     */
    public $categories;

    public function __construct()
    {
        $this->categories = Category::status()->where('popular',1)->orderBy('order','ASC')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('site.pages.home.components.popular-categories');
    }
}
