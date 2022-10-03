<?php 
//TODO: 当前无论是修改还是添加页面在检查失败的情况下都会统一返回添加页面。需要区分两者。
if(empty($_POST['module_name'])){
	skip('father_module_add.php','error','版块名称不得为空！');
}

if(mb_strlen($_POST['module_name'], 'utf-8')>66){
	skip('father_module_add.php','error','版块名称不得多余66个字符！');
}
if(!is_numeric($_POST['sort'])){
	skip('father_module_add.php','error','排序只能是数字！');
}
$_POST=escape($link,$_POST);
switch ($check_flag){
	case 'add':
		$query="select * from sfk_father_module where module_name='{$_POST['module_name']}'";
		break;
	case 'update':
            //如果用户修改的版块同已存在的版块同名，则不允许修改
		$query="select * from sfk_father_module where module_name='{$_POST['module_name']}' and id!={$_GET['id']}";
		break;
	default:
		skip('father_module_add.php','error','$check_flag参数错误！');
}
$result=execute($link,$query);
if(mysqli_num_rows($result)){
	skip('father_module_add.php','error','这个版块已经有了！');
}
?>