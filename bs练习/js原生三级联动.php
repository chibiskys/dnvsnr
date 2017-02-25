<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://cdn.static.runoob.com/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>
		function getHttp() {
			var xmlhttp;
				if (window.XMLHttpRequest)
				{
					//  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
					xmlhttp=new XMLHttpRequest();
				}
				else
				{
					// IE6, IE5 浏览器执行代码
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
			return xmlhttp;
		}

		function getCities(provinceId) {
			var xmlhttp = getHttp();
			var url = "./ajax.php";
			xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						var result = xmlhttp.responseText;
						var obj = JSON.parse(result);
						var str = "";
						for (var a in obj) {
							str += "<option value='" + obj[a].region_id + "'>" + obj[a].region_name + "</option>";
						}
						$("#city").empty().append(str);
						$("#city").triggerHandler('change');
					}
				}
				xmlhttp.open("POST",url,true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send("provinceId=" + provinceId);
		}

		function getDistrict(cityId) {
			var xmlhttp = getHttp();
			var url = "./ajax.php";
			xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						var result = xmlhttp.responseText;
						var obj = JSON.parse(result);
						var str = "";
						for (var a in obj) {
							str += "<option value='" + obj[a].region_id + "'>" + obj[a].region_name + "</option>";
						}
						$("#district").empty().append(str);
					}
				}
				xmlhttp.open("POST",url,true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send("cityId=" + cityId);
		}

		$(function() {
			$("#province").change(function() {
				var index = $("#province option:selected").val();
				getCities(index);
			});
			$("#city").change(function() {
				var index = $("#city option:selected").val();
				getDistrict(index);
			});
		})
	</script>
</head>
<body>
	<?php 
		require('./lib/Mysql.class.php');
		$sql = "select * from `ecs_region` where parent_id = 1";
		$provinceList = $mysql->getAll($sql);
	 ?>
	<select name="province" id="province">
		<?php 
			if (!empty($provinceList)) {
				foreach ($provinceList as $k => $v) {
					?>
						<option value="<?php echo $v['region_id']?>"><?php echo $v['region_name'] ?></option>
					<?php
				}
			}
		 ?>
	</select>	

	<select name="city" id="city">
		
	</select>

	<select name="district" id="district">
		
	</select>
</body>
</html>