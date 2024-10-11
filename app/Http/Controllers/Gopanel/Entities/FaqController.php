<?php

namespace App\Http\Controllers\Gopanel\Entities;

use App\Helpers\FileUploadHelper;
use App\Http\Controllers\Gopanel\GopanelController;
use App\Models\Entities\Faq;
use App\Models\Entities\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FaqController extends GopanelController
{


    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        return view('gopanel.pages.faqs.index');

    }

    public function updateOrSave(Faq $item)
    {
//        $this->checkPermission($item,'admin.update','admin.store');
        try {
            if (is_null($item))
                $item = new Slider();
            $route = route("gopanel.faqs.save", $item);
            $this->response['html'] = View::make('gopanel.pages.faqs.components.form', [
                'item'          => $item,
                'route'         => $route
            ])->render();
            $this->success_response([], "Form yaradıldı");
        } catch (\Exception $e) {
            $this->response['message']   .= $e->getMessage();
        }
        return $this->response_json();
    }

    public function save(Faq $item, Request $request)
    {
//        $this->checkPermission($item,'admin.update','admin.store');
        try {
            $data = $request->except(['_token']);
            if (!is_null($item)) {
                $message    = "Məlumat uğurla dəyişdirildi!";
            } else {
                $message    = "Məlumat uğurla yaradıldı!";
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
