<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
