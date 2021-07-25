<?php
header('content-type:text/html;charset=utf8');
$dsn='mysql:dbname=heima;charset=utf8';
$db=new PDO($dsn,'root','root');
//$sql="insert into sp_ceshi values (?,?)";
$res=$db->prepare("insert into sp_balance values (?,?)");
$arr=array(
    array(1,'530'),
    array(2,'340')
);
//var_dump($arr[0]);
foreach ($arr as $v){
//    var_dump($v);
    $res->bindParam(1,$v[0]);
    $res->bindParam(2,$v[1]);
    $res->execute();
//    $res->execute($v);
}
