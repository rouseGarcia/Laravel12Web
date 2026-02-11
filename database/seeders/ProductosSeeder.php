<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //
        DB::table('m_productos')->insert([
                [
                    'nombre' => 'Coca cola',
                    'precio' => 10.0,
                    'registro_activo' => true,
                ],
                [
                    'nombre' => 'Cheetos',
                    'precio' => 21.5,
                    'registro_activo' => true,
                ],
            ]
        );


    }
}
