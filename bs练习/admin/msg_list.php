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
	</style>
</head>
<body>
	<?php 

		require("../lib/Mysql.class.php");
		require("../model/MsgModel.class.php");
		require("../admin/lib.php");
		$msgModel = new MsgModel($mysql);

		if (isset($_GET['act']) && $_GET['act'] == 'del') {
			$id = intval($_GET['id']);
			if (!empty($id)) {
				$bRes = $msgModel->delMsg($id);
				if ($bRes) {
					echo '<script>alert("del success");</script>';
				} else {
					echo '<script>alert("del error");</script>';
				}
			}
		}
		

		$total = $msgModel->getTotal();
		$pagesize = 5;
		$page = ceil($total / $pagesize);
		$p = isset($_GET['p']) ? intval($_GET['p']) : 1;

		$msgList = $msgModel->getMsgList($p,$pagesize);

		
	 ?>
	<div class="container">
		<div class="row"><?php include("header.php"); ?></div>
		<div class="row">
			<a href="./msg_info.php?act=add" class="btn btn-primary pull-right">添加文章</a>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-push-1">
				<table class="table table-bordered table-hover text-center">
					<thead>
						<tr>
							<td>标题</td>
							<td>分类</td>
							<td>时间</td>
							<td>操作</td>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach ($msgList as $v) {

						?>
						<tr>
							<td><?php echo $v['title'] ?></td>
							<td><?php echo $v['cat_name'] ?></td>
							<td><?php echo date('Y-m-d H-i-s',$v['addtime']) ?></td>
							<td><a href="msg_info.php?act=edit&id=<?php echo $v['message_id']?>">修改</a> <a href="?act=del&id=<?php echo $v['message_id']?>">删除</a></td>
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