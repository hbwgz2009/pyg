<?php
//定义类实现迭代器接口
class Myclass implements Iterator {
    private $student=array('name'=>'tom','age'=>'23','sex'=>'男');
    //指针复位
    public function rewind(){
         reset($this->student);
    }
    //指针判断
    public function valid(){
        return key($this->student)!==null;
    }
    //当前位置
    public function current(){
         return current($this->student);
    }
    //获取键值对
    public function key(){
        return key($this->student);      
    }
    public function next(){
         next($this->student);
    }
}
$student=new Myclass();
foreach ($student as $k=>$v){
    echo "{$k}|{$v}";
}