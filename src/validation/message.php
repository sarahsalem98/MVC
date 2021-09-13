<?php 
namespace Sarah\validation;
class message{
    public  static function generate($rule,$field){
    printf( str_replace('%s',$field,$rule)) ;
    }
}