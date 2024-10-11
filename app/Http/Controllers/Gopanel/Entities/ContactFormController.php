<?php

namespace App\Http\Controllers\Gopanel\Entities;

use App\Helpers\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gopanel\GopanelController;
use App\Models\Entities\Feature;
use App\Models\Entities\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ContactFormController extends GopanelController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('gopanel.pages.contactforms.index');

    }
}
