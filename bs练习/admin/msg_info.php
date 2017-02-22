<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台新闻添加</title>
	<link rel="stylesheet" href="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		body {padding:100px;}
	</style>
	<link rel="stylesheet" href="./plugin/kindeditor/plugins/code/prettify.css" />
    <script charset="utf-8" src="./plugin/kindeditor/kindeditor.js"></script>
    <script charset="utf-8" src="./plugin/kindeditor/lang/zh_CN.js"></script>
    <script charset="utf-8" src="./plugin/kindeditor/plugins/code/prettify.js"></script>
    <script>
        KindEditor.ready(function(K) {
            var editor1 = K.create('textarea[name="content"]', {
                cssPath: './plugin/kindeditor/plugins/code/prettify.css',
                uploadJson: './plugin/kindeditor/php/upload_json.php',
                fileManagerJson: './plugin/kindeditor/php/file_manager_json.php',
                allowFileManager: true,
                afterCreate: function() {
                    var self = this;
                    K.ctrl(document, 13, function() {
                        self.sync();
                        K('form[name=msgform]')[0].submit();
                    });
                    K.ctrl(self.edit.doc, 13, function() {
                        self.sync();
                        K('form[name=msgform]')[0].submit();
                    });
                }
            });
            prettyPrint();
        });
    </script>
</head>
<body>
	<?php 
		error_reporting(0);
		require("../lib/Mysql.class.php");
		require("../model/MsgModel.class.php");
		require("../model/CatModel.class.php");
		require("../lib/comman.php");

		$catModel = new CatModel($mysql);
		

		$msgModel = new MsgModel($mysql);
		$act = "";
		$tipInfo = "";
		$msgInfo = array();
		if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "add" ) {
			$act = "insert";
			$tipInfo = "添加文章";
		} else if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "insert" || $_REQUEST["act"] == "update") {
			if (!empty($_POST["title"]) && !empty($_POST["content"])) {
				$title = htmlspecialchars($_POST["title"],ENT_QUOTES) ;
				$content = htmlspecialchars($_POST["content"],ENT_QUOTES);
				$addtime = time();
				$filename = upload();
				$cat_id = $_REQUEST["cat_id"];
				$msgInfo = array(
					"title"=>$title,
					"content"=>$content,
					"addtime"=>$addtime,
					"cat_id" => $cat_id
				);
				if (!empty($filename)) {
					$msgInfo["img"] = $filename;
				}
				if ($_REQUEST["act"] == "update") {
					$msgInfo["message_id"] = $_REQUEST["id"];
					$act = "update";
					$tipInfo = "更新文章";

					$oldMsg = $msgModel->getMsgInfo($_REQUEST["id"]);
					if (!empty($oldMsg["img"]) && !empty($msgInfo["img"])) {
						@unlink("../upload/" . $oldMsg["img"]);
					}
					if ($msgModel->updateMsg($msgInfo,"where message_id = " . $msgInfo["message_id"])) {
						echo '<script>alert("update ok");</script>';
					} else {
						echo '<script>alert("update error");</script>';
					}

					$msgInfo = $msgModel->getMsgInfo($_REQUEST["id"]);
				} else {
					$act = "insert";
					$tipInfo = "添加文章";
					if ($msgModel->addMsg($msgInfo)) {
						echo '<script>alert("add ok");</script>';
					} else {
						echo '<script>alert("add error");</script>';
					}
				}
				
			}
			
		} else if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "edit") {
			$act = "update";
			$id = intval($_REQUEST["id"]);
			if (!empty($id)) {
				$msgInfo = $msgModel->getMsgInfo($id);			
			}
			$tipInfo = "更新文章";
		} 
		
		
	 ?>
	<div class="container">
		<div class="row"><?php include('header.php'); ?></div>
		<div class="row">
			<div class="col-md-10 col-md-offset-2">
				<a href="./msg_list.php" class="btn btn-primary">返回列表</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-push-3">
				<form method="POST" role="form" class="form-horizontal" enctype="multipart/form-data" name="msgform">
			
					<div class="form-group">
						<div class="col-md-2"><label for="title" class="control-label">标题</label></div>
						<div class="col-md-10"><input name="title" type="text" class="form-control" placeholder="请输入标题" value="<?php if (!empty($msgInfo["title"])) {
							echo $msgInfo["title"];
						}?>"></div>
					</div>

					<div class="form-group">
						<div class="col-md-2"><label for="cat_id" class="control-label">分类</label></div>
						<div class="col-md-10">
							<select name="cat_id">
								<option value="0">请选择分类</option>
								<?php 
									$catList = $catModel->getCatList();
									if (!empty($catList)) {
										foreach ($catList as $v) {
											?>
												<option value="<?php echo $v['cat_id']?>" <?php echo $msgInfo["cat_id"] == $v["cat_id"] ? "selected" : "" ?>><?php echo $v["cat_name"]?></option>
											<?php
										}
									}
								 ?>
							</select>
						</div>
					</div>
					
					<?php 
						if (isset($msgInfo["img"])) {
					?>
						<div class="form-group">
							<label for="" class="control-label">已上传的图片</label>
							<?php 
								if (!empty($msgInfo["img"]) && file_exists("../upload/" . $msgInfo["img"])) {
									?>
										<img style="width:200px;" src="../upload/<?php echo $msgInfo["img"]?>" alt="">
									<?php
								}
							 ?>
						</div>
					<?
						}
					 ?>

					<div class="form-group">
						<div class="col-md-3"><label for="" class="control-label">图片上传</label></div>
						<div class="col-md-9"><input type="file" name="photo"></div>
					</div>

					<div class="form-group">
						<div class="col-md-2"><label for="content" class="control-label">描述</label></div>
						<div class="col-md-10">
							<textarea name="content" class="form-control" rows="20" cols="60" placeholder="请输入描述"><?php if (!empty($msgInfo["content"])) {
								echo $msgInfo["content"];
							} ?></textarea>
						</div>
					</div>
				
					<div class="form-group">
						<div class="col-md-10 col-md-offset-2">
							<button type="submit" class="btn btn-primary"><?php echo $tipInfo ?></button>
						</div>
						
					</div>
					<input type="hidden" name="act" value="<?php echo $act?>">
					<input type="hidden" name="id" value="<?php if (!empty($msgInfo["message_id"])) {
						echo $msgInfo["message_id"];
					}?>">
				</form>
			</div>
		</div>
	</div>
</body>
</html>