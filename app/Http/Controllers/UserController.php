<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Utils\ApiRespose;
use HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function getProducts()
    {
        $productosQB = DB::table('m_productos')->where('id',1)->get();
        $productos = Productos::where('id',1)->get();
        dd($productos, $productosQB);
    }

    public function index($id = null){


        return view('userIndex',['id' => $id]);
    }


    public function testHttp(){
        $arrayFinal = [];
        try {
            $response = Http::get('https://api.restful-api.dev/objects32');

            if ($response->getStatusCode() == 200) {
                $arrayDispositivos = json_decode($response->body());


                foreach ($arrayDispositivos as $key => $value) {
                    $arrayFinal[] = $value->name;
                }


            }else{
                Log::error($response->getStatusCode());
                Log::error($response->getBody());
                return (new ApiRespose())->error('jkjkashdjhaskjdgkjasgkjgaskdgkug',Response::HTTP_BAD_REQUEST,562);
            }


        }catch (\Exception $e){
            Log::error($e->getMessage());
            return $e->getMessage();
        }

//        $response = new ApiRespose();
//        return $response->ok($arrayFinal);

//        return (new ApiRespose())->ok($arrayFinal);
        return ok($arrayFinal);
    }
}
