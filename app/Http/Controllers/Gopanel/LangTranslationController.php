<?php

namespace App\Http\Controllers\Gopanel;

use App\Helpers\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Entities\Language;
use App\Models\Gopanel\LangTranslation;
use App\Services\CommonService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;

;

class LangTranslationController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public $service;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('gopanel.pages.langtranslations.index');

    }

//   public function index()
//   {
//
//       $this->writeToLangFile('az', 'contact','Elaqe', 'frontend');
//   }


    public function updateOrSave(LangTranslation $item)
    {
//        $this->checkPermission($item,'admin.update','admin.store');

        $filenames = LangTranslation::get()->pluck('filename')->unique();


        try {
            if (is_null($item))
                $item = new LangTranslation();
            $route = route("gopanel.langtranslations.save", $item);
            $this->response['html'] = View::make('gopanel.pages.langtranslations.components.form', [
                'item'          => $item,
                'route'         => $route
            ])->render();
            $this->success_response([], "Form yaradıldı");
        } catch (\Exception $e) {
            $this->response['message']   .= $e->getMessage();
        }
        return $this->response_json();
    }

    public function save(LangTranslation $item, Request $request)
    {
//        $this->checkPermission($item,'admin.update','admin.store');
        try {
            $data = $request->except(['_token']);
            if (!is_null($item)) {
                $message    = "Məlumat uğurla dəyişdirildi!";
            } else {
                $message    = "Məlumat uğurla yaradıldı!";
            }
            if($item['id']){
                LangTranslation::where('key', $item->key)->where('filename', $item->filename)->delete();
            }
            $filename     = $data['filename'];
            $key          = $data['key'];
            $value        = $data['value'];
            foreach($value as $locale=>$val){
                $item    = new LangTranslation();
                $item->value = $val;
                $item->key = $key;
                $item->filename = $filename;
                $item->locale   = $locale;
                $item->save();
                $this->writeToLangFile($locale, $key, $val, $filename);
            }
            $this->success_response($item, $message);
        } catch (\Exception $e) {
            $this->response['message']   .= $e->getMessage();
        }
        return $this->response_json();
    }

    public function gettranslateProduction()
    {
        $values  = LangTranslation::all();
        foreach($values as $item){
            $this->writeToLangFile($item->locale, $item->key, $item->value, $item->filename);
        }
        return redirect()->back();
    }

    private function writeToLangFile($locale, $key, $value, $filename)
    {
        $path = resource_path("lang/{$locale}/{$filename}.php");
        $directory = dirname($path);
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
        $translations = file_exists($path) ? include($path) : [];
        $translations[$key] = $value;
        file_put_contents($path, '<?php return ' . var_export($translations, true) . ';');
    }
}
