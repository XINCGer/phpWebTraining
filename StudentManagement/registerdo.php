<?php
    $username=$_POST['username'];
    $password=$_POST['pwd'];
	include('./config/dbconfig.php');
	$link=mysql_connect(HOST,USER,PASS) or die('数据库连接失败！！！');;
	mysql_select_db(DBNAME);
	mysql_set_charset('utf8');
    $sql="INSERT INTO  `student`.`users` (`id` ,`name` ,`pwd`)VALUES (NULL ,  '$username',  '$password');";
	$list=mysql_query($sql);
    if($list>0){
        echo "<script>alert('注册成功!');location.href='./login.php'</script>";
    }
    else{
        echo "<script>alert('注册失败!');location.href='./register.php'</script>";
    }
?>