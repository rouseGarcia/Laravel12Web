<?php

namespace App\Utils;

use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class ApiRespose
{
    private $status;
    private $message;
    private $data = [];

    public function __construct(){
        $this->status = 200;
        $this->message = Lang::get('text.messages.ok');
        $this->data = [];
    }


    public function ok($data){

        $this->data = $data;
        $this->status = Response::HTTP_OK;
        $this->message = Lang::get('text.messages.ok');

        return response()->json([
            'data' => $this->data,
            'status' => $this->status,
            'message' => $this->message
        ]);
    }
    public function error($message = null,$status = Response::HTTP_INTERNAL_SERVER_ERROR, $data = null, ){

        $this->message = $message;
        $this->data = $data;
        $this->status = $status;

        if(is_null($message)){
            $this->message = Lang::get('text.messages.error');
        }


        return response()->json([
            'data' => $this->data,
            'status' => $this->status,
            'message' => $this->message
        ]);
    }


    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function setMessage($message){
        $this->message = $message;
    }
    public function setData($data){
        $this->data = $data;
    }


}
