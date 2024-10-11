<?php

namespace App\View\Components;

use App\Models\Entities\Blog as BlogModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlogTrend extends Component
{
    /**
     * Create a new component instance.
     */
    public $blogs;

    public function __construct()
    {
        $this->blogs = BlogModel::status()->orderBy('view','desc')->get()->take(5);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('site.pages.blog.components.blog-trend');
    }
}
