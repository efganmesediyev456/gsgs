<?php

namespace App\View\Components;

use App\Models\Entities\Blog as BlogModal;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Blog extends Component
{
    /**
     * Create a new component instance.
     */
    public $blogs;

    public function __construct()
    {
        $this->blogs = BlogModal::whereStatus(1)->orderBy('order')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('site.pages.home.components.blog');
    }
}
