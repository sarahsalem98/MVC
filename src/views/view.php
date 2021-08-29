<?php

namespace Sarah\views ;



class view {

    public static function make($view , $params=[]){
        $baseContent=self::getBaseContent();
        $viewContent=self::getViewContent($view, $params=[],$isError=false);

        echo str_replace('{{content}}', $viewContent,$baseContent);
    }


    protected static function getBaseContent() {
        ob_start();
        include base_path().'views/layouts/main.php';
        return ob_get_clean();
    }

   public static function makeError($error){
 
       self::getViewContent($error,$param=[],true);
    }

    protected static function getViewContent($view, $params=[] ,$isError=false ){
         $path = $isError ? view_path().'errors/':view_path() ;
         if(str_contains($view,'.')){
             $views=explode('.',$view);
             foreach($views as $view){
                 if (is_dir($path.$view)){
                     $path =$path.$view.'/';
                 }

             }
             $view=$path.end($views).'.php';
         }else{
            $view=$path.$view.'.php'; 
        }


        foreach($params as $param=>$value){
            $$param=$value;
        }

        if($isError){
          //  var_dump($isError);
        include $view;
        }else{
            ob_start();
            include $view;
          return  ob_get_clean();
        }
    }
}