<?php

namespace App\Http\Controllers\Gopanel\Entities;

use App\Helpers\FileUploadHelper;
use App\Http\Controllers\Gopanel\GopanelController;
use App\Models\Entities\Advertisement;
use App\Models\Entities\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PartnerController extends GopanelController
{


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('gopanel.pages.partners.index');
    }

    public function updateOrSave(Partner $item)
    {
//        $this->checkPermission($item,'admin.update','admin.store');
        try {
            if (is_null($item))
                $item = new Partner();
            $route = route("gopanel.partners.save", $item);
            $this->response['html'] = View::make('gopanel.pages.partners.components.form', [
                'item'          => $item,
                'route'         => $route
            ])->render();
            $this->success_response([], "Form yaradıldı");
        } catch (\Exception $e) {
            $this->response['message']   .= $e->getMessage();
        }
        return $this->response_json();
    }

    public function save(Partner $item, Request $request)
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
                $data['image'] = FileUploadHelper::uploadFile($request->file('image'), "partners", $data['image']);
            }
            $item       = $this->service->save($item, $data);
            $this->success_response($item, $message);
        } catch (\Exception $e) {
            $this->response['message']   .= $e->getMessage();
        }
        return $this->response_json();
    }


}
