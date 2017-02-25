<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body {padding:100px 0 0;}
		.mt10 {margin-top:15px;margin-right:10px;}
	</style>	
</head>
<body>
	<?php 
		session_start();	
		require("./lib/Mysql.class.php");
		require("./model/MemberModel.class.php");
		require("./model/CatModel.class.php");
		$memberModel = new Member($mysql);
		$catModel = new CatModel($mysql);
		if (isset($_REQUEST["login"])) {
			$username = htmlspecialchars($_POST['username'],ENT_QUOTES);
			$userpwd = htmlspecialchars($_POST['userpwd'],ENT_QUOTES);
			$captchas = trim($_POST['captchas']);
			if (!empty($username) && !empty($userpwd) && strtolower($captchas) == strtolower($_SESSION["captchas"])) {
				$memberInfo = array('username'=>$username,'userpwd'=>$userpwd);
				$bRes = $memberModel->login($memberInfo);
				if ($bRes) {
					$_SESSION['id'] = $bRes['id'];
					$_SESSION['username'] = $bRes['username'];
					$_SESSION['userpwd'] = $bRes['userpwd'];
					echo '<script>alert("login ok");</script>';
				} else {
					echo '<script>alert("login error");</script>';
				}	
			}
		} else if (isset($_REQUEST["reg"])) {
			$username = htmlspecialchars($_POST['username'],ENT_QUOTES);
			$userpwd = htmlspecialchars($_POST['userpwd'],ENT_QUOTES);
			if (!empty($username) && !empty($userpwd)) {
				$memberInfo = array('username'=>$username,'userpwd'=>$userpwd);
				$bRes = $memberModel->addMember($memberInfo);
				if ($bRes) {
					echo '<script>alert("reg ok");</script>';
				} else {
					echo '<script>alert("reg error");</script>';
				}
			}
		}
		if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "loginout") {
			unset($_SESSION['id']);
			unset($_SESSION['username']);
			unset($_SESSION['userpwd']);
			header("Location:./user.php");
		}
	 ?>
	<div class="contaier">
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
								" class="dropdown-toggle" data-toggle="dropdown">
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
				
	</div>
		<div class="row">
			<div class="col-md-6 col-md-push-3">
				<form method="POST" role="form" class="form-horizontal">
				
					<div class="form-group">
						<div class="col-md-2">
							<label for="">用户名</label>
						</div>
						<div class="col-md-10">
							<input type="text" class="form-control" name="username" placeholder="请输入用户名">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-2">
							<label for="">密码</label>
						</div>
						<div class="col-md-10">
							<input type="password" class="form-control" name="userpwd" placeholder="请输入密码">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-2">
							<label for="">验证码</label>
						</div>
						<div class="col-md-10">
							<div class="row">
								<div class="col-md-3"><input class="form-control" type="text" name="captchas"></div>
								<div class="col-md-6"><img src="./captchas.php" alt="" onclick="this.src='captchas.php?t=' + Math.random()"></div>
							</div>
						</div>
					</div>
				
					
					<div class="form-group">
						<div class="col-md-10 col-md-offset-2">
							<button name="reg" type="submit" class="btn btn-primary">注册</button>
							<button name="login" type="submit" class="btn btn-primary">登陆</button>

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>