<?php

namespace App\View\Components;

use App\Models\Entities\BlogOffer as BlogOfferModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlogOffer extends Component
{
    /**
     * Create a new component instance.
     */
    public $offers;

    public function __construct()
    {
        $this->offers = BlogOfferModel::status()->orderBy('order')->get()->take(3);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('site.pages.home.components.blog-offer');
    }
}
