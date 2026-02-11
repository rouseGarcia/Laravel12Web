<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    //

    public function hola(){
        return 'Hola mundo desde controllador';
    }

    public function datosFormulario(Request $resquest){
        $resquest->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
        ]);

        return 'Hola mundo desde controllador';
    }

    public function index(){

        $data = DB::table('m_productos')->select('id', 'nombre')->get();

        //config('constantes.nombre')
        return view('productos', ['listaProductos' => $data, 'nombre' => Config::get('constantes.nombre') ]);
    }

    public function listarProductos(){

        $data = DB::table('m_productos')->select('id', 'nombre', 'precio')->get(); //Query builder
        return $data;

        //dd( Productos::all() );
        // return Productos::select('nombre')->get();
        // return Productos::select('id', 'nombre', 'precio')->get();
        //return Productos::all();
    }

    public function listarUnProducto($id){

        //$data = DB::table('productos')->select('id', 'nombre', 'precio')->where('id', '=', $id) ->get();
        $data = Productos::select('id', 'nombre', 'precio')->where('id', '=', $id)->get();
        return $data;

    }
}
