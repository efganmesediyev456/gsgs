<?php

namespace App\View\Components;

use App\Models\Entities\Partner as PartnerModal;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Partner extends Component
{
    /**
     * Create a new component instance.
     */
    public $partners;

    public function __construct()
    {
        $this->partners = PartnerModal::whereStatus(1)->orderBy('order')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('site.pages.home.components.partner');
    }
}
