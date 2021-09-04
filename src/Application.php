<?php

namespace Sarah;

use Sarah\Http\Request;
use Sarah\Http\Response;
use Sarah\Http\Route;
use Sarah\support\config;

class Application{

protected Route $route;
protected Request $request;
protected Response $responce;
protected config $config;
    public function __construct()
    {
      
      $this->request=new Request;
      $this->responce=new Response;  
      $this->route=new Route($this->request,$this->responce);
      $this->config=new config($this->loadConfiguration());
    }

    public function loadConfiguration(){
   
      foreach(scandir(config_path())as $file){
        if($file==='.'||$file==='..'){
          continue;
        }
       $filename=explode('.',$file)[0];
        yield $filename=>require config_path().$file;

      }
    }

    public function run (){
      $this->route->resolve();
    }

    public function __get($name){
if (property_exists($this,$name)){
    return $this->$name;
}
    }
}