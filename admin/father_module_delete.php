<?php 
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
include_once 'inc/is_manage_login.inc.php';//验证管理员是否登录
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
	skip('father_module.php','error','id参数错误！');
}

$query = "select * from sfk_son_module where father_module_id={$_GET['id']}";
execute($link, $query);
if (mysqli_num_rows($link)) {
    skip('father_module.php', 'error', '对不起，该版块下已添加子版块，请先删除子版块。');
}
$query="delete from sfk_father_module where id={$_GET['id']}";
execute($link,$query);
if(mysqli_affected_rows($link)==1){
	skip('father_module.php','ok','恭喜你删除成功！');
}else{
	skip('father_module.php','error','对不起删除失败，请重试！');
}
?>