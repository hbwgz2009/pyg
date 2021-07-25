<?php
header('content-type:text/html;charset=utf-8');
class  Magic{
    public $name;
    public $sex;
    public $age;
    public function __toString(){
        echo '2';
          return '这个是转字符方法';
    }
    public function setAttr($name,$sex,$age){
          $this->age=$age;
          $this->sex=$sex;
          $this->name=$name;
    }
}
$obj=new Magic();
echo $obj;

