<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>������ά����</title>
</head>

<body>
<?php 
	$film = array(array('name'=>'��������','imdb'=>8.3),
				  array('name'=>'����2���ڰ�����','imdb'=>7.8),
				  array('name'=>'����ѿ�','imdb'=>7.8),
				  array('name'=>'����ս��2','imdb'=>7.1),
				  array('name'=>'��������','imdb'=>7.8));
	print_r($film);
?>
<table width="300" border="1">
  <tr>
    <td><div align="center"><strong>��Ӱ����</strong></div></td>
    <td><div align="center"><strong>imdb����</strong></div></td>
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
