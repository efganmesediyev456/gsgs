<?php

namespace App\View\Components;

use App\Models\Entities\Brend as BrendModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Deal extends Component
{
    /**
     * Create a new component instance.
     */

    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('site.pages.home.components.deal');
    }
}
