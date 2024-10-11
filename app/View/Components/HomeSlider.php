<?php

namespace App\View\Components;

use App\Models\Entities\Slider;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HomeSlider extends Component
{
    /**
     * Create a new component instance.
     */
    public $sliders;
    public $statics;

    public function __construct()
    {
        $this->sliders = Slider::status()->where('static', 0)->orderBy('order')->get();
        $this->statics = Slider::status()->where('static', 1)->orderBy('order')->get()->take(2);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('site.pages.home.components.home-slider');
    }
}
