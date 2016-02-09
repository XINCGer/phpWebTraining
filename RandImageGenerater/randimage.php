<?php
//取得定常的随机字符串，包含大小写字母和数字
	$length = 6;
	$string = '';
	$arr = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','1','2','3','4','5','6','7','8','9','0');
	
	$arrlength = count($arr);
	for($i = 0;$i<$length;$i++)
		$string .= $arr[rand(0,$arrlength-1)]; 

   //加载字体、字体大小，计算字符串大小
  $font = 'c:/windows/fonts/arial.ttf';
  $size = 12;
  $im = imageCreateFromPNG('button.png');
  $tsize = imagettfbbox($size, 0, $font, $string);
  //文字居中显示
  $dx = abs($tsize[2]-$tsize[0]);
  $dy = abs($tsize[5]-$tsize[3]);
  $x = (imagesx($im)-$dx)/2;
  $y = (imagesy($im)-$dy)/2 + $dy;
  //做图
  $black = imageColorAllocate($im, 0, 0, 0);
  ImageTTFText($im, $size, 0, $x, $y, $black, $font, $string);
  //生成图片
  header('Content-type: image/png');
  imagePNG($im);
  imagedestroy($im);
?>
