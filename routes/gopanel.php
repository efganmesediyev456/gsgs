<?php

use App\Http\Controllers\Gopanel\Auth\AuthController;
use App\Http\Controllers\Gopanel\DashboardController;
use App\Http\Controllers\Gopanel\DatatableController;
use App\Http\Controllers\Entities\GeneralController;
use App\Http\Controllers\Gopanel\Entities\BrandController;
use App\Http\Controllers\Gopanel\Entities\CategoryController;
use App\Http\Controllers\Gopanel\Entities\ModelController;
use App\Http\Controllers\Gopanel\Entities\CityController;
use App\Http\Controllers\Gopanel\Entities\ContactController;
use App\Http\Controllers\Gopanel\Entities\MainSettingController;
use App\Http\Controllers\Gopanel\Entities\StaticPageController;
use App\Http\Controllers\Gopanel\Entities\ParameterController;
use App\Http\Controllers\Gopanel\Entities\ParameterValueController;
use App\Http\Controllers\Gopanel\AccessControl\PermissionController;
use App\Http\Controllers\Gopanel\AccessControl\RoleController;
use App\Http\Controllers\Gopanel\Auction\AuctionController;
use App\Http\Controllers\Gopanel\User\UserController;
use App\Http\Controllers\Gopanel\Common\ReviewController;
use App\Http\Controllers\Gopanel\Entities\SliderController;
use App\Http\Controllers\Gopanel\Entities\FeatureController;
use App\Http\Controllers\Gopanel\Entities\DiscoverController;
use App\Http\Controllers\Gopanel\Entities\AdvertisementController;
use App\Http\Controllers\Gopanel\Entities\PartnerController;
use App\Http\Controllers\Gopanel\Entities\MenuController;
use App\Http\Controllers\Gopanel\Entities\AboutPageController;
use App\Http\Controllers\Gopanel\Entities\BlogController;
use App\Http\Controllers\Gopanel\Entities\SiteAppliesController;
use App\Http\Controllers\Gopanel\Entities\ContactFormController;
use App\Http\Controllers\Gopanel\Entities\ProductController;
use App\Http\Controllers\Gopanel\Entities\AdminController;
use App\Http\Controllers\Gopanel\ProcessController;
use App\Http\Controllers\Gopanel\Entities\FaqController;
use App\Http\Controllers\Gopanel\Entities\BrendController;
use App\Http\Controllers\Gopanel\Entities\LanguageController;
use App\Http\Controllers\Gopanel\Entities\SocialController;
use \App\Http\Controllers\Gopanel\LangTranslationController;
use \App\Http\Controllers\Gopanel\Entities\BlogOfferController;
use \App\Http\Controllers\Gopanel\Entities\ContactDetailController;
use \App\Http\Controllers\Gopanel\Entities\CustomerRatingController;
use \App\Http\Controllers\Gopanel\MediaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your admin panel. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/

