<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
	body {padding:100px;}
</style>
</head>
<body>
	<?php 
		require('./lib/Mysql.class.php');
		require('./model/MsgModel.class.php');
		require('./admin/lib.php');
		$MsgModel = new MsgModel($mysql);
		// add
		if (!empty($_POST['title']) && !empty($_POST['content'])) {
			$title = htmlspecialchars($_POST['title'],ENT_QUOTES);
			$content = htmlspecialchars($_POST['content'],ENT_QUOTES);
			$data = array(
				'title'=>$title,
				'content'=>$content,
				'addtime'=>time()
				);
			
			$bRes = $MsgModel->addMsg($data);
			if ($bRes) {
				echo '<script>alert("add success");</script>';
			} else {
				echo '<script>alert("add error");</script>';
			}
		}
	 ?>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-push-3">
				<form action="" method="POST" role="form" class="form-horizontal">
					<div class="form-group">
						<div class="col-md-2">
							<label for="title" class="control-label">标题</label>
						</div>
						<div class="col-md-10">
							<input type="text" name="title" class="form-control" placeholder="请输入标题">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-2">
							<label for="content" class="control-label">描述</label>
						</div>
						<div class="col-md-10">
							<textarea name="content" class="form-control" rows="3" placeholder="请输入描述"></textarea>
						</div>
					</div>
				
					<div class="form-group">
						<div class="col-md-10 col-md-offset-2">
							<button type="submit" class="btn btn-primary">提交</button>
						</div>
					</div>
					
				
				</form>
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
							<a class="pull-left" href="detail.php?id=<?php echo $v["message_id"]?>"><img class="media-object" style="width:200px;height:150px;" src="upload/<?php echo $v['img']?>" alt=""></a>
						<?php
							} else {
						?>
							<a class="pull-left" href="detail.php?id=<?php echo $v["message_id"]?>"><img class="media-object" style="width:200px;" src="images/nopic.jpg" alt=""></a>
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