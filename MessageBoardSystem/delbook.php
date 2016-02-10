<?php require_once('Connections/gbook.php'); ?>
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

if ((isset($_GET['ID'])) && ($_GET['ID'] != "")) {
  $deleteSQL = sprintf("DELETE FROM gbook WHERE ID=%s",
                       GetSQLValueString($_GET['ID'], "int"));

  mysql_select_db($database_gbook, $gbook);
  $Result1 = mysql_query($deleteSQL, $gbook) or die(mysql_error());

  $deleteGoTo = "admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_Rs = "-1";
if (isset($_GET['ID'])) {
  $colname_Rs = $_GET['ID'];
}
mysql_select_db($database_gbook, $gbook);
$query_Rs = sprintf("SELECT * FROM gbook WHERE ID = %s", GetSQLValueString($colname_Rs, "int"));
$Rs = mysql_query($query_Rs, $gbook) or die(mysql_error());
$row_Rs = mysql_fetch_assoc($Rs);
$totalRows_Rs = mysql_num_rows($Rs);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>删除留言</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
	background-color: #FFFFFF;
}
body,td,th {
	font-size: 12px;
}
.STYLE1 {
	font-size: 13px;
	color: #FFFFFF;
}
.STYLE2 {font-size: 9px}
.STYLE3 {font-size: 10px}
.STYLE4 {color: #FF0000}
a:link {
	text-decoration: none;
	color: #000000;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
	color: #FF0000;
}
-->
</style>
</head>

<body>
<table width="749" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><img src="images/logo.jpg" width="750" height="120" border="0" /></td>
  </tr>
  
  <tr>
    <td width="195" bgcolor="#FFFFFF"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="195" height="133" background="images/index.02.gif" bgcolor="#FEFEFE" valign="top"><form id="form2" name="form2" method="POST">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="38">&nbsp;</td>
            </tr>
            <tr>
              <td height="25">&nbsp;&nbsp; 用户名：
                <input name="username" type="text" class="STYLE3" id="username" size="15" /></td>
            </tr>
            <tr>
              <td height="20">&nbsp;&nbsp; 密&nbsp; 码：
                <input name="password" type="password" class="STYLE3" id="password" size="15" /></td>
            </tr>
            <tr>
              <td height="25">&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;
                <input type="submit" name="Submit3" value="提交" />
                <input type="reset" name="Submit3" value="重置" /></td>
            </tr>
            <tr>
              <td height="12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 注册新用户 找回密码 </td>
            </tr>
          </table>
        </form></td>
      </tr>
      <tr>
        <td bgcolor="#FEFEFE"><img src="images/index_04.gif" width="195" height="36" /></td>
      </tr>
      <tr>
        <td bgcolor="#FEFEFE"><img src="images/lxwm.jpg" width="195" height="155" /></td>
      </tr>
      <tr>
        <td height="25" bgcolor="#FEFEFE">　洽谈合作 </td>
      </tr>
      <tr>
        <td height="25" bgcolor="#FEFEFE"><img src="images/memeber.gif" width="195" height="83" /></td>
      </tr>
    </table></td>
    <td width="555" bgcolor="#FEFEFE" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="30">&nbsp;&nbsp;&nbsp;&nbsp; 您的位置——删除留言&nbsp;    &nbsp;      &nbsp;    &nbsp;    &nbsp;  &nbsp;&nbsp;&nbsp; 现在的时间是：
          <?php
date_default_timezone_set('Asia/Shanghai');
echo date("Y-m-d h:i:s");
?></td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp; <img src="images/14384-m.jpg" width="23" height="22" /><span class="STYLE6">删除留言：</span></td>
      </tr>
      
      
      <tr>
        <td><form id="form1" name="form1" method="POST">
          <table width="90%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
            <tr>
              <td height="25" colspan="2">您要删除留言的ID号是
                <input name="ID" type="text" id="ID" value="<?php echo $row_Rs['ID']; ?>" size="8">
                号：</td>
              </tr>
            <tr>
              <td width="14%" height="20">留言时间：</td>
              <td width="86%"><input name="date" type="text" id="date" value="<?php echo $row_Rs['date']; ?>" size="20"></td>
            </tr>
            <tr>
              <td height="20">留言者IP：</td>
              <td><input name="IP" type="text" id="IP" value="<?php echo $row_Rs['IP']; ?>" size="20"></td>
            </tr>
            <tr>
              <td height="20">留言标题：</td>
              <td><input name="subject" type="text" id="subject" value="<?php echo $row_Rs['subject']; ?>" size="20"></td>
            </tr>
            <tr>
              <td height="20">留言内容：</td>
              <td><label>
              <textarea name="content" cols="40" rows="5" id="content"><?php echo $row_Rs['content']; ?></textarea>
              </label></td>
            </tr>
            <tr>
              <td height="20" valign="top">回复内容：</td>
              <td><textarea name="reply" cols="40" rows="8" id="reply"><?php echo $row_Rs['reply']; ?></textarea></td>
            </tr>
            <tr>
              <td height="20" colspan="2"><label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                <input type="submit" name="Submit" value="删除" />
                <input type="reset" name="Submit2" value="重置" />
              </label></td>
              </tr>
          </table>
        </form>        </td>
      </tr>
    </table>    </td>
  </tr>
  <tr>
    <td height="50" colspan="2" bgcolor="#55C2EB"><div align="center"><span class="STYLE1">Copyright@2011-2012 hbculture.com Inc.All rights reserved.   环博文化 版权所有</span></div></td>
  </tr>
</table>
<p class="STYLE2">&nbsp;</p>

<map name="Map" id="Map"><area shape="rect" coords="284,13,371,32" href="book.php" />
</map>
</body>
</html>
<?php
mysql_free_result($Rs);
?>
