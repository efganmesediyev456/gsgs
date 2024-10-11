<?php

namespace App\View\Components;

use App\Models\Entities\Slider;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Entities\Feature as FeatureModal;

class Feature extends Component
{
    /**
     * Create a new component instance.
     */
    public $features;

    public function __construct()
    {
        $this->features = FeatureModal::status()->orderBy('order')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('site.pages.home.components.feature');
    }
}
