<?php require_once('Connections/mymember.php'); ?>
<?php 
  session_start();
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_upok = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_upok = $_SESSION['MM_Username'];
}
mysql_select_db($database_mymember, $mymember);
$query_upok = sprintf("SELECT * FROM member WHERE username = %s", GetSQLValueString($colname_upok, "text"));
$upok = mysql_query($query_upok, $mymember) or die(mysql_error());
$row_upok = mysql_fetch_assoc($upok);
$totalRows_upok = mysql_num_rows($upok);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>更新成功</title>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
body {
	margin-top: 0px;
	background-color: #CCCCCC;
}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #990000;
}
a:active {
	text-decoration: none;
	color: #CC3300;
}
.STYLE2 {color: #FF0000}
.STYLE3 {color: #000000}
.input {font-size: 10px}
.STYLE6 {font-size: 15px}
.STYLE7 {font-size: 12px}
-->
</style>
</head>

<body>


<table width="775" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><img src="images/01.gif" width="775" height="231" /></td>
  </tr>
  <tr>
    <td width="179" height="320" background="images/02_02.gif" valign="top">&nbsp;</td>
    <td width="596" height="320" bgcolor="#FEFEFE" valign="top"><form name="form1" autocomplete="off">
      <table width="65%" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;修改成功！</td>
        </tr>
        <tr>
          <td width="24%">用 户 名：</td>
          <td width="76%" class="input"><label>
            <input name="username" type="text" id="username" onChange="callServer();" value="<?php echo $row_upok['username']; ?>" />
          </label></td>
        </tr>
        <tr>
          <td>密&nbsp;&nbsp;&nbsp; 码：</td>
          <td><input name="password" type="password" class="input" id="password" value="<?php echo $row_upok['password']; ?>" /></td>
        </tr>
        <tr>
          <td>密码验证：</td>
          <td><p>
              <input name="password1" type="password" class="input" id="password1" value="<?php echo $row_upok['password']; ?>" />
            请写密码填写一致！</p></td>
        </tr>
        <tr>
          <td>真实姓名：</td>
          <td><input name="turename" type="text" class="input" id="turename" value="<?php echo $row_upok['truename']; ?>" size="20" /></td>
        </tr>
        <tr>
          <td>姓&nbsp;&nbsp;&nbsp; 别：</td>
          <td><label>
            <input <?php if (!(strcmp($row_upok['sex'],"男"))) {echo "checked=\"checked\"";} ?> name="sex" type="radio" value="男" checked="checked" />
            男
            <input <?php if (!(strcmp($row_upok['sex'],"女"))) {echo "checked=\"checked\"";} ?> type="radio" name="sex" value="女" />
            女 </label></td>
        </tr>
        <tr>
          <td>E-mail：</td>
          <td><input name="email" type="text" class="input" id="email" value="<?php echo $row_upok['email']; ?>" /></td>
        </tr>
        <tr>
          <td>电&nbsp;&nbsp;&nbsp; 话：</td>
          <td><input name="tel" type="text" class="input" id="tel" value="<?php echo $row_upok['tel']; ?>" /></td>
        </tr>
        <tr>
          <td>QQ：</td>
          <td><input name="QQ" type="text" class="input" id="QQ" value="<?php echo $row_upok['QQ']; ?>" /></td>
        </tr>
        <tr>
          <td>地&nbsp;&nbsp;&nbsp; 址：</td>
          <td><input name="address" type="text" class="input" id="address" value="<?php echo $row_upok['address']; ?>" size="40" /></td>
        </tr>
        <tr>
          <td>密码提示问题：</td>
          <td><label>
            <select name="question" id="question">
              <option value="">你最好的朋友是？</option>
              <option value="">你小学上学的学校名叫？</option>
              <option value="">你妈妈的名字是？</option>
              <option value="">你的生日是那年那月</option>
            </select>
          </label></td>
        </tr>
        <tr>
          <td>密码提示答案：</td>
          <td><input name="answer" type="text" class="input" id="answer" value="<?php echo $row_upok['answer']; ?>" /></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>&nbsp;&nbsp;&nbsp;<a href="userupdate.php">重新修改 </a><a href="index.php">回登录页面</a> </label></td>
        </tr>
      </table>
    
      

      
    
            
    
      
      
    </form>    </td>
  </tr>
  <tr>
    <td height="45" colspan="2" background="images/05.gif"><div align="center">所有</div></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($upok);
?>
