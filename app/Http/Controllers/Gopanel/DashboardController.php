<?php

namespace App\Http\Controllers\Gopanel;


class DashboardController extends GopanelController
{
    public function index()
    {
        return view('gopanel.pages.dashboard');
    }
}
