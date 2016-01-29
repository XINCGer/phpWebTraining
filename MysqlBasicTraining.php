PHP--mysql数据的基础练习
<?php
#数据库连接
/* $conn = mysql_connect("localhost","root","admin");
if(!$conn){
	die('不能链接数据库！'.mysql_error());
}
else{
	echo '数据库连接成功！';
}
mysql_close(); */

#创建数据库
/* $conn = mysql_connect("localhost","root","admin");
if(!$conn){
	die('不能链接数据库！'.mysql_error());
}
if(mysql_query("CREATE DATABASE my_db",$conn)){
	echo "数据库创建成功";
}
else {
	echo "数据库创建失败！".mysql_error();
} */

#创建表
/* $conn = mysql_connect("localhost","root","admin");
if(!$conn){
	die('不能链接数据库！'.mysql_error());
}
mysql_select_db('my_db',$conn);
$sql = "CREATE TABLE persons
(
personID int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(personID),
FirstName varchar(15),
SecondName varchar(15),
Age int
)";
mysql_query($sql,$conn); */

#插入数据
/* $conn = mysql_connect("localhost","root","admin");
if(!$conn){
	die('不能链接数据库！'.mysql_error());
}
mysql_select_db("my_db",$conn);
mysql_query("INSERT INTO persons(FirstName,SecondName,Age) VALUES('chen','bao',21)");
mysql_query("INSERT INTO persons(FirstName,SecondName,Age) VALUES('ZHAO','qianqian',25)");
mysql_close(); */

#查询数据
/* $conn = mysql_connect("localhost","root","admin");
if(!$conn){
	die('不能链接数据库！'.mysql_error());
}
mysql_select_db("my_db",$conn);
echo "<br />";
$result = mysql_query("SELECT * FROM persons");
while($rows = mysql_fetch_array($result)){
	echo $rows['FirstName']." ".$rows['SecondName'];
	echo '<br />';
}
mysql_close(); */

#条件查询
/* $conn = mysql_connect("localhost","root","admin");
if(!$conn){
	die('不能链接数据库！'.mysql_error());
}
mysql_select_db("my_db",$conn);
echo "<br />";
$result = mysql_query("SELECT * FROM persons WHERE FirstName ='chen'");
while($rows = mysql_fetch_array($result)){
	echo $rows['FirstName']." ".$rows['SecondName'];
	echo '<br />';
}
mysql_close(); */

#数据排序
/* $conn = mysql_connect("localhost","root","admin");
if(!$conn){
	die('不能链接数据库！'.mysql_error());
}
mysql_select_db("my_db",$conn);
echo "<br />";
$result = mysql_query("SELECT * FROM persons ORDER BY Age");
while($rows = mysql_fetch_array($result)){
	echo $rows['FirstName']." ".$rows['SecondName'];
	echo "<br />";
}
mysql_close(); */

#更新数据
/* $conn = mysql_connect("localhost","root","admin");
if(!$conn){
	die('不能链接数据库！'.mysql_error());
}
mysql_select_db("my_db",$conn);
echo "<br />";
mysql_query("UPDATE persons SET Age = '22' WHERE FirstName = 'chen' AND SecondName ='bao'");
mysql_close(); */

#删除数据
$conn = mysql_connect("localhost","root","admin");
if(!$conn){
	die('不能链接数据库！'.mysql_error());
}
mysql_select_db("my_db",$conn);
echo "<br />";
mysql_query("DELETE FROM persons WHERE SecondName = 'lili'");
mysql_close();
?>