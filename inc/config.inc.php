<?php 
session_start();
header('Content-type:text/html;charset=utf-8');
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_DATABASE','bbs');
define('DB_PORT',3306);
//我们的项目（程序），在服务器上的绝对路径
define('SA_PATH',dirname(dirname(__FILE__)));
//我们的项目在web根目录下面的位置（哪个目录里面）
define('SUB_URL',str_replace($_SERVER['DOCUMENT_ROOT'],'',str_replace('\\','/',SA_PATH)).'/');

?>