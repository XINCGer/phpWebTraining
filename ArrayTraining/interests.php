<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>爱好</title>
</head>

<body>
<?php 
//创建第一个数组：
$songs = array(1 => '小小虫','东风破','waka waka');

//创建第二个数组：
$movies = array(1 => '钢铁侠','变形金刚','阿凡达');

//创建第三个数组：
$books = array(1 => '哈利波特','暮光之城','品三国');

//创建多维数组：
$interests = array(
	'music' => $songs,
	'movie' => $movies,
	'book' => $books
);
	
//输出一些值：
echo "<p>我喜欢的一首歌是 <i>{$interests['music'][1]}</i>。</p>";
echo "<p>我喜欢的电影是 <i>{$interests['movie'][2]}</i>。</p>";
echo "<p>我喜欢的书是 <i>{$interests['book'][3]}</i>。</p>";

//使用foreach的嵌套才能完整打印多维数组
foreach ($interests as $title => $content) {
  print "<p>$title";
  foreach ($content as $number => $value) {
  print "<br />我喜欢的第 $number 个是 $value";
  } 
  print '</p>';
}

?>
</body>
</html>
