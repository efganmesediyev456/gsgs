<?php

namespace App\Http\Controllers\Entities;


use App\Http\Controllers\Controller;
use App\Services\Entities\GeneralService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class GeneralController extends Controller
{


    private GeneralService $service;

    public function __construct(GeneralService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function add(Request $request)
    {
        try {
            if ($request->has("key")) {
                $morph          = $request->key;
                $hash           = $request->hash;
                $hash           = $request->hash;
                $class          = $this->service->getMorphClass($morph, $hash);
                $this->response['request'] = $request->all();
                $attributes = $request->except(['key', 'hash']);
                if (class_exists($class)) {
                    $modelInstance = app($class);
                    $item = new $modelInstance();

                    foreach ($attributes as $key => $value) {
                        $item->$key = $value;
                    }
                    if ($item->save()) {
                        $this->success_response($item, "Məlumat uğurla əlavə edildi");
                    } else {
                        $this->response['data'] = $item;
                        $this->response['message'] = 'Məlumat əlavə edilə bilmədi';
                    }
                } else {
                    throw new Exception("Belə bir key mövcud deyil ({$morph})");
                }
            } else {
                throw new Exception("Məlumatlar düzgün göndərilməyib");
            }
        } catch (Exception $e) {
            $this->response['message'] .= $e->getMessage();
        }
        return $this->response_json();
    }

    public function edit(Request $request)
    {
        try {
            if ($request->has("uid") && $request->has("key")) {
                $morph          = $request->key;
                $uid            = $request->uid;
                $hash           = $request->hash;
                $class          = $this->service->getMorphClass($morph, $hash);
                $this->response['request']      = $request->all();
                $attributes                     = $request->except(['uid', 'key']);
                if (class_exists($class)) {
                    $modelInstance = app($class);
                    $item = $modelInstance->where("uid", $uid)->first();
                    if (isset($item->id)) {
                        foreach ($attributes as $key => $value) {
                            if (isset($item->$key)) {
                                $item->$key = $value;
                            }
                        }
                        if ($item->save()) {
                            $this->success_response($item, "Məlumat uğurla dəyişdirildi");
                        } else {
                            $this->response['data']       = $item;
                            $this->response['message']    = 'Məlumat dəyişdirilə bilmədi';
                        }
                    } else {
                        $this->response['data'] = $item;
                        $this->response['message'] = 'Göndərilən "id" yə uyqun heç bir məlumat tapılmadı!!!';
                    }
                } else {
                    throw new Exception("Belə bir model mövcud deyil ({$class})");
                }
            } else {
                throw new Exception("Məlumatlar düzgün göndərilməyib");
            }
        } catch (Exception $e) {
            $this->response['message'] .= $e->getMessage();
        }
        return $this->response_json();
    }

    public function delete(Request $request)
    {

        try {
            if($request->has('permission')){
                if ($request->permission and !auth('admin')->user()->hasPermissionTo($request->permission)) {
                    abort(403, 'You dont have any permission for this');
                }
            }

            if ($request->has("id")) {

                $class = $request->model;
                $id = intval($request->id);
                $hard = $request->has("hard") && $request->hard == 'true';

                if (class_exists($class)) {
                    $modelInstance = app($class);
                    $item = $modelInstance->where("id", $id)->first();
                    if (isset($item->id)) {
                        if ($hard) {
                            if ($item->forceDelete()) {
                                $this->success_response($item, "Məlumat uğurla silindi");
                            } else {
                                $this->response['message'] = 'Məlumat silinə bilmədi';
                            }
                        } else {
                            $this->response['hard'] = true;
                            if ($item->delete()) {
                                $this->success_response($item, "Məlumat uğurla silindi");
                            } else {
                                $this->response['message'] = 'Məlumat uğurla silindi';
                            }
                        }
                    } else {
                        $this->response['data'] = $item;
                        $this->response['message'] = 'Göndərilən "id" yə uyqun heç bir məlumat tapılmadı!!!';
                    }
                } else {
                    throw new Exception("Belə bir model mövcud deyil ({$class})");
                }
            } else {
                throw new Exception("Məlumatlar düzgün göndərilməyib");
            }
        } catch (Exception $e) {

            $this->response['message'] .= $e->getMessage();
        }
        return $this->response_json();
    }

    public function statusChange(Request $request)
    {
        try {
            if ($request->has("status") && $request->has("id")) {
                $status     = $request->status;
                $class      = $request->model;
                $id         = intval($request->id);
                $row        = $request->row;
                if ($this->service->class_exists($class)) {
                    $modelInstance = $this->service->modelInstance($class);

                    $item = $modelInstance->find($id);
                    if (isset($item->id) && isset($item->$row)) {
                        $item->$row = !$item->getRawOriginal($row);
                        if ($item->save()) {
                            $this->success_response($item, "Məlumat uğurla dəyişdirildi");
                        }
                    } else {
                        $this->response['data']       = $item;
                        $this->response['message'] = 'Göndərilən "id" yə uyqun heç bir məlumat tapılmadı!!!';
                    }
                } else {
                    throw new Exception("Belə bir model mövcud deyil ({$class}) ");
                }
            } else {
                throw new Exception("Məlumatlar düzgün göndərilməyib");
            }
        } catch (Exception $e) {
            $this->response['message'] .= $e->getMessage();
        }
        return $this->response_json();
    }

    public function sortable(Request $request)
    {
        try {
            $row            = $request->row;
            $rows           = $request->data;
            $requestModel   = $request->model;
            $counter        = 0;
            $updatedData    = [];
            if (class_exists($requestModel)) {
                $modelInstance = app($requestModel);
                parse_str(urldecode($rows), $rows);

                if (isset($rows['ord']) && count($rows['ord'])) {
                    foreach ($rows['ord'] as $key => $value) {
                        $item = $modelInstance->find($value);
                        $item->$row = $key;
                        if ($item->save()) {
                            $counter++;
                            $updatedData[] = $item;
                        }
                    }
                    if (count($rows['ord']) == $counter) {
                        $this->success_response($item, "Məlumat uğurla dəyişdirildi");
                    } else if ($counter) {
                        $this->success_response($item, "Bütün məlumatlar dəyişdirilə bilmədi !!!");
                    } else {
                        throw new Exception("Yenilənmə zamanı xəta baş verdi !!!");
                    }
                    $this->response['requestedData'] = $rows['ord'];
                    $this->response['updatedData']   = $updatedData;
                } else {
                    throw new Exception("Göndərilən məlumat tapılmadı!!!");
                }
            } else {
                throw new Exception("Belə bir model mövcud deyil ({$requestModel}) ");
            }
        } catch (Exception $e) {
            $this->response['message'] .= $e->getMessage();
        }
        return $this->response_json();
    }


    public function archive(Request $request)
    {
        try {
            if ($request->has("uid")) {
                $class  = $request->key;
                $uid    = $request->uid;
                $hash   = $request->hash;
                $class  = $this->service->getMorphClass($class, $hash);
                if (class_exists($class)) {
                    $modelInstance = app($class);
                    $item = $modelInstance->where("uid", $uid)->first();
                    if (isset($item->id)) {
                        $item->archived_at = now();
                        if ($item->save()) {
                            $this->success_response($item, "Məlumat uğurla Arxivləndi");
                        } else {
                            $this->response['message'] = 'Məlumat Arxivlənən zaman xəta baş verdi!';
                        }
                    } else {
                        $this->response['data'] = $item;
                        $this->response['message'] = 'Göndərilən "id" yə uyqun heç bir məlumat tapılmadı!!!';
                    }
                } else {
                    throw new Exception("Belə bir model mövcud deyil ({$class})");
                }
            } else {
                throw new Exception("Məlumatlar düzgün göndərilməyib");
            }
        } catch (Exception $e) {
            $this->response['message'] .= $e->getMessage();
        }
        return $this->response_json();
    }


    public function route()
    {
        return response()->json($this->service->getSharedRoutes(), 200);
    }




    public function select(Request $request)
    {


        try {
            if ($request->has('model')) {
                $model = $request->input('model');
                $search = $request->input('search');
                $page = $request->input('page', 1);
                $perPage = 10;
                if (class_exists($model)) {
                    $modelInstance = app($model);
                    $query = $modelInstance::where('name', 'LIKE', "%{$search}%");
                    $total = $query->count();
                    $items = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();
                    $this->success_response();
                    $this->response['items'] = $items;
                    $this->response['more'] = ($page * $perPage) < $total;
                    $this->response['message'] = 'Məlumatlar uğurla tapıldı';
                    $this->response['status'] = 'success';
                } else {
                    throw new Exception("Belə bir model mövcud deyil ({$model})");
                }
            } else {
                throw new Exception("Məlumatlar düzgün göndərilməyib");
            }
        } catch (Exception $e) {
            $this->response['message'] = $e->getMessage();
        }
        return $this->response_json();

    }
}
