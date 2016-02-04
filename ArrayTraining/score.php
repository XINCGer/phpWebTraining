<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=gb2312" />
	<title>我的实训成绩</title>
</head>
<body>
<?php 
	$score = array("实训一" => 10,
				   "实训二" => 8.5,
				   "实训三" => 9,
				   "实训四" => 10,
				   );
	print_r($score); 
	echo "<br /><br />";
	var_dump($score);
?>
<p>我的实训成绩表(学号：07210101)</p>
<table width="200" border="1">
<?php 
	foreach($score as $key => $value){
?>
  <tr align="center" valign="middle">
    <td width="100"><?php echo $key; ?></td>
    <td width="100"><?php echo $value; ?></td>
  </tr>
<?php 		
	}
?>
</table>
</body>
</html>
