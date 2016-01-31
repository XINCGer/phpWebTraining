<?php require_once('Connections/mymember.php'); ?>
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

$colname_Recordset1 = "-1";
if (isset($_POST['inputanswer'])) {
  $colname_Recordset1 = $_POST['inputanswer'];
}
mysql_select_db($database_mymember, $mymember);
$query_Recordset1 = sprintf("SELECT username, password, answer FROM member WHERE answer = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $mymember) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>密码</title>
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
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
.STYLE1 {font-size: 15px}
.STYLE2 {
	color: #FF0000;
	font-size: 13px;
}
.style3 {	font-size: 14px;
	color: #990000;
}
-->
</style></head>

<body>
<table width="775" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><img src="images/01.gif" width="775" height="231" /></td>
  </tr>
  <tr>
    <td width="179" height="340" valign="top" bgcolor="#FFFFFF"><img src="images/02_02.gif" width="179" /></td>
    <td width="423" bgcolor="#FFFFFF" valign="top"><p>&nbsp;</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3">查询结果</span></p>
    <p>
      <?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
  &nbsp;&nbsp;&nbsp; 对不起您输入的答案不正确，请单击<a href="lostpassword.php">这里</a>重新输入！
  <?php } // Show if recordset empty ?>
    </p>
    <?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
      <table width="100%" border="0">
        <tr>
          <td><p align="center">用户：<?php echo $row_Recordset1['username']; ?></p>
            <p align="center">密码：<?php echo $row_Recordset1['password']; ?></p>
            <p align="center">单击<a href="index.php">这里</a>重新登录</p></td>
        </tr>
      </table>
      <?php } // Show if recordset not empty ?>
<p>&nbsp;</p></td>
    <td width="173"><img src="/member/images/04.gif" width="173" height="456" /></td>
  </tr>
  <tr>
    <td height="45" colspan="3" background="images/05.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
