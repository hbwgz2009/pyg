<?php
header('content-type:text/html;charset=utf8');
class DB{
    //定义类属性
    private $db_type;   //数据库类型
    private $host;      //数据库地址
    private $port;      //数据库端口
    private $db_name;   //数据库名称
    private $charset;   //数据库编码
    private $user_name; //数据库账号
    private $user_pwd;  //数据库密码
    private static $instance;  //数据库实例
    private  $pdo;  //存储pdo对象
    //构造函数私有化
    private function __construct($params){

        $this->init_params($params);
        $this->initPDO();
    }
    //克隆方法私有化
    private function __clone(){

    }
    //对外公共实例化方法
    public static function getInstance($params=array()){

          if (!self::$instance instanceof self){
               self::$instance=new self($params);
            }
          return self::$instance;
    }
    //初始化参数
    private function init_params($params){
        $this->db_type=$params['db_type']?$params['db_type']:'mysql';
        $this->host=$params['host']?$params['host']:'localhost';
        $this->db_name=$params['db_name']?$params['db_name']:'';
        $this->port=$params['port']?$params['port']:3306;
        $this->charset=$params['charset']?$params['charset']:'utf8';
        $this->user_name=$params['user_name']?$params['user_name']:'';
        $this->user_pwd=$params['user_pwd']?$params['user_pwd']:'';
    }
    //初始化pdo
    private function initPDO(){
        try {
            $dsn="$this->db_type:host=$this->host;port=$this->port;dbname=$this->db_name;charset=$this->charset";
            $this->pdo=new PDO($dsn,$this->user_name,$this->user_pwd);
            var_dump($this->pdo);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            echo '信息行:'.$e->getLine().'<br>';
            echo '错误码:'.$e->getCode().'<br>';
            echo '错误信息:'.$e->getMessage();
        }
    }
    //优化异常模式
    private function initException($e,$sql=''){
        if ($sql){
            echo 'sql语句执行失败'.'<br>';
          }
        echo '信息行:'.$e->getLine().'<br>';
        echo '错误码:'.$e->getCode().'<br>';
        echo '错误信息:'.$e->getMessage();
    }
    //执行增删改
    public function exec($sql){
        try
        {
           return $this->pdo->exec($sql);
        }catch (PDOException $e){
           $this->initException($e,$sql);
        }

    }

}
$params=array(
    'host'=>'localhost',
    'db_type'=>'mysql',
    'db_name'=>'heima',
    'port'=>'3306',
    'charset'=>'utf8',
    'user_name'=>'root',
    'user_pwd'=>'root',
);
$obj=DB::getInstance($params);
//$obj2=clone $obj;/
$sql="insert into sp_ceshi values (null,'1006','6000')";
$obj->exec($sql);