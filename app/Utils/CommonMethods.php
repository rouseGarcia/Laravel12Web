<?php


use App\Utils\ApiRespose;

if (!function_exists('generalTest')) {
    function generalTest(){
        return 'desde  la funcion general';
    }
}

if (!function_exists('generalTest2')) {
    function generalTest2(){
        return 'desde  la funcion general 2';
    }
}

if (!function_exists('ok')) {
    function ok($data = null){
        return (new ApiRespose())->ok($data);
    }
}
