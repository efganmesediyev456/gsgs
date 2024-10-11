<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public array $response;
    public int $response_code = 500;

    public function __construct()
    {
        $this->response = ['status' => "error", 'message' => '', 'data' => []];
    }


    public function success_response($item = [], $message = ' Məlumat uğurla yaradıldı! ')
    {
        $this->response['status']       = 'success';
        $this->response['message']      = $message;
        $this->response['data']         = $item;
        $this->response_code            = 200;
    }


    public function response_json()
    {
        return response()->json($this->response, $this->response_code);
    }
}
