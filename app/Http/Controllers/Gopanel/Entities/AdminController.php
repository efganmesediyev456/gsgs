<?php

namespace App\Http\Controllers\Gopanel\Entities;

use App\Helpers\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gopanel\GopanelController;
use App\Models\Entities\Feature;
use App\Models\Entities\Slider;
use App\Models\Gopanel\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class AdminController extends GopanelController
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        return view('gopanel.pages.admins.index');

    }

    public function updateOrSave(Admin $item)
    {
//        $this->checkPermission($item,'features.update','features.store');

        try {
            if (is_null($item))
                $item = new Admin();
            $route = route("gopanel.admins.save", $item);
            $this->response['html'] = View::make('gopanel.pages.admins.components.form', [
                'item'          => $item,
                'route'         => $route
            ])->render();
            $this->success_response([], "Form yaradıldı");
        } catch (\Exception $e) {
            $this->response['message']   .= $e->getMessage();
        }
        return $this->response_json();
    }


    public function save(Admin $item, Request $request)
    {
//        $this->checkPermission($item,'features.update','features.store');
        try {
            $data = $request->except(['_token']);
            if (!is_null($item)) {
                $message    = "Məlumat uğurla dəyişdirildi!";
            } else {
                $message    = "Məlumat uğurla yaradıldı!";
            }
            if ($request->hasFile('image')){
                $data['image'] = FileUploadHelper::uploadFile($request->file('image'), "admins", uniqid());
            }
            $item->name = $request->name;
            $item->surname = $request->surname;
            if($request->password!='')
            $item->password = Hash::make($request->password);
            else
                unset($data['password']);
            $item       = $this->service->save($item, $data);
            $this->success_response($item, $message);
        } catch (\Exception $e) {
            $this->response['message']   .= $e->getMessage();
        }
        return $this->response_json();
    }

}
