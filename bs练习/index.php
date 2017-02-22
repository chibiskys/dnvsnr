<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
		body {padding:100px 0 0;}
		.mt10 {margin-top:15px;margin-right:10px;}
	</style>	
</head>
<body>
	<?php 
		session_start();
		require('./lib/Mysql.class.php');
		require('./model/MsgModel.class.php');
		require('./admin/lib.php');
		require("./model/MemberModel.class.php");
		require("./model/CatModel.class.php");
		$memberModel = new Member($mysql);
		$catModel = new CatModel($mysql);
		$MsgModel = new MsgModel($mysql);
		
	 ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-default" role="navigation">

					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="/">主页</a>
						</li>
						<?php 
							$catList = $catModel->			
						getCatList();
							if (!empty($catList)) {
								foreach ($catList as $v) {
									?>
						<li class="dropdown">
							<a href="./cat.php?id=<?php echo $v['cat_id']?>
								" class="dropdown-toggle" data-toggle="dropdown">
								<?php echo $v['cat_name'] ?></a>
						</li>
						<?php
								}
							}
						 ?></ul>
						 <div class="pull-right mt10">
						 	<?php 
						 		if (!empty($_SESSION['username'])) {
						 			?>
						 			<a href="./user.php">欢迎您,<?php echo !empty($_SESSION['username']) ? $_SESSION['username'] : ''; ?></a> | <a href="./user.php?act=loginout">退出</a>
						 			<?php
						 		} else {
						 			?>
								 	<a href="./user.php">注册</a> | <a href="./user.php">登陆</a>
						 			<?php
						 		}
						 	 ?>
						 	
						 </div>
					</nav>
				</div>
		</div>
		

		<div class="row">

			<?php 
				$total = $mysql->getCol("select count(*) as total from message");
				$pagesize = 5;
				$page = ceil($total / $pagesize);
				$p = isset($_GET['p']) ? intval($_GET['p']) : 1;

				
				$msgList = $MsgModel->getMsgList($p,$pagesize);
			?>
			<?php 
				echo showpage($p,$page);
			 ?>
			<?php
				if (!empty($msgList)) {
					foreach ($msgList as $v) {
			?>
				<div class="media">
					
						<?php 
							if (!empty($v["img"]) && file_exists("./upload/" . $v["img"])) {
						?>
							<a class="pull-left" href="detail.php?cid=<?php echo $v["cat_id"]?>&id=<?php echo $v["message_id"]?>"><img class="media-object" style="width:200px;height:150px;" src="upload/<?php echo $v['img']?>" alt=""></a>
						<?php
							} else {
						?>
							<a class="pull-left" href="detail.php?cid=<?php echo $v["cat_id"]?>&id=<?php echo $v["message_id"]?>"><img class="media-object" style="width:200px;" src="images/nopic.jpg" alt=""></a>
						<?php
							}
						 ?>
			
					<div class="media-body">
						<h3><?php echo $v['title'] ?></h3>
						<div class="cnt"><?php
						 echo mb_substr(strip_tags(htmlspecialchars_decode($v['content'])), 0,360,'utf-8')?></div>
					</div>
				</div>
			<?php
					}
				}
			 ?>
		
			<?php 
				echo showpage($p,$page);
			 ?>
			
			
			

		</div>
	</div>
</body>
</html>