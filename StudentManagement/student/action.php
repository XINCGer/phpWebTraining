<?php
	include('../config/dbconfig.php');
	$link=mysql_connect(HOST,USER,PASS) or die('数据库连接失败！！！');;
	mysql_select_db(DBNAME);
	mysql_set_charset('utf8');
	switch($_GET['a']){
		//添加操作
		case 'add':
			$xh=$_POST['xh'];
			$xm=$_POST['xm'];
			$xb=$_POST['xb'];
			$cssj=$_POST['cssj'];
			$zy=$_POST['zy'];
			$kcm=$_POST['kcm'];
			$zxf=$_POST['zxf'];
			$bz=$_POST['bz'];
			$sql="INSERT INTO `student`.`xsb` (`xh`, `xm`, `xb`, `cssj`, `zy`, `zxf`,`kc`, `bz`) VALUES ('$xh', '$xm', '$xb', '$cssj', '$zy','$zxf','$kcm', '$bz');";
			$list=mysql_query($sql);
			if($list>0){
				echo "添加成功！！";
			}else{
				echo "添加失败";
			}
			break;
		//删除操作
		case 'del':
			$xh=$_GET['xh'];
			$sql="DELETE FROM `xsb` WHERE xh=$xh";
			
			$list=mysql_query($sql);
			if($list>0){
				echo "删除成功！！";
			}else{
				echo "删除失败！！";
			}
			break;
		//修改操作
		case 'edit':
			$xh=$_POST['xh'];
			$xm=$_POST['xm'];
			$xb=$_POST['xb'];
			$cssj=$_POST['cssj'];
			$zy=$_POST['zy'];
			$kcm=$_POST['kcm'];
			$zxf=$_POST['zxf'];
			$bz=$_POST['bz'];
			$sql="UPDATE  `student`.`xsb` SET  `xm` =  '$xm',`xb` =  '$xb',`cssj` =  '$cssj',`zy` =  '$zy',`zxf` =  '$zxf',`bz` =  '$bz',`kc` =  '$kcm' WHERE  `xsb`.`xh` =$xh";
			$list =mysql_query($sql);
			if($list>0){ echo "修改成功!";}
			else { echo "修改失败!".mysql_error();}
	}
?>
