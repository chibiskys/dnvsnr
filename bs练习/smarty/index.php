<?php 
	require('init.php');

	$memberModel = new Member($mysql);
	
	$MsgModel = new MsgModel($mysql);
	

	$total = $MsgModel->getTotal();
	$pagesize = 5;
	$page = ceil($total / $pagesize);
	$p = isset($_GET['p']) ? intval($_GET['p']) : 1;
	$msgList = $MsgModel->getMsgList($p,$pagesize);
	if (!empty($msgList)) {
		foreach ($msgList as $k => $v) {
			$msgList[$k]['content'] = mb_substr(strip_tags(htmlspecialchars_decode($v['content'])),0,360,'utf-8');
		}
	}

	$smarty->assign('msgList',$msgList);
	$smarty->assign('pageBar',showpage($p,$page));
	$smarty->display('index.htm');
 ?>