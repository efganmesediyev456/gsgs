<?php

namespace App\View\Components;

use App\Models\Entities\Brend as BrendModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Brend extends Component
{
    /**
     * Create a new component instance.
     */
    public $brends;

    public function __construct()
    {
        $this->brends = BrendModel::status()->orderBy('order')->get()->take(20);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('site.pages.home.components.brend');
    }
}
