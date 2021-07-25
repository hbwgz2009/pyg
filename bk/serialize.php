<?php
$arr=array('tom','jim','mike');
$str=serialize($arr);
file_put_contents('./file.text',$str);
$strr=file_get_contents('./file.text');
$arrs=unserialize($strr);
var_dump($arrs);
