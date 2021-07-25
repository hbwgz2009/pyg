<?php
namespace Model;
use Core\Model;

class ProductMode extends Model
{
    public function getList(){

        return $res=$this->pdo->fetchAll("select * from products");

    }
    public function del($id){
         return $this->pdo->exec("delete from Products where proID=$id");
    }
}