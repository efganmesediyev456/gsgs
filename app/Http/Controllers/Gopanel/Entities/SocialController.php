<?php

namespace App\Http\Controllers\Gopanel\Entities;

use App\Helpers\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gopanel\GopanelController;
use App\Models\Entities\Feature;
use App\Models\Entities\Slider;
use App\Models\Entities\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SocialController extends GopanelController
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        return view('gopanel.pages.sociallinks.index');

    }

    public function updateOrSave(SocialLink $item)
    {
//        $this->checkPermission($item,'features.update','features.store');

        try {
            if (is_null($item))
                $item = new SocialLink();
            $route = route("gopanel.sociallinks.save", $item);
            $this->response['html'] = View::make('gopanel.pages.sociallinks.components.form', [
                'item'          => $item,
                'route'         => $route
            ])->render();
            $this->success_response([], "Form yaradıldı");
        } catch (\Exception $e) {
            $this->response['message']   .= $e->getMessage();
        }
        return $this->response_json();
    }


    public function save(SocialLink $item, Request $request)
    {
//        $this->checkPermission($item,'features.update','features.store');
        try {
            $data = $request->except(['_token']);
            if (!is_null($item)) {
                $message    = "Məlumat uğurla dəyişdirildi!";
            } else {
                $message    = "Məlumat uğurla yaradıldı!";
            }
            if ($request->hasFile('icon')){
                $data['icon'] = FileUploadHelper::uploadFile($request->file('icon'), "sociallinks", $data['icon']);
            }
            $item       = $this->service->save($item, $data);
            $this->createTranslations($item, $request);
            $this->success_response($item, $message);
        } catch (\Exception $e) {
            $this->response['message']   .= $e->getMessage();
        }
        return $this->response_json();
    }

}
