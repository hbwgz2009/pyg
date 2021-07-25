<?php
header('Content-type:text/html;charset=utf-8');
class A{
    public function __construct(){
           var_dump($this);
    }
}
class B extends A{

}
new A();
new B();