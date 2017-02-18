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
		error_reporting(0);
		require("../lib/Mysql.class.php");
		require("../model/CatModel.class.php");
		$catModel = new CatModel($mysql);
		$act = "";
		$tipInfo = "";
		$catInfo = array();
		if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "add") {
			$act = "insert";
			$tipInfo = "添加分类";
		} else if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "insert" || $_REQUEST["act"] == "update") {
				
				$cat_name = htmlspecialchars($_POST["cat_name"],ENT_QUOTES);
				$catInfo = array("cat_name"=>$cat_name,"pid"=>0);
				$bRes = "";
				if ($_REQUEST["act"] == "update") {
					$act = "update";
					$tipInfo = "修改分类";
					$id = $_REQUEST["id"];
					$catInfo["cat_id"] = $id;
					$bRes = $catModel->updateCat($catInfo,"where cat_id = $id");
					
				} else {
					$act = "insert";
					$tipInfo = "添加分类";
					if (!empty($cat_name)) {
						$bRes = $catModel->addCat($catInfo);
					} 
					
				}
				

				if ($bRes) {
					echo '<script>alert("ok");</script>';
				} else {
					echo '<script>alert("error");</script>';
				}
				
		
			
		} else if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "edit") {
			$act = "update";
			$tipInfo = "修改分类";
			$id = intval($_REQUEST["id"]);
			if (!empty($id)) {
	 			$catInfo = $catModel->editCat($id);
			}
		}
	 ?>
	<div class="container">
		<div class="row">
			<?php include('header.php'); ?>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-push-3"><a href="category_list.php" class="btn btn-default">返回列表</a></div>
		</div>
		<div class="row" style="margin-top:20px;">
			<div class="col-md-6 col-md-push-3">
				<form action="" method="POST" role="form" class="form-horizontal">
					<div class="form-group">
						<div class="col-md-2"><label for="" class="control-label">分类名</label></div>
						<div class="col-md-10"><input type="text" class="form-control" name="cat_name" placeholder="请输入分类名称" value="<?php if (!empty($catInfo)){
							echo $catInfo["cat_name"];
						}?>"></div>
					</div>
					<div class="form-group">
						<div class="col-md-10 col-md-offset-2">
							<button type="submit" class="btn btn-primary"><?php echo $tipInfo ?></button>
							<input type="hidden" name="act" value="<?php echo $act?>">
							<input type="hidden" name="id" value="<?php if (!empty($catInfo)){
								echo $catInfo["cat_id"];
							}?>">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>