<?php

namespace App\View\Components;

use App\Models\Entities\Blog;
use App\Models\Entities\Blog as BlogModal;
use App\Models\Entities\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PopularTags extends Component
{
    /**
     * Create a new component instance.
     */
    public $tags;

    public function __construct()
    {
        $latestBlogs = Blog::whereStatus(1)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
        $array       = [];
        foreach($latestBlogs as $latest){
            $array[] = $latest->tags;
        }
        $array       = array_filter($array);
        $this->tags  = implode(',', $array);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('site.pages.blog.components.popular-tags');
    }
}
