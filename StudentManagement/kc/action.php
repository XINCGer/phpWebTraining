<?php
	include('../config/dbconfig.php');
	$link=mysql_connect(HOST,USER,PASS) or die('数据库连接失败！！！');;
	mysql_select_db(DBNAME);
	mysql_set_charset('utf8');
	switch($_GET['a']){
		//添加操作
		case 'add':
			$kch=$_POST['kch'];
			$kcm=$_POST['kcm'];
			$kkxq=$_POST['kkxq'];
			$xs=$_POST['xs'];
			$xf=$_POST['xf'];
			$sql="INSERT INTO  `student`.`kcb` (`kch` ,`kcm` ,`kkxq` ,`xs` ,`xf`)VALUES ('$kch',  '$kcm',  '$kkxq',  '$xs',  '$xf')";
			$list=mysql_query($sql);
			if($list>0){
				echo "添加成功！！";
			}else{
				echo "添加失败";
			}
			break;
		//删除操作
		case 'del':
			$kch=$_GET['kch'];
			$sql="DELETE FROM `kcb` WHERE kch=$kch";
			
			$list=mysql_query($sql);
			if($list>0){
				echo "删除成功！！";
			}else{
				echo "删除失败！！";
			}
			break;
		//修改操作
		case 'edit':
			$kch=$_POST['kch'];
			$kcm=$_POST['kcm'];
			$kkxq=$_POST['kkxq'];
			$xs=$_POST['xs'];
			$xf=$_POST['xf'];
			$sql="UPDATE  `student`.`kcb` SET  `kcm` =  '$kcm',`kkxq` =  '$kkxq',`xs` =  '$xs',`xf` =  '$xf' WHERE  `kcb`.`kch` =  '$kch';";
			$list =mysql_query($sql);
			if($list>0){ echo "修改成功!";}
			else { echo "修改失败!".mysql_error();}
            break;
        default:
            break;
        }
?>
