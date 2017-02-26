<?php 
session_start();
require('./lib/Mysql.class.php');
require('./model/MemberModel.class.php');
require('./model/CatModel.class.php');
require('./model/MsgModel.class.php');
require('./model/CommentModel.class.php');
require('./lib/comman.php');
require('./smarty/Smarty.class.php');

$smarty = new Smarty();
$smarty->template_dir = './template';
$smarty->compile_dir = './compile';
$smarty->cache_dir = './cache';

$catModel = new CatModel($mysql);
$catList = $catModel->getCatList();
$cid = !empty($_REQUEST['cid']) ? intval($_REQUEST['cid']) : 0;
$smarty->assign('catList',$catList);
$smarty->assign('cid',$cid);

$catInfo = $catModel->editCat($cid);
$smarty->assign('catInfo',$catInfo);

 ?>