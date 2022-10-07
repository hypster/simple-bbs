<?php 
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$link=connect();
$template['css'] = array("style/public.css", "style/index.css");
$template['title']="首页";
$member_id = is_login($link);
?>
<?php include_once 'inc/header.inc.php' ?>
    

	<div id="hot" class="auto">
		<div class="title">热门动态</div>
		<ul class="newlist">
			<!-- 20条 -->
			<li><a href="#">[库队]</a> <a href="#">私房库实战项目录制中...</a></li>
			
		</ul>
		<div style="clear:both;"></div>
	</div>
<?php 
$query = "select * from sfk_father_module";
$father_result = execute($link, $query);
while ($father_data = mysqli_fetch_assoc($father_result)) { ?>

            <div class="box auto">
		<div class="title">
                        <?php echo "<a href='list_father.php?id={$father_data['id']}'>{$father_data['module_name']}</a>";?>
		</div>
                <?php 
                $query = "select * from sfk_son_module where father_module_id={$father_data['id']}";
                $son_result = execute($link, $query);
                if (mysqli_num_rows($son_result)) {
                    while($son_data = mysqli_fetch_assoc($son_result)){ 
                        $query = "select count(*) from sfk_content where module_id={$son_data['id']}";
                        $total_count = num($link, $query);
                        $query = "select count(*) from sfk_content where module_id={$son_data['id']} and time> curdate()";
                        $today_count = num($link, $query);
                          $html=<<<html
                                <div class="classList">
                            <div class="childBox new">
                                    <h2><a href="#">{$son_data['module_name']}</a> <span>(今日{$today_count})</span></h2>
                                    帖子：{$total_count}<br />
                            </div>
                            <div style="clear:both;"></div>
                            </div>
    html;
                                    echo $html;
                    }
                } else {
                    echo '<div class="classList"><div style="padding:10px 0;">暂无子版块...</div></div>';
                }
                while ($son_data = mysqli_fetch_assoc($son_result)) {
                    
                }
                ?>
		
	</div>
<?php } ?>
	

	
<?php include_once "inc/footer.inc.php"; ?>