<?php

namespace App\View\Components;

use App\Models\Entities\Feature as FeatureModal;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Entities\Discover as DiscoverModal;

class Discover extends Component
{
    /**
     * Create a new component instance.
     */
    public $discover;

    public function __construct()
    {
        $this->discover = DiscoverModal::status()->orderBy('order')->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('site.pages.home.components.discover');
    }
}
