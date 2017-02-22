<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		body {padding:100px;}
		.mt10 {margin-top:15px;margin-right:10px;}
	</style>
</head>
<body>
	<?php 
		session_start();
		require("./lib/Mysql.class.php");
		require("./model/MsgModel.class.php");
		require("./model/CatModel.class.php");
		require("./lib/comman.php");
		$msgModel = new MsgModel($mysql);
		$catModel = new CatModel($mysql);
		
		$catid = !empty($_GET["id"]) ? intval($_GET["id"]) : 0;

		$total = $msgModel->getTotalByCatId($catid);
		$pagesize = 5;
		$page = ceil($total / $pagesize);
		$p = isset($_GET['p']) ? intval($_GET['p']) : 1;

		
		if (!empty($catid)) {
			$msgList = $msgModel->getMsgListByCatId($p,$pagesize,$catid);
		}

		
	 ?>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-push-1">
				<nav class="navbar navbar-default" role="navigation">

					<ul class="nav navbar-nav">
						<li><a href="/">主页</a></li>
						<?php 
							$catList = $catModel->			
						getCatList();
							if (!empty($catList)) {
								foreach ($catList as $v) {
									?>
						<li class="dropdown">
							<a href="./cat.php?id=<?php echo $v['cat_id']?>
								" class="dropdown-toggle">
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
			<div class="col-md-10 col-md-push-1">
				<table class="table table-bordered table-hover text-center">
					<thead>
						<tr>
							<td>标题</td>
							<td>分类</td>
							<td>时间</td>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach ($msgList as $v) {

						?>
						<tr>
							<td><a href="detail.php?cid=<?php echo $v['cat_id']?>&id=<?php echo $v['message_id']?>"><?php echo $v['title'] ?></a></td>
							<td><?php echo $v['cat_name'] ?></td>
							<td><?php echo date('Y-m-d H-i-s',$v['addtime']) ?></td>
						</tr>
						<?php
							}
						 ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-push-3">
				<?php echo showpage($p,$page); ?>
			</div>
		</div>
	</div>	
</body>
</html>