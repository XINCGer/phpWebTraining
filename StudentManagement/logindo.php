<?php
    $username=$_POST['username'];
    $password=$_POST['pwd'];
	include('./config/dbconfig.php');
	$link=mysql_connect(HOST,USER,PASS) or die('数据库连接失败！！！');;
	mysql_select_db(DBNAME);
	mysql_set_charset('utf8');
    $sql="select * from users where `name` like '%$username%'";
	$list=mysql_query($sql);
    $row=mysql_fetch_assoc($list);
    if($username==$row['name']&&$password==$row['pwd']){
        echo "<script>alert('登陆成功!');location.href='./index.php'</script>";
    }
    else{
        echo "<script>alert('用户名或密码错误!');location.href='./login.php'</script>";
    }   
    
?>