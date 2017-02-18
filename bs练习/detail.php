<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<?php 
		require("./lib/Mysql.class.php");
		require("./lib/comman.php");
		require("./model/MsgModel.class.php");
		$id = intval($_REQUEST["id"]);
		if (!empty($id)) {
			$MsgModel = new MsgModel($mysql);
			$msgInfo = $MsgModel->getMsgInfo($id);
		}
	 ?>	
	 <div class="container">
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
	 </div>
</body>
</html>