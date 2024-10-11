<?php

namespace App\Http\Controllers\Gopanel;

use App\Http\Controllers\Controller;
use App\Models\Entities\Language;
use App\Services\CommonService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

;

class GopanelController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new CommonService();
    }


    public function checkPermission($item, $update, $create)
    {
        if ($item->id) {
            if (!Gate::forUser(auth('admin')->user())->allows($update)) {
                abort(403, 'You do not have permission for this');
            }
        } else {
            if (!Gate::forUser(auth('admin')->user())->allows($create)) {
                abort(403, 'You do not have permission for this');
            }
        }
    }


    public function createTranslations($item, Request $request)
    {
        foreach (Language::all() as $lang){


            foreach($item->translatedAttributes as $key=>$transAttribute){
                $item->translations()->updateOrCreate(
                    ['locale' => $lang->locale, 'key' => $transAttribute],
                    ['value' => @$request?->$transAttribute[$lang->locale]]
                );
            }
        }
    }
}
