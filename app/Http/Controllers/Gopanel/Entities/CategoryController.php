<?php

namespace App\Http\Controllers\Gopanel\Entities;

use App\Helpers\FileUploadHelper;
use App\Http\Controllers\Gopanel\GopanelController;
use App\Models\Entities\Category;
use App\Services\Entities\CategoryService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CategoryController extends GopanelController
{

    public CategoryService $categoryService;
    public int|null $parent_id;

    public function __construct()
    {
        parent::__construct();
        $this->categoryService = new CategoryService();
        $this->parent_id = request()->has("parent_id") ? request()->input("parent_id") : NULL;
        $this->categoryService->share(['parent_id' => $this->parent_id, 'model' => Category::class]);
    }

    public function index()
    {
        $categories = Category::where("parent_id", $this->parent_id)->orderBy("order", "ASC")->get();
        return view('gopanel.pages.category.index', compact("categories"));
    }


    public function getForm(Category $item)
    {
        try {
            if (is_null($item))
                $item = new Category();
            $route = route("gopanel.category.save.form", $item);
            $this->response['html'] = View::make('gopanel.pages.category.components.form', [
                'item'          => $item,
                'route'         => $route,
                'parent_id'     => $this->parent_id
            ])->render();
            $this->success_response([], "Form yaradıldı");
        } catch (Exception $e) {
            $this->response['message']   .= $e->getMessage();
        }
        return $this->response_json();
    }

    public function save(Category $item, Request $request)
    {
        try {
            $data = $request->all();
            if ($request->hasFile('icon')){
                $data['icon'] = FileUploadHelper::uploadFile($request->file('icon'), "categories");
            }


            if ($request->hasFile('list_image')){
                $data['list_image'] = FileUploadHelper::uploadFile($request->file('list_image'), "categories");
            }
            if (!is_null($item)) {
                $item       = $this->categoryService->update($item, $data);
                $message    = "Məlumat uğurla dəyişdirildi!";
            } else {
                $item       = $this->categoryService->create($item, $data);
                $message    = "Məlumat uğurla yaradıldı!";
            }
            $this->createTranslations($item, $request);
            $this->success_response($item, $message);
        } catch (Exception $e) {
            $this->response['message']   .= $e->getMessage();
        }
        return $this->response_json();
    }
}
