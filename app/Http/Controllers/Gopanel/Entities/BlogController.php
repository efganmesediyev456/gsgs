<?php

namespace App\Http\Controllers\Gopanel\Entities;

use App\Helpers\FileUploadHelper;
use App\Http\Controllers\Gopanel\GopanelController;
use App\Models\Entities\Blog;
use App\Models\Entities\Discover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BlogController extends GopanelController
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        return view('gopanel.pages.blogs.index');
    }

    public function updateOrSave(Blog $item)
    {
//        $this->checkPermission($item,'features.update','features.store');

        try {
            if (is_null($item))
                $item = new Blog();
            $route = route("gopanel.blogs.save", $item);
        } catch (\Exception $e) {
            $this->response['message']   .= $e->getMessage();
            return $this->response_json();
        }
        return view('gopanel.pages.blogs.save', compact('item','route'));
    }


    public function save(Blog $item, Request $request)
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
                $data['image'] = FileUploadHelper::uploadFile($request->file('image'), "blogs");
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
