<?php
namespace Core;


class Framework{
    public static function run(){
        self::init();
        self::initConfig();
        self::initRoute();
        self::initAutoload();
        self::dispach();
    }
    private static function init(){
        define('DS',DIRECTORY_SEPARATOR);
        define('ROOT_PATH',getcwd().DS);//入口文件所在的目录;
        define('APP_PATH',ROOT_PATH.'Application'.DS);//Application所在的目录;
        define('CONFIG_PATH',APP_PATH.'Config'.DS);//Config配置文件路径
        define('CONTROLLER_PATH',APP_PATH.'Controller'.DS);//控制器路径
        define('MODEL_PATH',APP_PATH.'Model'.DS);//模型路径
        define('VIEW_PATH',APP_PATH.'View'.DS);//视图路径
        define('FRAMEWORK_PATH',ROOT_PATH.'Framework'.DS);//框架Framework目录
        define('CORE_PATH',FRAMEWORK_PATH.'Core'.DS);
        define('LIB_PATH',FRAMEWORK_PATH.'Library'.DS);
        define('TRAITS_PATH',ROOT_PATH.'Traits'.DS);
    }
    //引入配置文件
    private static function initConfig(){
        $GLOBALS['config']=require CONFIG_PATH.'config.php';
    }
    private static function initRoute(){
        //设定路由
        $p=ucfirst(strtolower(isset($_GET['p'])?$_GET['p']:$GLOBALS['config']['app']['dp']));
        $c=isset($_GET['c'])?$_GET['c']:$GLOBALS['config']['app']['dc'];
        $c=ucfirst(strtolower($c));
        $a=strtolower(isset($_GET['a'])?$_GET['a']:'Index');
        $contro_name=$c.'Controller';
        $action_name=$a.'Action';
        //定义以下常量是为了不让销毁.
        define('PLATE_NAME',$p);//平台名常量
        define('CONTROLLER_NAME',$c);//控制器名称常量
        define('ACTION_NAME',$a);//方法名称常量
        define('__URL__',CONTROLLER_PATH.$p.DS);//当前请求控制器的URL;
        define('__VIEW__',VIEW_PATH.$p.DS);//当前视图目录地址
    }
    private static function initAutoload(){
        spl_autoload_register(function ($classname){
            $namespace=dirname($classname);//命名空间
            $classname=basename($classname);//获取类名
            switch ($namespace){
                case in_array($namespace,array('Core','Library')):
                    $path=FRAMEWORK_PATH.$namespace.DS.$classname.'.class.php';
                    break;
                case 'Model':
                    $path=MODEL_PATH.$classname.'.class.php';
                    break;

                case 'Traits':
                    $path=TRAITS_PATH.$classname.'.class.php';
                    break;
                default:
                    $path=CONTROLLER_PATH.PLATE_NAME.DS.$classname.'.class.php';
                    break;
            }
            //加载类文件
            if (file_exists($path) && is_file($path)){
                require $path;
            }

        });
    }
    //定义分发
    public static function dispach(){
        $controller_name='\Controller\\'.PLATE_NAME.'\\'.CONTROLLER_NAME.'Controller';
        $action=ACTION_NAME.'Action';
        $obj=new $controller_name();
        $obj->$action();
    }
}