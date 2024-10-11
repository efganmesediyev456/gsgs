<?php

namespace App\Http\Controllers\Gopanel\Entities;

use App\Helpers\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gopanel\GopanelController;
use App\Models\Entities\BlogOffer;
use App\Models\Entities\Feature;
use App\Models\Entities\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BlogOfferController extends GopanelController
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        return view('gopanel.pages.blog-offers.index');

    }

    public function updateOrSave(BlogOffer $item)
    {
//        $this->checkPermission($item,'features.update','features.store');

        try {
            if (is_null($item))
                $item = new BlogOffer();
            $route = route("gopanel.blogoffers.save", $item);
            $this->response['html'] = View::make('gopanel.pages.blog-offers.components.form', [
                'item'          => $item,
                'route'         => $route
            ])->render();
            $this->success_response([], "Form yaradıldı");
        } catch (\Exception $e) {
            $this->response['message']   .= $e->getMessage();
        }
        return $this->response_json();
    }


    public function save(BlogOffer $item, Request $request)
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
                $data['image'] = FileUploadHelper::uploadFile($request->file('image'), "blog-offers", $data['image']);
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
