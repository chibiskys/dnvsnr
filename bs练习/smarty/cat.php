<?php 
	require('init.php');

	$msgModel = new MsgModel($mysql);
	$catModel = new CatModel($mysql);
	


	$total = $msgModel->getTotalByCatId($cid);
	$pagesize = 5;
	$page = ceil($total / $pagesize);
	$p = isset($_GET['p']) ? intval($_GET['p']) : 1;

	
	if (!empty($cid)) {
		$msgList = $msgModel->getMsgListByCatId($p,$pagesize,$cid);
	}

	$smarty->assign('msgList',$msgList);
	$smarty->assign('pageBar',showpage($p,$page));
	$smarty->display('cat.htm');
 ?>