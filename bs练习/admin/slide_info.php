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
		.form-group {overflow: hidden;}
	</style>
</head>
<body>
	<?php 
		require("../lib/Mysql.class.php");
		require("../model/SlideModel.class.php");
		require("../lib/comman.php");
		$slideModel = new SlideModel($mysql);
	 ?>
	<?php 
		$act = "";
		$tipInfo = "";
		$slideInfo = array();
		if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "add") {
			$act = "insert";
			$tipInfo = "添加轮播";
		} else if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "insert" || $_REQUEST["act"] == "update") {
			$filename = upload();
			$is_show =  htmlspecialchars($_POST["is_show"],ENT_QUOTES);
			$sort = htmlspecialchars($_POST["sort"],ENT_QUOTES);
			$slideInfo = array(
				"is_show" => $is_show,
				"sort" => $sort
			);
			if (!empty($filename)) {
				$slideInfo["img"] = $filename;
			}
			
			$bRes = "";
			if ($_REQUEST["act"] == "update") {
				$act = "update";
				$tipInfo = "修改轮播";
				$slideInfo["slide_id"] = $_REQUEST["id"];
				$slideInfo["img"] = $filename;

				// 从数据库中取出老的img并且判断新的img是否存在,如果存在删除老的上传的img,在取出新的img
				$oldSlide = $slideModel->getSlideInfo($_REQUEST["id"]);
				if (!empty($oldSlide["img"]) && !empty($slideInfo["img"])) {
					@unlink("../upload/" . $oldSlide["img"]);
				}
				$bRes = $slideModel->updateSlide($slideInfo,"where slide_id = " . $slideInfo["slide_id"]);
				$slideInfo = $slideModel->getSlideInfo($_REQUEST["id"]);
			} else {
				$act = "insert";
				$tipInfo = "添加轮播";
				$bRes = $slideModel->addSlide($slideInfo);
			}

			if ($bRes) {
				echo "<script>alert('ok');</script>";
			} else {
				echo "<script>alert('error');</script>";
			}
			
		} else if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "edit") {
			$act = "update";
			$tipInfo = "修改轮播";
			$id = intval($_GET["id"]);
			if (!empty($id)) {
				$slideInfo = $slideModel->getSlideInfo($id);
			}
		}
	 ?>
	<div class="container">
		<div class="row"><?php include('header.php'); ?></div>
		<div class="row">
			<div class="col-md-6 col-md-push-3">
				<a href="./slide_list.php" class="btn btn-default">返回列表</a>
			</div>
		</div>
		<div class="row" style="margin:20px 0 0;">
			<div class="col-md-6 col-md-push-3">
				<form action="" method="POST" role="form" enctype="multipart/form-data">
					<?php 
						if (isset($slideInfo["img"])) {
					?>
						<div class="form-group">
							<div class="col-md-3"><label for="" class="control-label">已上传图片</label></div>
							<div class="col-md-9"><?php if (!empty($slideInfo["img"]) && file_exists("../upload/" . $slideInfo["img"])) {
						?>
							<img src="../upload/<?php echo $slideInfo["img"]?>" alt="">
						<?php
							} ?></div>
						</div>
					<?php
						}
					 ?>

					<div class="form-group">
						<div class="col-md-2"><label for="" class="control-label">上传图片</label></div>
						<div class="col-md-10"><input type="file" class="form-control" name="photo"></div>
					</div>
					<div class="form-group">
						<div class="col-md-2"><label for="" class="control-label">是否显示</label></div>
						<div class="col-md-10">
							隐藏 <input type="radio" name="is_show" value="0" checked>
							显示 <input type="radio" name="is_show" value="1" <?php if (isset($slideInfo["is_show"]) && $slideInfo["is_show"] == "1"){
								echo "checked";
						}?> >
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-2"><label for="" class="control-label">排序</label></div>
						<div class="col-md-10"><input type="text" class="form-control" name="sort" value="<?php if (!empty($slideInfo["sort"])) {
							echo $slideInfo["sort"];
						}?>"></div>
					</div>
				
					<div class="form-group">
						<div class="col-md-10 col-offset-2">
							<button type="submit" class="btn btn-primary"><?php echo $tipInfo?></button>
							<input type="hidden" name="act" value="<?php echo $act?>">
							<input type="hidden" name="id" value="<?php if (!empty($slideInfo["slide_id"])) {
								echo $slideInfo["slide_id"];
							}?>">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>