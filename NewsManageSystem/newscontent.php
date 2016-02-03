<?php require_once('Connections/news.php'); ?>
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
if (isset($_GET['news_id'])) {
  $colname_Recordset1 = $_GET['news_id'];
}
mysql_select_db($database_news, $news);
$query_Recordset1 = sprintf("SELECT * FROM news WHERE news_id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $news) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
	background-image: url();
}
body,td,th {
	font-size: 12px;
}
.style18 {color: #FFFF00}
a:link {
	text-decoration: none;
	color: #000000;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: underline;
	color: #FF0000;
}
a:active {
	text-decoration: none;
	color: #FF0000;
}
#Layer1 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 142px;
	top: 592px;
}
.STYLE31 {
	color: #0073B5;
	font-size: 14px;
}
.STYLE32 {color: #990000}
-->
</style></head>

<body>
<table width="768" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/top.gif" width="769" height="310" border="0" usemap="#Map">
      <map name="Map">
        <area shape="rect" coords="106,282,171,304" href="index.php">
    </map></td>
  </tr>
  <tr>
    <td><table width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="768" border="0" cellspacing="0" cellpadding="0">
          
          <tr>
            <td><table width="768" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
              <tr>
                <td width="394" height="30">　新闻标题：<?php echo $row_Recordset1['news_title']; ?></td>
                <td width="374">加入时间：<?php echo $row_Recordset1['news_date']; ?></td>
              </tr>
              <tr>
                <td height="13" colspan="2">　新闻内容：<?php echo $row_Recordset1['news_content']; ?></td>
              </tr>
              <tr>
                <td height="13" colspan="2">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr> </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="images/di.gif" width="768" height="50" /></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
