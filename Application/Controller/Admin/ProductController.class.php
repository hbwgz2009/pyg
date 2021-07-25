<?php
namespace Controller\Admin;

use Model\ProductMode;

class ProductController
{
    use \Traits\Jump;
    public function indexAction(){
        $obj=new ProductMode();
        $res=$obj->getList();
//        echo VIEW_PATH;die;
        require __VIEW__.'/productlist.html';
    }
//    public function listAction(){
//        $obj=new ProductMode();
//        $res=$obj->getList();
//        require './productlist.html';
//    }
    public function delAction(){
        $id=intval($_GET['id']);
        $obj=new ProductMode();
        if ($obj->del($id)){
            $this->success('index.php?p=admin&c=product&a=index','删除成功',1);
          }else{
            $this->error('index.php?c=product&a=index','删除失败');
            exit();
        }
    }
}