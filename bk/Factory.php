<?php
class Product1{

}

class Product2{

}
class Product3{

}
class Factory
{
    public function create($num){
        switch ($num){
            case 1:
                return new Product1();
            case 2;
                return new  Product2();
            default:
                return new Product3();
        }
    }

}
$factory=new Factory();
$obj1=$factory->create(1);
$obj2=$factory->create(2);
var_dump($obj1,$obj2);