Route::prefix('/')->group(function () {
    Route::get('login', [AuthController::class, 'index']);
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware(['auth.guard:admin'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('datatable/{table}', [DatatableController::class, 'handle'])->name('datatable.source');
    //General Functions
    Route::prefix('general')->name("general.")->group(function () {
        Route::get('/get/route', [GeneralController::class, 'route'])->name('get.route');
        Route::post('/status/change', [GeneralController::class, 'statusChange'])->name('status.change');
        Route::post('/sortable/', [GeneralController::class, 'sortable'])->name('sortable');
        Route::post('/add', [GeneralController::class, 'add'])->name('add');
        Route::post('/delete/{id?}', [GeneralController::class, 'delete'])->name('delete');
        Route::post('/archive/{uid?}', [GeneralController::class, 'archive'])->name('archive');
        Route::post('/edit/{uid?}', [GeneralController::class, 'edit'])->name('edit');
        Route::post('/select2', [GeneralController::class, 'select'])->name('select');
    });

    //process
    Route::prefix('process')->name("process.")->group(function () {
        Route::post('search', [ProcessController::class, 'user'])->name('user');
        Route::get('/{user}', [ProcessController::class, 'getUser'])->name('user.detail');
    });

    // Category Routes
    Route::prefix('category')->name("category.")->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/get/form/{item?}', [CategoryController::class, 'getForm'])->name('get.form');
        Route::post('/save/form/{item?}', [CategoryController::class, 'save'])->name('save.form');
    });


    //Contacts
    Route::prefix('contactlist')->name("contact.")->group(function () {
        Route::match(['get', 'post'], '/', [ContactController::class, 'index'])->name('index');
    });
    //Main Settings
    Route::prefix('main-settings')->name("mainsettings.")->group(function () {
        Route::match(['get', 'post'], '/', [MainSettingController::class, 'index'])->name('index');
    });

    //Sosial Links
    //features
    Route::prefix('sociallinks')->name("sociallinks.")->group(function () {
        Route::get('/', [SocialController::class, 'index'])->name('index');
        Route::get('/updateOrSave/{item?}', [SocialController::class, 'updateOrSave'])->name('updateOrSave');
        Route::post('/save/{item?}', [SocialController::class, 'save'])->name('save');
    });

    //customerratings
    Route::prefix('customerratings')->name("customerratings.")->group(function () {
        Route::get('/', [CustomerRatingController::class, 'index'])->name('index');
        Route::get('/updateOrSave/{item?}', [CustomerRatingController::class, 'updateOrSave'])->name('updateOrSave');
        Route::post('/save/{item?}', [CustomerRatingController::class, 'save'])->name('save');
    });
     Route::prefix('admin')->name("admins.")->group(function () {
         Route::get('/', [AdminController::class, 'index'])->name('index');
         Route::get('/updateOrSave/{item?}', [AdminController::class, 'updateOrSave'])->name('updateOrSave');
         Route::post('/save/{item?}', [AdminController::class, 'save'])->name('save');
    });

     //sliders
     Route::prefix('sliders')->name("sliders.")->group(function () {
         Route::get('/', [SliderController::class, 'index'])->name('index');
         Route::get('/updateOrSave/{item?}', [SliderController::class, 'updateOrSave'])->name('updateOrSave');
         Route::post('/save/{item?}', [SliderController::class, 'save'])->name('save');
    });

    //sliders
    Route::prefix('languages')->name("languages.")->group(function () {
        Route::get('/', [LanguageController::class, 'index'])->name('index');
        Route::get('/updateOrSave/{item?}', [LanguageController::class, 'updateOrSave'])->name('updateOrSave');
        Route::post('/save/{item?}', [LanguageController::class, 'save'])->name('save');
    });
    //faqs
    Route::prefix('faqs')->name("faqs.")->group(function () {
        Route::get('/', [FaqController::class, 'index'])->name('index');
        Route::get('/updateOrSave/{item?}', [FaqController::class, 'updateOrSave'])->name('updateOrSave');
        Route::post('/save/{item?}', [FaqController::class, 'save'])->name('save');
    });

    //contact details
    Route::prefix('contactdetails')->name("contactdetails.")->group(function () {
        Route::get('/', [ContactDetailController::class, 'index'])->name('index');
        Route::get('/updateOrSave/{item?}', [ContactDetailController::class, 'updateOrSave'])->name('updateOrSave');
        Route::post('/save/{item?}', [ContactDetailController::class, 'save'])->name('save');
    });

    //brends
    Route::prefix('brends')->name("brends.")->group(function () {
        Route::get('/', [BrendController::class, 'index'])->name('index');
        Route::get('/updateOrSave/{item?}', [BrendController::class, 'updateOrSave'])->name('updateOrSave');
        Route::post('/save/{item?}', [BrendController::class, 'save'])->name('save');
    });
    //parameters
    Route::prefix('parameters')->name("parameters.")->group(function () {
        Route::get('/', [ParameterController::class, 'index'])->name('index');
        Route::get('/updateOrSave/{item?}', [ParameterController::class, 'updateOrSave'])->name('updateOrSave');
        Route::post('/save/{item?}', [ParameterController::class, 'save'])->name('save');
    });

     //features
     Route::prefix('features')->name("features.")->group(function () {
         Route::get('/', [FeatureController::class, 'index'])->name('index');
         Route::get('/updateOrSave/{item?}', [FeatureController::class, 'updateOrSave'])->name('updateOrSave');
         Route::post('/save/{item?}', [FeatureController::class, 'save'])->name('save');
    });
     //blogoffers
     Route::prefix('blogoffers')->name("blogoffers.")->group(function () {
         Route::get('/', [BlogOfferController::class, 'index'])->name('index');
         Route::get('/updateOrSave/{item?}', [BlogOfferController::class, 'updateOrSave'])->name('updateOrSave');
         Route::post('/save/{item?}', [BlogOfferController::class, 'save'])->name('save');
    });

    //siteapplies
    Route::prefix('siteapplies')->name("siteapplies.")->group(function () {
        Route::get('/', [SiteAppliesController::class, 'index'])->name('index');
    });
    //contact forms
    Route::prefix('contact-forms')->name("contactforms.")->group(function () {
        Route::get('/', [ContactFormController::class, 'index'])->name('index');
    });
     //discovers
     Route::prefix('discovers')->name("discovers.")->group(function () {
         Route::get('/', [DiscoverController::class, 'index'])->name('index');
         Route::get('/updateOrSave/{item?}', [DiscoverController::class, 'updateOrSave'])->name('updateOrSave');
         Route::post('/save/{item?}', [DiscoverController::class, 'save'])->name('save');
    });
     //advertisement
     Route::prefix('advertisements')->name("advertisements.")->group(function () {
         Route::get('/', [AdvertisementController::class, 'index'])->name('index');
         Route::get('/updateOrSave/{item?}', [AdvertisementController::class, 'updateOrSave'])->name('updateOrSave');
         Route::post('/save/{item?}', [AdvertisementController::class, 'save'])->name('save');
    });
    //partner
    Route::prefix('partners')->name("partners.")->group(function () {
        Route::get('/', [PartnerController::class, 'index'])->name('index');
        Route::get('/updateOrSave/{item?}', [PartnerController::class, 'updateOrSave'])->name('updateOrSave');
        Route::post('/save/{item?}', [PartnerController::class, 'save'])->name('save');
    });
    //menu
    Route::prefix('menus')->name("menus.")->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('index');
        Route::get('/updateOrSave/{item?}', [MenuController::class, 'updateOrSave'])->name('updateOrSave');
        Route::post('/save/{item?}', [MenuController::class, 'save'])->name('save');
    });

    //menu
    Route::prefix('aboutpages')->name("aboutpages.")->group(function () {
        Route::match(['get', 'post'], '/', [AboutPageController::class, 'index'])->name('index');
    });

    //blogs
    Route::prefix('blogslist')->name("blogs.")->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('/updateOrSave/{item?}', [BlogController::class, 'updateOrSave'])->name('updateOrSave');
        Route::post('/save/{item?}', [BlogController::class, 'save'])->name('save');
    });

    //blogs
    Route::prefix('productslist')->name("productslist.")->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/updateOrSave/{item?}', [ProductController::class, 'updateOrSave'])->name('updateOrSave');
        Route::post('/save/{item?}', [ProductController::class, 'save'])->name('save');
    });

    //productsgopanel
    Route::prefix('blogsgopanel')->name("blogs.")->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('/updateOrSave/{item?}', [BlogController::class, 'updateOrSave'])->name('updateOrSave');
        Route::post('/save/{item?}', [BlogController::class, 'save'])->name('save');
    });

    Route::post('process/order/datatable', [ProcessController::class, 'orderDatatable'])->name('process.order.datatable');;


    //productsgopanel
    Route::prefix('langtranslations')->name("langtranslations.")->group(function () {
        Route::get('/', [LangTranslationController::class, 'index'])->name('index');
        Route::get('/updateOrSave/{item?}', [LangTranslationController::class, 'updateOrSave'])->name('updateOrSave');
        Route::post('/save/{item?}', [LangTranslationController::class, 'save'])->name('save');
        Route::get('/reset', [LangTranslationController::class,'gettranslateProduction']);
    });


    //medias
    Route::prefix('medias')->name("medias.")->group(function () {
        Route::get('/', [MediaController::class, 'index'])->name('index');
        Route::get('/updateOrSave/{item?}', [MediaController::class, 'updateOrSave'])->name('updateOrSave');
        Route::post('/save/{item?}', [MediaController::class, 'save'])->name('save');
    });


