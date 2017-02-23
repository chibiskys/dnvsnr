<?php 
	require('./lib/Mysql.class.php');
	if (!empty($_POST['provinceId'])) {
		$sql = "select * from ecs_region where parent_id = " . $_POST['provinceId'];
		$cityList = $mysql->getAll($sql);
		echo json_encode($cityList);
	} else if (!empty($_POST['cityId'])) {
		$sql = "select * from ecs_region where parent_id = " . $_POST['cityId'];
		$districtList = $mysql->getAll($sql);
		echo json_encode($districtList);
	}
	
 ?>