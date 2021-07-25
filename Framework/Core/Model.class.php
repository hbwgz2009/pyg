<?php
namespace  Core;

class Model
{
    protected $pdo;
    public function __construct(){
        $this->initPdo();
    }
    //连接数据库
    private function initPdo(){
        $arr=array('user'=>'root','pwd'=>'root','dbname'=>'heima');
        $this->pdo= MyPDO::getInstance($arr);
    }
}