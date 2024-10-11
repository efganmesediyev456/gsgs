<?php

namespace App\Http\Controllers\Gopanel\Entities;

use App\Helpers\FileUploadHelper;
use App\Http\Controllers\Gopanel\GopanelController;
use App\Models\Entities\AboutPage;
use App\Models\Entities\MainSetting;
use Illuminate\Http\Request;

class MainSettingController extends GopanelController
{


    public function __construct()
    {
        parent::__construct();

    }

    public function index(Request $request)
    {
        $item = MainSetting::first();
        if($request->ajax()){
            $data = $request->except(['_token']);
            if ($request->hasFile('logo')){
                $data['logo'] = FileUploadHelper::uploadFile($request->file('logo'), "mainsettings", uniqid());
            }
            if ($request->hasFile('favicon')){
                $data['favicon'] = FileUploadHelper::uploadFile($request->file('favicon'), "mainsettings", uniqid());
            }
            if ($request->hasFile('footer_logo')){
                $data['footer_logo'] = FileUploadHelper::uploadFile($request->file('footer_logo'), "mainsettings", uniqid());
            }
            if ($request->hasFile('footer_deal_image')){
                $data['footer_deal_image'] = FileUploadHelper::uploadFile($request->file('footer_deal_image'), "mainsettings", uniqid());
            }
            $item->header_phone    = $request->header_phone;
            $item->footer_phone    = $request->footer_phone;
            $item->whatsapp        = $request->whatsapp;
            $item->map             = $request->map;
            $item                  = $this->service->save($item, $data);
            $this->createTranslations($item, $request);
            $message               = "Məlumat uğurla dəyişdirildi!";
            $this->success_response($item, $message);
            return $this->response_json();
        }
        $route = route("gopanel.mainsettings.index");
        return view('gopanel.pages.mainsettings.index', compact('item', 'route'));
    }
}
