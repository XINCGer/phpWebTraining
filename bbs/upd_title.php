<?php require_once('Connections/bbs.php'); ?> 
<?php
$bbs_ID=strval($_GET['bbs_ID']);
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE bbs_main SET bbs_title=%s, bbs_content=%s WHERE bbs_ID=%s",
                       GetSQLValueString($_POST['bbs_title'], "text"),
                       GetSQLValueString($_POST['bbs_content'], "text"),
                       GetSQLValueString($_POST['bbs_ID'], "int"));

  mysql_select_db($database_bbs, $bbs);
  $Result1 = mysql_query($updateSQL, $bbs) or die(mysql_error());

  $updateGoTo = "admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_bbs, $bbs);
$query_rs = "SELECT bbs_main.*,bbs_ref.*  FROM bbs_main LEFT OUTER JOIN bbs_ref ON  bbs_main.bbs_ID=bbs_ref.bbs_main_ID  WHERE bbs_main.bbs_ID ='".$bbs_ID."' ";
$rs = mysql_query($query_rs, $bbs) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);
$totalRows_rs = mysql_num_rows($rs);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改讨论主题</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
body,td,th {
	font-family: Times New Roman, Times, serif;
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
.STYLE28 {font-size: 13px;
	color: #FFFFFF;
}
-->
</style></head>

<body>

<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="800"><img src="images/1副本.gif" width="764" height="179" /></td>
  </tr>
</table>
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td height="30"><form method="POST" action="<?php echo $editFormAction; ?>" id="form1" name="form1">
      <table width="500" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#66CCFF">
        <tr>
          <td height="25" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 你确定修改此标题和内容： </td>
          </tr>
        <tr>
          <td width="17%" height="25">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 标题：</td>
          <td width="83%"><label>
            <input name="bbs_title" type="text" id="bbs_title" value="<?php echo $row_rs['bbs_title']; ?>" />
          </label></td>
        </tr>
        <tr>
          <td height="25">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 内容：</td>
          <td><label>
            <textarea name="bbs_content" cols="45" rows="8" id="bbs_content"><?php echo $row_rs['bbs_content']; ?></textarea>
            <input name="bbs_ID" type="hidden" id="bbs_ID" value="<?php echo $row_rs['bbs_ID']; ?>">
          </label></td>
        </tr>
        <tr>
          <td height="25" colspan="2"><label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            <input type="submit" name="Submit" value="确定修改" />
          </label></td>
          </tr>
      </table>
      <input type="hidden" name="MM_update" value="form1">
    </form>
    </td>
  </tr>
  <tr>
    <td height="40" bgcolor="#4DAFFE"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<span class="STYLE28"> Copyright @ 2012 www.hbculture.com Inc.All rights reserved. PHP论坛管理系统 </span></p></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rs);
?>
