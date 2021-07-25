<?php
header('content-type:text/html;charset=utf8');
$dsn='mysql:host=localhost;port=3306;dbname=heima;charset=utf8';
$db=new PDO($dsn,'root','root');
//$res=$db->exec("insert into sp_ceshi values (null,'京东','jjjj')");
//echo '自动编号:'.$db->lastInsertId();

//$res=$db->exec("update sp_ceshi set proname='最好的内容' where id=1");
//echo $res;
//$sql="insert into sp_ceshi values4 (null,'京东','jjjj')";
//$sql="update sp_ceshi set proname='最好的内容' where id=3";
$sql="select * from sp_ceshi";
if (substr($sql,0,6)=='select'){
    $stmt=$db->query($sql);//查询结果集保存到一个对象中.
    //获取二维数组
//    $rs=$stmt->fetchAll();//默认返回关联和索引
//    $rs=$stmt->fetchAll(PDO::FETCH_OBJ);//返回一个对象
    //获取一维数组
//    $rs=$stmt->fetch(PDO::FETCH_OBJ);//返回对象数组;
//    $rs=$stmt->fetch(PDO::FETCH_ASSOC);//返回关联数组
//      $rs=$stmt->fetch(PDO::FETCH_NUM); //返回索引数组
    //循环数组while
//    while ($row=$stmt->fetch(PDO::FETCH_NUM)){
//        $rs[]=$row;
//    }
    //获取匹配列,匹配后指针下移
//    $rs=$stmt->fetchColumn(1);
//    $rs=$stmt->fetchColumn();
//    $rs=$stmt->fetchColumn();
//    $rs=$stmt->fetchColumn();
    //总行数总列数
//    $rs=$stmt->rowCount();
//    $rs=$stmt->columnCount();
//    echo '<pre>';
//    var_dump($rs);
    foreach ($stmt as $v){
//        print_r($v);
//        var_dump($stmt);
        echo $v['proname'].'----'.$v['id'];
    }
  }else{
$res=$db->exec($sql);
if ($res){
        if (substr($sql,0,6)=='insert'){
              echo '自动编号:'.$db->lastInsertId();
          }else{
            echo $res;
        }
  }elseif ($res==false){

          echo $db->errorCode();
          $arr=$db->errorInfo();
          echo $arr[2];


}else{
    echo '数据没有变化';
}
}

