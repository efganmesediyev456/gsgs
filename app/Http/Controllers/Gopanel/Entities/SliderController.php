<?php

namespace App\Http\Controllers\Gopanel\Entities;

use App\Helpers\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gopanel\GopanelController;
use App\Models\Entities\Slider;
use App\Models\Gopanel\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SliderController extends GopanelController
{


    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        return view('gopanel.pages.sliders.index');

    }




    public function updateOrSave(Slider $item)
    {
//        $this->checkPermission($item,'admin.update','admin.store');

        try {
            if (is_null($item))
                $item = new Slider();
            $route = route("gopanel.sliders.save", $item);
            $this->response['html'] = View::make('gopanel.pages.sliders.components.form', [
                'item'          => $item,
                'route'         => $route
            ])->render();
            $this->success_response([], "Form yaradıldı");
        } catch (\Exception $e) {
            $this->response['message']   .= $e->getMessage();
        }
        return $this->response_json();
    }

    public function save(Slider $item, Request $request)
    {
//        $this->checkPermission($item,'admin.update','admin.store');
        try {
            $data = $request->except(['_token']);
            if (!is_null($item)) {
                $message    = "Məlumat uğurla dəyişdirildi!";
            } else {
                $message    = "Məlumat uğurla yaradıldı!";
            }
            if ($request->hasFile('image1')){
                $data['image1'] = FileUploadHelper::uploadFile($request->file('image1'), "sliders", $data['image1']);
            }
            if ($request->hasFile('image2')){
                $data['image2'] = FileUploadHelper::uploadFile($request->file('image2'), "sliders", $data['image2']);
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
