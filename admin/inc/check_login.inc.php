<?php 
if(empty($_POST['name'])){
	skip('login.php','error','管理员名称不得为空！');
}
if(mb_strlen($_POST['name'])>32){
	skip('login.php','error','管理员名称不得多余32个字符！');
}

if(empty(mb_strlen($_POST['pw']))){
	skip('login.php','error','密码不得为空！');
}
if(mb_strlen($_POST['pw'])<6){
	skip('login.php','error','密码不得少于6位！');
}
if(empty(mb_strlen($_POST['vcode']))){
	skip('login.php','error','验证码不得为空！');
}
if(strtolower($_POST['vcode'])!=strtolower($_SESSION['vcode'])){
	skip('login.php', 'error','验证码输入错误！');
}
?>