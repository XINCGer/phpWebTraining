<?php require_once('Connections/bbs.php'); ?> 
<?php
$bbs_ID=strval($_GET['bbs_id']);
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

if ((isset($_GET['bbs_ID'])) && ($_GET['bbs_ID'] != "")) {
  $deleteSQL = sprintf("DELETE FROM bbs_main WHERE bbs_ID=%s",
                       GetSQLValueString($_GET['bbs_ID'], "int"));

  mysql_select_db($database_bbs, $bbs);
  $Result1 = mysql_query($deleteSQL, $bbs) or die(mysql_error());

  $deleteGoTo = "admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

mysql_select_db($database_bbs, $bbs);
$query_rs = "SELECT bbs_main.*,bbs_ref.* FROM bbs_main LEFT OUTER JOIN bbs_ref ON  bbs_main.bbs_ID=bbs_ref.bbs_main_ID WHERE bbs_main.bbs_ID ='".$bbs_ID."'";
$rs = mysql_query($query_rs, $bbs) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);
$totalRows_rs = mysql_num_rows($rs);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>删除讨论主题</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
body,td,th {
	font-family: 宋体;
	font-size: 12px;
}
.style18 {color: #FFFF00}
.style25 {font-size: 18px; font-weight: bold;}
.STYLE26 {font-size: 16px}
a:link {
	text-decoration: none;
	color: #000000;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #FF0000;
}
a:active {
	text-decoration: none;
	color: #FF0000;
}
.STYLE28 {	font-size: 13px;
	color: #FFFFFF;
}
-->
</style></head>

<body>

<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="764"><img src="images/1副本.gif" width="764" height="179" /></td>
  </tr>
</table>
<table width="767" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="763" height="30" bgcolor="#FFFFFF"><form id="form1" name="form1">
      <table width="476" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#66CCFF">
        <tr>
          <td height="25" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 你确定删除此标题和内容： </td>
          </tr>
        <tr>
          <td width="14%" height="25">&nbsp;&nbsp;&nbsp; 标题：</td>
          <td width="86%"><label>
            <input name="bbs_title" type="text" id="bbs_title" value="<?php echo $row_rs['bbs_title']; ?>" />
          </label></td>
        </tr>
        <tr>
          <td height="25">&nbsp;&nbsp;&nbsp; 内容：</td>
          <td><label>
            <textarea name="bbs_content" cols="45" rows="8" id="bbs_content"><?php echo $row_rs['bbs_content']; ?></textarea>
            <input name="bbs_ID" type="hidden" id="bbs_ID" value="<?php echo $row_rs['bbs_ID']; ?>">
          </label></td>
        </tr>
        <tr>
          <td height="25" colspan="2"><label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="Submit" value="确定删除" />
          </label></td>
          </tr>
      </table>
        
      
      
    
      
      \
    </form>
    </td>
  </tr>
  <tr>
    <td height="40" bgcolor="#4DAFFE"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="STYLE28"> Copyright @ 2012 www.hbculture.com Inc.All rights reserved. PHP论坛管理系统 </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    </td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($rs);
?>
