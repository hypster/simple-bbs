<?php 
$query = "select * from sfk_info where id =1";
$result_info = execute($link, $query);
$data_info = mysqli_fetch_assoc($result_info);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<title><?php echo "{$template['title']}- {$data_info['title']}";?></title>
<meta name="keywords" content="<?php echo $data_info['keywords'];?>" />
<meta name="description" content="<?php echo $data_info['description'];?>" />
<?php 
foreach ($template['css'] as $val){
	echo "<link rel='stylesheet' type='text/css' href='{$val}' />";
}
?>
</head>
<body>
	<div class="header_wrap">
		<div id="header" class="auto">
			<div class="logo">sifangku</div>
			<div class="nav">
				<a href='/learn/bbs' class="hover">首页</a>
			</div>
			<div class="serarch">
				<form>
					<input class="keyword" type="text" name="keyword" placeholder="搜索其实很简单" />
					<input class="submit" type="submit" name="submit" value="" />
				</form>
			</div>
			<div class="login">
                            <?php 
                            if ($member_id) {
                                echo "<span style='color:#fff'>欢迎回来, <a href='member.php?id={$member_id}'>{$_COOKIE['sfk']['name']}</a></span> <a href='logout.php'>退出</a>";
                            } else {
                                echo "<a href='login.php'>登录</a>&nbsp;
				<a href='register.php'>注册</a>";
                            }
                            ?>
                            
			</div>
		</div>
	</div>
	<div style="margin-top:55px;"></div>
