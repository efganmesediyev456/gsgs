<?php

namespace App\Http\Controllers\Gopanel\Entities;

use App\Helpers\FileUploadHelper;
use App\Http\Controllers\Gopanel\GopanelController;
use App\Models\Entities\AboutPage;
use App\Models\Entities\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AboutPageController extends GopanelController
{


    public function __construct()
    {
        parent::__construct();

    }

    public function index(Request $request)
    {
        $item = AboutPage::first();
        if($request->ajax()){
            $data = $request->except(['_token']);
            if ($request->hasFile('image1')){
                $data['image1'] = FileUploadHelper::uploadFile($request->file('image1'), "aboutpages", uniqid());
            }
            if ($request->hasFile('image2')){
                $data['image2'] = FileUploadHelper::uploadFile($request->file('image2'), "aboutpages", uniqid());
            }
            $item       = $this->service->save($item, $data);
            $this->createTranslations($item, $request);
            $message    = "Məlumat uğurla dəyişdirildi!";
            $this->success_response($item, $message);
            return $this->response_json();
        }
        $route = route("gopanel.aboutpages.index");
        return view('gopanel.pages.aboutpages.index', compact('item', 'route'));
    }
}
