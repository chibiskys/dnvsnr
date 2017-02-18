<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		body {padding-top: 100px}
	</style>
</head>
<body>
	<?php 
		require('../lib/Mysql.class.php');
		require('../model/CatModel.class.php');
		$catModel = new CatModel($mysql);

		if (isset($_REQUEST["act"]) && $_REQUEST["act"] == 'del') {
			$id = intval($_REQUEST["id"]);
			if (!empty($id)) {
				$bRes = $catModel->deleteCat($id);
				if ($bRes) {
					echo "<script>alert('ok');</script>";
				} else {
					echo "<script>alert('error');</script>";
				}
			}
		}
	 ?>
	<div class="container">
		<div class="row"><?php include("header.php"); ?></div>
		<div class="row">
			<div class="col-md-6 col-md-push-1"><a href="category_info.php?act=add" class="btn btn-default">添加分类</a></div>
		</div>
		<div class="row" style="margin-top:20px;">
			<div class="col-md-8 col-md-push-2">
				<table class="table table-hover table-bordered text-center">
					<thead>
						<tr>
							<td>id</td>
							<td>分类名</td>
							<td>操作</td>
						</tr>
					</thead>
					<tbody>
						<?php 
							$catList = $catModel->getCatList();
							if (!empty($catList)){
								foreach ($catList as $v) {
						?>
							<tr>
								<td><?php echo $v['cat_id']?></td>
								<td><?php echo $v['cat_name']?></td>
								<td><a href="category_info.php?act=edit&id=<?php echo $v['cat_id']?>">修改</a> <a href="?act=del&id=<?php echo $v['cat_id']?>">删除</a></td>
							</tr>
						<?php
								}
							}
						 ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>