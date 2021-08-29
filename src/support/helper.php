<?php

use Sarah\views\view;

if(!function_exists('env')){
function env ($key ,$default=null){
    return $_ENV[$key] ?? $default;
}
}

if(!function_exists('value')){
    function value ($value){

        return $value instanceof Closure ? $value(): $value;
    }
}

if(!function_exists('base_path')){
    function base_path(){
           return dirname( __DIR__ ) .'/../';
    }
}
if(!function_exists('view_path')){
    function view_path(){
           return base_path() .'views/';
    }
}
if (!function_exists('view')){
    function view ($view ,$params){
        view::make($view,$params);
    }
}