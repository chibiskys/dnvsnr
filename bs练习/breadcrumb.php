<?php 
	$cid = !empty($_REQUEST["cid"]) ? intval($_REQUEST['cid']) : 0;
	$catInfo = $catModel->editCat($cid);
?>
<ol class="breadcrumb">
	 		    <li><a href="/">首页</a></li>
	 		    <li><a href="cat.php?id=<?php echo $catInfo["cat_id"] ?>"><?php echo !empty($catInfo["cat_name"]) ? $catInfo["cat_name"] : "" ?></a></li>
</ol>