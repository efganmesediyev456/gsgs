<?php

namespace App\Http\Controllers\Gopanel\Entities;

use App\Helpers\FileUploadHelper;
use App\Http\Controllers\Gopanel\GopanelController;
use App\Models\Entities\AboutPage;
use App\Models\Entities\Advertisement;
use App\Models\Entities\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ContactController extends GopanelController
{


    public function __construct()
    {
        parent::__construct();

    }

    public function index(Request $request)
    {
        $item = Contact::first();
        if($request->ajax()){
            $data = $request->except(['_token']);
            $item       = $this->service->save($item, $data);
//            $this->createTranslations($item, $request);
            $message    = "Məlumat uğurla dəyişdirildi!";
            $this->success_response($item, $message);
            return $this->response_json();
        }
        $route = route("gopanel.contact.index");
        return view('gopanel.pages.contact.index', compact('item', 'route'));
    }
}
