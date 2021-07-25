<?php
namespace China\Beijing\Shunyi;
class Student {
}
function getInfo() {
    echo '李白<br>';
}
const TYPE='学生';
namespace USA;
//引入类
use China\Beijing\Shunyi\Student;
//引入函数
//use function China\Beijing\Shunyi\getInfo as getfo;
////引入常量
//use const China\Beijing\Shunyi\TYPE;

//测试
$stu=new Student;
var_dump($stu);
echo '<br>';
//getfo();
//echo TYPE;