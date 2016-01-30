<?php require_once('Connections/webconn.php'); ?>
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

$colname_rsdetail = "-1";
if (isset($_GET['ID'])) {
  $colname_rsdetail = $_GET['ID'];
}
mysql_select_db($database_webconn, $webconn);
$query_rsdetail = sprintf("SELECT * FROM websql WHERE ID = %s", GetSQLValueString($colname_rsdetail, "int"));
$rsdetail = mysql_query($query_rsdetail, $webconn) or die(mysql_error());
$row_rsdetail = mysql_fetch_assoc($rsdetail);
$totalRows_rsdetail = mysql_num_rows($rsdetail);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>详细页面</title>
<style type="text/css">
.aline_center {	text-align: center;
}
</style>
</head>

<body>
<p class="aline_center">PHP动态系统</p>
<hr />
<table width="600" border="1" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td>序号</td>
    <td>姓名</td>
    <td>年龄</td>
    <td>成绩</td>
    <td>编辑</td>
  </tr>
  <tr>
    <td><?php echo $row_rsdetail['ID']; ?></td>
    <td><?php echo $row_rsdetail['name']; ?></td>
    <td><?php echo $row_rsdetail['age']; ?></td>
    <td><?php echo $row_rsdetail['Result']; ?></td>
    <td><a href="update.php?ID=<?php echo $row_rsdetail['ID']; ?>">更新</a> / <a href="del.php?ID=<?php echo $row_rsdetail['ID']; ?>">删除</a></td>
  </tr>
</table>
<hr />
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsdetail);
?>
