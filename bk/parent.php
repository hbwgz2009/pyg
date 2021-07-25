<?php
header('Content-type:text/html;charset=utf-8');
class Person{
    protected $name;
    protected $sex;
    public function __construct($name,$sex){
          $this->name=$name;
          $this->sex=$sex;
          var_dump($this);
    }
}
class Son extends Person {
    private $core;
    public function __construct($name,$sex,$core){

//            Person::__construct();
        parent::__construct($name,$sex);
           echo "{$name}的分数是{$core}";
    }
}
$son=new Son('tom','男','85');
print_r($son);