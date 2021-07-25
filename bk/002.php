<?php
header('content-type:text/html;charset=utf8');
    try {
        $dsn='mysql:host=localhost;dbname=heima;charset=utf8';
        $pdo=new PDO($dsn,'root','root');
//        var_dump($pdo);
        $sql='select * from sp_balance987';

        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $pdo->query($sql);
    }catch (PDOException $ex){
        echo $ex->getMessage();
        echo $ex->getCode();
    }