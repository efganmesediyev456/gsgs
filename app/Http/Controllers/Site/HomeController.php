<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\ContactApply;
use App\Models\Entities\AboutPage;
use App\Models\Entities\Blog;
use App\Models\Entities\Brend;
use App\Models\Entities\Category;
use App\Models\Entities\Contact;
use App\Models\Entities\ContactDetail;
use App\Models\Entities\CustomerRating;
use App\Models\Entities\Faq;
use App\Models\Entities\Menu;
use App\Models\Entities\Product;
use App\Models\Gopanel\SiteApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $seo            = Menu::status()->whereSlug(null)->first();
        $blogs          = Blog::status()->orderBy('id','desc')->get()->take(2);
        return view('site.pages.home.index', compact('seo', 'blogs') );
    }

    public function about()
    {
        $seo             = Menu::status()->whereSlug('about')->latest()->first();
        $about           = AboutPage::first();
        $brends          = Brend::status()->orderBy('order','asc')->get();
        $customerratings = CustomerRating::status()->orderBy('order','asc')->get();
        return view('site.pages.about.index', compact('about', 'seo', 'brends', 'customerratings') );
    }

    public function contact(Request $request)
    {
        $seo           = Menu::status()->whereSlug('contact')->latest()->first();
        $contact       = Contact::first();
        $faqs          = Faq::status()->orderBy("order")->get();
        $contactDetails= ContactDetail::status()->orderBy("order")->get();
        if($request->ajax()) {
            $this->validate($request, [
                "email"=>"required",
                "name"=>"required",
                "phone"=>"required",
                "message"=>"required"
            ]);
            ContactApply::create([
                "email"=>$request->email,
                "name"=>$request->name,
                "phone"=>$request->phone,
                "subject"=>$request->subject,
                "message"=>$request->message,
            ]);

            return response()->json([
               "message"=>__('frontend.success_message_for_contact'),
                "status"=>200
            ]);

        }
        return view('site.pages.contact.index', compact('contact', 'faqs', 'seo', 'contactDetails'));
    }

    public function applySite(Request $request, $language)
    {
        app()->setLocale($language);
        $this->validate($request, [
            'email'=>'required|email|unique:site_applies',
        ]);
        SiteApply::forceCreate([
            "email"=>$request->email,
        ]);
        return response()->json([
            "message"=>__('frontend.success_site_apply'),
            "status"=>200
        ]);
    }
}
