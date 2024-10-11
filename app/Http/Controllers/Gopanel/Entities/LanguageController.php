<?php

namespace App\Http\Controllers\Gopanel\Entities;

use App\Helpers\FileUploadHelper;
use App\Http\Controllers\Gopanel\GopanelController;
use App\Models\Entities\Language;
use App\Models\Entities\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LanguageController extends GopanelController
{


    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        return view('gopanel.pages.languages.index');

    }




    public function updateOrSave(Language $item)
    {
//        $this->checkPermission($item,'admin.update','admin.store');

        try {
            if (is_null($item))
                $item = new Language();
            $route = route("gopanel.languages.save", $item);
            $this->response['html'] = View::make('gopanel.pages.languages.components.form', [
                'item'          => $item,
                'route'         => $route
            ])->render();
            $this->success_response([], "Form yaradıldı");
        } catch (\Exception $e) {
            $this->response['message']   .= $e->getMessage();
        }
        return $this->response_json();
    }

    public function save(Language $item, Request $request)
    {
//        $this->checkPermission($item,'admin.update','admin.store');
        try {
            $data = $request->except(['_token']);
            if (!is_null($item)) {
                $message    = "Məlumat uğurla dəyişdirildi!";
            } else {
                $message    = "Məlumat uğurla yaradıldı!";
            }
            if ($request->hasFile('icon')){
                $data['icon'] = FileUploadHelper::uploadFile($request->file('icon'), "languages", uniqid());
            }
            $item->status =1;
            $item       = $this->service->save($item, $data);
            $this->success_response($item, $message);
        } catch (\Exception $e) {
            $this->response['message']   .= $e->getMessage();
        }
        return $this->response_json();
    }


}
