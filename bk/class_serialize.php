<?php
class Student{
    public $name;
    private $sex;
    protected $age;
    public function show($name,$sex,$age){
       $this->name=$name;
       $this->sex=$sex;
       $this->age=$age;
    }
}
//$obj=new Student('tom','男',35);
//$str=serialize($obj);
//file_put_contents('./1.txt',$str);
$str=file_get_contents('./1.txt');
$obj=unserialize($str);
var_dump($obj);