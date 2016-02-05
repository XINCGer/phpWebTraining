<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
if (empty($_POST['ID'])){
        echo "您没选择投票的项目";
        exit(0);
    }//判断是否选择了返岗票的选项
	else
	{
		
$voteip=strval($_POST['voteip']);	
//赋值变量voteip为上一页传递过来的voteip值		
$con = mysql_connect("localhost","root","");
//建立数据库连接
if (!$con)
  {
  die('数据库连接出错: ' . mysql_error());
  }
  //如果数据库连接出错，显示错误
mysql_select_db("vote", $con);
//查询vote数据库
$sql=mysql_query("select * from ip where voteid='".$voteip."'");
//以voteid=voteip为条件查询数据表ip
$info=mysql_fetch_array($sql);
//从结果集中取得一行作为关联数组info
if($info==true)
//如果值为真，说明数据库中有IP地址，已经投过票
 {
   header("location:sorry.php");
  //转到voteok.php
   exit;
 
 }
 else
 {  
   mysql_query("INSERT INTO ip (voteid) VALUES ('".$voteip."')");
  //如果没有则将ip地址插入到ip数据表中
   }   
  mysql_close($con);  
  
     
$ID=strval($_POST['ID']);
//赋值ID变量为上一页传递过来的ID值
$conn = mysql_connect("localhost","root","");
//建立数据库连接
if (!$conn)
  {
  die('数据库连接出错: ' . mysql_error());
  }
//如果数据库连接出错，显示错误 
mysql_select_db("vote", $conn);
//查询vote数据
mysql_query("UPDATE vote SET vote = vote + 1 WHERE ID = '".$ID."'");
//根据ID更新数表vote，并自动加一
mysql_close($conn);

header("location:voteok.php");
  //转到voteok.php
}

?>