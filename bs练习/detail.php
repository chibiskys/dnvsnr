<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style>
		.bd {border:1px solid #eee;margin:10px 0;padding-left:10px;}
	</style>
</head>
<body>
	<?php 
		session_start();
		require("./lib/Mysql.class.php");
		require("./lib/comman.php");
		require("./model/MsgModel.class.php");
		require("./model/CatModel.class.php");
		require("./model/CommentModel.class.php");
		require("./model/MemberModel.class.php");
		$catModel = new CatModel($mysql);
        $commentModel = new CommentModel($mysql);
        $memberModel = new Member($mysql);

		$id = intval($_REQUEST["id"]);
		if (!empty($id)) {
			$MsgModel = new MsgModel($mysql);
			$msgInfo = $MsgModel->getMsgInfo($id);
		}

		if (isset($_REQUEST['publish'])) {
			if (!empty($_REQUEST["content"])) {
				$content = $_REQUEST["content"];
				$comment_time = time();
				$member_id = $_SESSION['id'];
				$message_id = !empty($_REQUEST["id"]) ? intval($_REQUEST["id"]) : 0;
				$is_show = 0;
				$commentInfo = array(
						"content" => $content,
						"comment_time" => $comment_time,
						"member_id" => $member_id,
						"message_id" => $message_id,
						"is_show" => $is_show,
					);
				
				$bRes = $commentModel->addComment($commentInfo);
				if ($bRes) {
					echo '<script>alert("ok!");</script>';
				} else {
					echo '<script>alert("error!");</script>';
				}
			} else {
				echo '<script>alert("发布评论不能为空!");</script>';
			}
		}

	 ?>	
	 <div class="container">
	 	<div class="row">
	 		<?php require('./breadcrumb.php') ?>
	 	</div>
	 	<div class="row">
	 		<?php if ($msgInfo) {
?>
	 		<h3 class="text-center"><?php echo $msgInfo["title"] ?></h3>
	 		<h4><?php echo date("Y-m-d H:i:s",$msgInfo["addtime"]) ?></h4>
	 		<?php if (!empty($msgInfo["img"]) && file_exists("./upload/" . $msgInfo["img"])) {
	 			?>
		 		<p><img src="./upload/<?php echo $msgInfo["img"]?>" alt="" style="width:200px;"></p>
	 			<?php } ?>
	 		<p><?php echo htmlspecialchars_decode($msgInfo["content"]) ?></p>
<?php } ?>
	 	</div>
	 	<div class="row">
	 		
	 			<?php 
	 				$total = $commentModel->getTotal($id);
	 				$pagesize = 5;
	 				$page = ceil($total / $pagesize);
	 				$p = isset($_REQUEST['p']) ? intval($_REQUEST['p']) : 1;
	 				$commentList = $commentModel->getCommentList($p,$pagesize);
	 				if (!empty($commentList)) {
	 					echo showpage($p,$page);
	 				}
	 			 ?>
	 			
	 		
	 	</div>
	 	<div class="row">
	 		<?php 
	 			if (!empty($commentList)) {

	 				foreach ($commentList as $v) {
	 					?>
					 		<div class="media">
					 			<div class="media-body">
					 				<div class="bd">
					 					<h3><?php echo $v["content"] ?></h3>
					 					<p>评论者:<?php echo $memberModel->getMemberNameById($v["member_id"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;时间:<?php echo date("Y-m-d H:i:s",$v["comment_time"]) ?></p>
					 				</div>
					 			</div>
					 		</div>
	 					<?php
	 				}
	 			}
	 		 ?>
	 		
	 	</div>
	 	<?php 
	 		if (!empty($_SESSION["id"])) {
	 			?>
	 				<div class="row">
	 					<form  method="POST" role="form" class="form-horizontal">
	 						<div class="form-group">
	 							
	 							<div class="col-md-12">
	 								<textarea name="content"  class="form-control" rows="6" required="required"></textarea>
	 							</div>
	 						</div>
	 						<div class="form-group">
	 							<div class="col-md-1"><button type="submit" class="btn btn-primary" name="publish">发布评论</button></div>
	 						</div>
	 						
	 					
	 						
	 					</form>
	 				</div>
	 			<?php
	 		}
	 	 ?>
	 	
	 </div>
</body>
</html>