//    //Permissions
//    Route::prefix('permission')->name("permission.")->group(function () {
//        Route::get('/', [PermissionController::class, 'index'])->name('index');
//        Route::get('/get/form/{item?}', [PermissionController::class, 'getForm'])->name('get.form');
//        Route::post('/save/form/{item?}', [PermissionController::class, 'save'])->name('save.form');
//    });
//    //Roles
//    Route::prefix('role')->name("role.")->group(function () {
//        Route::get('/', [RoleController::class, 'index'])->name('index');
//        Route::get('/save/{item?}', [RoleController::class, 'updateOrSave'])->name('updateOrSave');
//        Route::post('/save/{item?}', [RoleController::class, 'save'])->name('save');
//    });
    //Parametr
//    Route::prefix('parametr')->name("parametr.")->group(function () {
//        Route::get('/', [ParameterController::class, 'index'])->name('index')->middleware('permission:parametr.index,admin');
//        Route::get('/save/{item?}', [ParameterController::class, 'updateOrSave'])->name('updateOrSave');
//        Route::post('/save/{item?}', [ParameterController::class, 'save'])->name('save');
//    });
//
//    #parametr values
//    Route::prefix('parametr/values')->name("parametr.values.")->group(function () {
//        Route::get('/', [ParameterValueController::class, 'index'])->name('index');
//        Route::get('/save/{item?}', [ParameterValueController::class, 'updateOrSave'])->name('updateOrSave');
//        Route::post('/save/{item?}', [ParameterValueController::class, 'save'])->name('save');
//    });
//
//    //Auctions
//    Route::prefix('auctions')->name("auctions.")->group(function () {
//        Route::get('/', [AuctionController::class, 'index'])->name('index')->middleware('permission:auctions.index,admin');
//    //  Route::get('/save/{item?}', [AuctionController::class, 'updateOrSave'])->name('updateOrSave');
//    //  Route::post('/save/{item?}', [AuctionController::class, 'save'])->name('save');
//    });
//
//    //Users
//    Route::prefix('users')->name("users.")->group(function () {
//        Route::get('/', [UserController::class, 'index'])->name('index')->middleware('permission:users.index,admin');
//          Route::get('/save/{item?}', [UserController::class, 'updateOrSave'])->name('updateOrSave');
//          Route::post('/save/{item?}', [UserController::class, 'save'])->name('save');
//    });


});
