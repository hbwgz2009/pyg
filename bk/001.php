<?php
header('content-type:text/html;charset=utf8');
$dsn='mysql:host=localhost;dbname=heima;charset=utf8;';
$db=new PDO($dsn,'root','root');
//pdo预处理
$sql="insert into sp_balance values (:p1,:p2)";
$stmt=$db->prepare($sql);
$arrs=array(array(1001,4000),array(1004,3000));
foreach ($arrs as $v) {
    $stmt->bindParam(':p1',$v[0]);
    $stmt->bindParam(':p2',$v[1]);
    $stmt->execute();
        }