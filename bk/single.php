<?php
class DB{
    private  static $instance;
    private function __construct(){

    }
    private function __clone(){
              
    }
    public static function getObjet(){
        if (!self::$instance instanceof self){
            self::$instance=new self();
          }
        return self::$instance;
    }
}
$obj1=DB::getObjet();
//$obj2=clone $obj1;
//var_dump($obj1,$obj2);