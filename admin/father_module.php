<?php 
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
$link=connect();
?>
<?php include 'inc/header.inc.php'?>
<div id="main">
	<div class="title">父版块列表</div>
	<table class="list">
		<tr>
			<th>排序</th>	 	 	
			<th>版块名称</th>
			<th>操作</th>
		</tr>
		<?php 
		$query="select * from sfk_father_module";
		$result=execute($link,$query);
		while ($data=mysqli_fetch_assoc($result)){
			$url=urlencode("father_module_delete.php?id={$data['id']}");
			$return_url=urlencode($_SERVER['REQUEST_URI']);
			$message="你真的要删除父版块 {$data['module_name']} 吗？";
			$delete_url="confirm.php?url={$url}&return_url={$return_url}&message={$message}";
$html=<<<A
			<tr>
				<td><input class="sort" type="text" name="sort" /></td>
				<td>{$data['module_name']}[id:{$data['id']}]</td>
				<td><a href="#">[访问]</a>&nbsp;&nbsp;<a href="#">[编辑]</a>&nbsp;&nbsp;<a href="$delete_url">[删除]</a></td>
			</tr>
A;
			echo $html;
		}
		?>
		
	</table>
</div>
<?php include 'inc/footer.inc.php'?>