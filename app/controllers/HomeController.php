<?php


namespace app\controllers;

class HomeController{
    public function index(){
        return view('home',$params=[]);
    }
}