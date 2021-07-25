<?php
header('content-type:text/html;charset=utf8');
class DB{
    private $host;
    private $user;
    private $pwd;
    private $db_name;
    private $port;
    private $char_set;
    private $link;
    private static $instance;
    private function __construct($params){
//        $link=mysqli_connect('localhost','root','root','db_name','3306');
          $this->init_params($params);
          self::connect();

    }
    //初始化参数
    private function init_params($params){
        $this->host=$params['host']?$params['host']:'localhost';
        $this->user=$params['user_name']?$params['user_name']:'';
        $this->pwd=$params['pwd']?$params['pwd']:'';
        $this->db_name=$params['db_name'];
        $this->char_set=$params['charset']?$params['charset']:'utf8';
        $this->port=$params['port']?$params['port']:'3306';
    }
    private function __clone(){

    }
    public static function getInstance($params=array()){
        if (!self::$instance instanceof  self){
            self::$instance=new self($params);
        }
        return self::$instance;
    }
    //连接数据库
    private function connect(){
       $this->link=@mysqli_connect($this->host,$this->user,$this->pwd,$this->db_name,$this->port);
//       var_dump($this->link);
       if (mysqli_connect_error()){
             echo '数据库连接失败';
             echo '错误信息:'.mysqli_connect_error().'<br>';
             echo '错误码:'.mysqli_connect_errno().'<br>';
             exit;
         }
       mysqli_set_charset($this->link,$this->char_set);
    }
    //数据库执行
    private function execute($sql){
        if (!$rs=mysqli_query($this->link,$sql)){
            echo '数据库语句执行失败';
            echo '错误信息:'.mysqli_error($this->link).'<br>';
            echo '错误码:'.mysqli_errno($this->link).'<br>';
            exit;
          }
        return $rs;
    }
    //执行增删改
    public function exec($sql){
        if (in_array(substr($sql,0,6),array('update','insert','delete'))){
           return $this->execute($sql);
          }else{
            echo '非法访问';
        }
    }
    public function getLastid(){
        return mysqli_insert_id($this->link);
    }
    
    //查询
    private function query($sql){

        if (substr($sql,0,6)=='select' || substr($sql,0,4)=='desc' || substr($sql,0,4)=='show'){
            return  $this->execute($sql);
          }else{
            echo '非法访问';
        }
    }
    //执行查询语句返回二维数组;
    public function fetchAll($sql,$type='assoc'){
       $rs=$this->query($sql);
       $type=$this->getType($type);
       return mysqli_fetch_all($rs,$type);
    }
    //执行查询语句返回一维数组
    public function fecthRow($sql,$type='assoc'){
        $list=$this->fetchAll($sql,$type);
        if (!empty($list)){
            return $list[0];
          }else{
            return array();
        }
    }
    //指向查询返回一个数字
    public function fetchColumn($sql){
       $list=$this->fecthRow($sql,'num');
       if (!empty($list)){
           return $list[0];
         }else{
           return null;
       }
    }
    //获取匹配类型
    private function getType($type){
        switch ($type){
            case 'num':
                return MYSQLI_NUM;
            case 'both':
                return MYSQLI_BOTH;
            default :
                return MYSQLI_ASSOC;
        }
    }
}
//配置参数
$params=array(
    'host'=>'localhost',
    'user_name'=>'root',
    'pwd'=>'root',
    'charset'=>'utf8',
    'db_name'=>'heima',
    'port'=>'3306',
);
//获取单例
$db=DB::getInstance($params);

//var_dump($db);
//$db->execute('insert into ');
//$db->exec("insert into sp_so values ('null','鲁智深')");
//$list=$db->fetchAll("select * from sp_so",'num');
$list=$db->fetchAll("select * from sp_so where id=1");
$list=$db->fecthRow("select count(*) from sp_so");
var_dump($list);
