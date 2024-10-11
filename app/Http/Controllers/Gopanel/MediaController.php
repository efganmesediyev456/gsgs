<?php

namespace App\Http\Controllers\Gopanel;

use App\Helpers\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gopanel\GopanelController;
use App\Models\Entities\Feature;
use App\Models\Entities\Slider;
use App\Models\Gopanel\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MediaController extends GopanelController
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        return view('gopanel.pages.medias.index');
    }

    public function updateOrSave(Media $item,  Request $request)
    {
//        $this->checkPermission($item,'features.update','features.store');


        try {
            if (is_null($item))
                $item = new Media();
            $route = route("gopanel.medias.save", $item).'?imageable_type='.$request->get('imageable_type').'&imageable_id='.$request->get('imageable_id');
            $this->response['html'] = View::make('gopanel.pages.medias.components.form', [
                'item'          => $item,
                'route'         => $route
            ])->render();
            $this->success_response([], "Form yaradıldı");
        } catch (\Exception $e) {
            $this->response['message']   .= $e->getMessage();
        }
        return $this->response_json();
    }


    public function save(Media $item, Request $request)
    {
//        $this->checkPermission($item,'features.update','features.store');

        try {
            $data = $request->except(['_token']);
            if (!is_null($item)) {
                $message    = "Məlumat uğurla dəyişdirildi!";
            } else {
                $message    = "Məlumat uğurla yaradıldı!";
            }
            if ($request->hasFile('file')){
                $data['file'] = FileUploadHelper::uploadFile($request->file('file'), "medias", uniqid());
            }
            $item->imageable_id = $request->get('imageable_type');
            $item->imageable_type = $request->get('imageable_type');
            $item       = $this->service->save($item, $data);
            $this->success_response($item, $message);
        } catch (\Exception $e) {
            $this->response['message']   .= $e->getMessage();
        }
        return $this->response_json();
    }

}
