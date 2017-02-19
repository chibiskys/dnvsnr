<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		body {padding:100px 0 0;}
		td {vertical-align: middle !important;}
	</style>
</head>
<body>
	<?php 
		require("../lib/Mysql.class.php");
		require('../model/SlideModel.class.php');
		$slideModel = new SlideModel($mysql);
	 ?>
	<div class="container">
		<div class="row"><?php include('header.php'); ?></div>
		<div class="row">
			<div class="col-md-6 col-md-push-3">
				<a href="./slide_info.php?act=add" class="btn btn-default">添加轮播图</a>
			</div>
		</div>
		<div class="row" style="margin-top:20px;">
			<div class="col-md-6 col-md-push-3">
				<table class="table table-hover table-striped table-bordered text-center">
					<thead>
						<tr>
							<td>图片</td>
							<td>是否显示</td>
							<td>排序</td>
							<td>操作</td>
						</tr>
					</thead>
					<tbody>
						<?php 
							if (isset($_REQUEST['act']) && $_REQUEST['act'] == 'del') {
								$id = intval($_REQUEST['id']);
								if (!empty($id)) {
									$oldSlideInfo = $slideModel->getSlideInfo($id);
									if (!empty($oldSlideInfo['img'])) {
										@unlink("../upload/" . $oldSlideInfo['img']);
									}
									$slideModel->deleteSlide($id);
								} 
							}
							$slideList = $slideModel->getSlideList();
							if (!empty($slideList)) {
								foreach ($slideList as $v) {
									?>
										<tr>
											<td><img src="../upload/<?php echo $v['img'] ?>"></td>
											<td><?php if ($v['is_show']) {
													echo "显示";	
											} else {
												echo "隐藏";
											} ?></td>
											<td><?php echo $v['sort'] ?></td>
											<td><a href="./slide_info.php?act=edit&id=<?php echo $v['slide_id']?>">修改</a> <a href="?act=del&id=<?php echo $v['slide_id']?>">删除</a></td>
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