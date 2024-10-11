<?php

namespace App\View\Components;

use App\Models\Entities\Advertisement as AdvertisementModal;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Advertisement extends Component
{
    /**
     * Create a new component instance.
     */
    public $advertisements;

    public function __construct()
    {
        $this->advertisements = AdvertisementModal::status()->orderBy('order')->get()->take(4);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('site.pages.home.components.advertisement');
    }
}
