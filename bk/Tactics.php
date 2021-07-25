<?php
class Walk{
    public function play(){
        echo '1';
    }
}
class Run{
    public function play(){
        echo '2';
    }
}
class Tactics
{
    public function go($para){
        $para=ucfirst($para);
         $obj=new $para();
         $obj->play();
    }
}
$obj=new Tactics();
$obj->go('walk');