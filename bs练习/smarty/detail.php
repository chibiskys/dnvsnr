<?php 
	require('init.php');
	$msgModel = new MsgModel($mysql);
	$member = new Member($mysql);
	$id = !empty($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
	if ($id == 0) exit('参数错误!');
	$msgInfo = array();
	$msgInfo = $msgModel->getMsgInfo($id);
	$smarty->assign('msgInfo', $msgInfo);

	$commentModel = new CommentModel($mysql);
	$total = $commentModel->getTotal($id);
	$pagesize = 5;
	$page = ceil($total / $pagesize);
	$p = isset($_REQUEST['p']) ? intval($_REQUEST['p']) : 1;
	$smarty->assign('pageBar',showpage($p,$page));

	// 获取评论内容
	$commentList = $commentModel->getCommentList($p,$pagesize);
	foreach ($commentList as $k => $v) {
		$commentList[$k]['reviewers'] =  $member->getMemberNameById($v['member_id']);
		$commentList[$k]['comment_time'] = date('Y-m-d H:i:s',$v['comment_time']);
	}

	$smarty->assign('commentList',$commentList);

	$smarty->display('detail.htm');
 ?>