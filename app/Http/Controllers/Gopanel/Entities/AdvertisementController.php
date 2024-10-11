<?php

namespace App\Http\Controllers\Gopanel\Entities;

use App\Helpers\FileUploadHelper;
use App\Http\Controllers\Gopanel\GopanelController;
use App\Models\Entities\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AdvertisementController extends GopanelController
{


    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        return view('gopanel.pages.advertisements.index');

    }




    public function updateOrSave(Advertisement $item)
    {
//        $this->checkPermission($item,'admin.update','admin.store');

        try {
            if (is_null($item))
                $item = new Slider();
            $route = route("gopanel.advertisements.save", $item);
            $this->response['html'] = View::make('gopanel.pages.advertisements.components.form', [
                'item'          => $item,
                'route'         => $route
            ])->render();
            $this->success_response([], "Form yaradıldı");
        } catch (\Exception $e) {
            $this->response['message']   .= $e->getMessage();
        }
        return $this->response_json();
    }

    public function save(Advertisement $item, Request $request)
    {
//        $this->checkPermission($item,'admin.update','admin.store');
        try {
            $data = $request->except(['_token']);
            if (!is_null($item)) {
                $message    = "Məlumat uğurla dəyişdirildi!";
            } else {
                $message    = "Məlumat uğurla yaradıldı!";
            }
            if ($request->hasFile('image')){
                $data['image'] = FileUploadHelper::uploadFile($request->file('image'), "advertisements", $data['image']);
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
