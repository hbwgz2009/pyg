<?php
header('content-type:text/html;charset=utf-8');
class Student{
    public function __call($fn,$arguments){
        $sum=0;
        foreach ($arguments as $value){
            $sum+=$value;
        }
        echo implode(',',$arguments).'的和是:'.$sum.'<br>';
    }
}
$obj=new Student();
$obj->call(10,20);
$obj->call(110,220,300);