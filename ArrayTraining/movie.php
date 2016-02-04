<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>遍历多维数组</title>
</head>

<body>
<?php 
	$film = array(array('name'=>'地心引力','imdb'=>8.3),
				  array('name'=>'雷神2：黑暗世界','imdb'=>7.8),
				  array('name'=>'金蝉脱壳','imdb'=>7.8),
				  array('name'=>'赤焰战场2','imdb'=>7.1),
				  array('name'=>'精灵旅社','imdb'=>7.8));
	print_r($film);
?>
<table width="300" border="1">
  <tr>
    <td><div align="center"><strong>电影名称</strong></div></td>
    <td><div align="center"><strong>imdb评分</strong></div></td>
  </tr>
  <?php 
  	foreach($film as $item){
  ?>
  <tr>
    <td><?php echo $item['name'] ?></td>
    <td><?php echo $item['imdb'] ?></td>
  </tr>
  <?php }?>
</table>
</body>
</html>
