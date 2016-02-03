<?php require_once('../Connections/news.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE news SET news_title=%s, news_type=%s, news_content=%s, news_date=%s, news_author=%s WHERE news_id=%s",
                       GetSQLValueString($_POST['news_title'], "text"),
                       GetSQLValueString($_POST['news_type'], "text"),
                       GetSQLValueString($_POST['news_content'], "text"),
                       GetSQLValueString($_POST['news_date'], "date"),
                       GetSQLValueString($_POST['news_author'], "text"),
                       GetSQLValueString($_POST['news_id'], "int"));

  mysql_select_db($database_news, $news);
  $Result1 = mysql_query($updateSQL, $news) or die(mysql_error());

  $updateGoTo = "admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
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

mysql_select_db($database_news, $news);
$query_Recordset2 = "SELECT * FROM newstype";
$Recordset2 = mysql_query($query_Recordset2, $news) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>更新新闻</title>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
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
}
a:active {
	text-decoration: none;
	color: #FF0000;
}
body {
	margin-top: 0px;
}
.STYLE1 {color: #FF0000}
.STYLE2 {color: #000000}
-->
</style></head>

<body>
<form method="POST" action="<?php echo $editFormAction; ?>" id="form1" name="form1">
  <table width="650" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#99CCCC">
    <tr>
      <td height="30" colspan="2">管理员，你好！请你修改新闻！</td>
    </tr>
    <tr>
      <td width="86" height="20">新闻标题：</td>
      <td width="508"><label>
        <input name="news_title" type="text" id="news_title" value="<?php echo $row_Recordset1['news_title']; ?>" size="30" />
        <input name="news_id" type="hidden" id="news_id" value="<?php echo $row_Recordset1['news_id']; ?>">
      </label></td>
    </tr>
    <tr>
      <td height="20">更新时间：</td>
      <td><label>
        <input name="news_date" type="text" id="news_date" value="<?php
date_default_timezone_set('Asia/Beijing');
echo date("Y-m-d");
?>
" size="30"  />
      </label></td>
    </tr>
    <tr>
      <td height="20">新闻分类：</td>
      <td><label>
        <select name="news_type" id="news_type">
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset2['type_id']?>"<?php if (!(strcmp($row_Recordset2['type_id'], $row_Recordset2['type_name']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset2['type_name']?></option>
          <?php
} while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
  $rows = mysql_num_rows($Recordset2);
  if($rows > 0) {
      mysql_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysql_fetch_assoc($Recordset2);
  }
?>
        </select>
        </label>
        <span class="STYLE1">&nbsp;&nbsp;&nbsp; <span class="STYLE2">作者</span>
          <label>
          <input name="news_author" type="text" id="news_author" value="<?php echo $row_Recordset1['news_author']; ?>" size="12" />
          </label>
        </span></td>
    </tr>
    <tr>
      <td height="20">新闻内容：</td>
      <td>
        <span class="STYLE1">
          <label>
          <textarea name="news_content" cols="60" rows="20" id="news_content"><?php echo $row_Recordset1['news_content']; ?></textarea>
          </label>
        </span></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="submit" name="Submit" value="更新" />
        &nbsp;&nbsp;
        <input name="Submit2" type="reset" value="重置" />
        &nbsp;</td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
