<?php

namespace App\Http\Controllers\Gopanel;

use App\Http\Controllers\Controller;
use App\Models\DocumentType;
use App\Models\JobTitle;
use App\Models\Worker;
use App\Services\Auth\PermissionService;
use App\Services\Auth\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProcessController extends Controller
{

    private $namespace = 'App\\Models\\Entities';

    public array $response;
    public int $response_code = 500;
    public function __construct()
    {
        $this->response['status']   = 'error';
        $this->response['message']  = 'Sistem xətası baş verdi! ';

    }

    public function orderDatatable(Request $request)
    {

        $class = $this->namespace . '\\' . Str::replace('.','\\',$request->model);

        $class = app($class);
//        $orderData=$request->order;
//
//
//        foreach ($orderData as $data) {
//            $class::where('id', $data['id'])
//                ->update(['order' => $data['position']]);
//        }

        $data = $request->input('reorderedData');

        foreach ($data as $key=>$item) {
            $class::where('id', $item['id'])
                ->update(['order' => $item['newPosition']]);
        }

        return response()->json(['success' => true,'message'=>'Sıralama dəyişdirildi']);
    }


    public function status(Request $request)
    {
        $this->validate($request,[
            "id"=>"required",
            "model"=>"required",
            "column"=>"required"
        ]);
        try{
            $class              = $request->model;
            if(class_exists($class)){
                $id             = $request->id;
                $item           = $class::find($id);
                if(!is_null($item)){
                    $column     = $request->column;
                        $item   = $class::find($id);
                        $item->$column =! $item->$column;
                        if($item->save()){
                            $this->response['message'] = 'Successfuly updated';
                            $this->response['status']  = 'success';
                            $this->response_code = 200;
                        }else{
                            $this->response['message'] = 'Yenilənmə zamanı xəta baş verdi!';
                        }

                }else{
                    $this->response['message']         = 'Item tapılmadı!';
                }
            }else{
                $this->response['message']             = 'Model tapılmadı!';
            }

        }catch (\Exception $e){
            $this->response['message']                .= $e->getMessage();
        }

        return response()->json($this->response,$this->response_code);

    }

    public function order(Request $request)
    {

        try {
            $class          =   $request->model;
            if (class_exists($class)){
                $modelInstance  =   app($class);
                $counter        =   0;
                parse_str($request->data,$order);
                if (isset($order['ord'])){
                    foreach ($order['ord'] as $key => $id){
                        $item = $modelInstance->find($id);
                        $item->order = $key;
                        if ($item->save())
                            $counter++;
                    }
                    if ($counter == count($order['ord'])){
                        $this->response['message'] = 'Successfuly updated';
                        $this->response['status']  = 'success';
                        $this->response_code = 200;
                    }
                    else{
                        $this->response['message'] = 'Yenilənmə zamanı xəta baş verdi!';
                    }
                }
                else{
                    $this->response['message'] = 'Data düz göndərilməyib!';
                }
            }
            else{
                $this->response['message'] = 'Model tapılmadı!';
            }
        }
        catch (\Exception $e){
            $this->response['message'] .= $e->getMessage();
        }
        return response()->json($this->response,$this->response_code);
    }

}
