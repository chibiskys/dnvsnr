<?php 
	session_start();
	$width = 150;
	$height = 50;
	// 1.创建画布
	$im = imagecreatetruecolor($width, $height);


	// 生成随机颜色
	$bgColor = imagecolorallocate($im, mt_rand(175,255), mt_rand(175,255), mt_rand(175,255));
	// 填充画布
	imagefilledrectangle($im, 0, 0, $width, $height, $bgColor);
	//imagettftext(image, size, angle, x, y, color, fontfile, text)

	// 画干扰线
	for ($i = 0; $i < 10; $i++) {
		$linecolor = imagecolorallocate($im, mt_rand(0,175), mt_rand(0,175), mt_rand(0,175));
		imageline($im, mt_rand(0,$width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), $linecolor);
	}

	// 生成验证码的字符
	$codeLen = 4;
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
	$captchas = '';
	for ($i = 0; $i < 4; $i++) {
		$captchas .= $chars[mt_rand(0,strlen($chars)-1)];
	}

	$_SESSION["captchas"] = $captchas;

	$codeWidth = $width / $codeLen;
	// 把验证码字符串输出到图片上
	for ($i = 0; $i < 4; $i++) {
		$codecolor = imagecolorallocate($im, mt_rand(0,165), mt_rand(0,165), mt_rand(0,165));
		imagettftext($im, 20, mt_rand(-30,30), $i * $codeWidth + mt_rand(5,10), $height / 1.5, $codecolor, "./font/zytj.ttf", $captchas[$i]);
	}



	// 2.渲染画布
	header("content-type:image/png");
	// 3.输出画布
	imagepng($im);
	// 4.销毁画布
	imagedestroy($im);
 ?>