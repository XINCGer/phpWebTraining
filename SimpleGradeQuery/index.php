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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Rsdb = 5;
$pageNum_Rsdb = 0;
if (isset($_GET['pageNum_Rsdb'])) {
  $pageNum_Rsdb = $_GET['pageNum_Rsdb'];
}
$startRow_Rsdb = $pageNum_Rsdb * $maxRows_Rsdb;

mysql_select_db($database_webconn, $webconn);
$query_Rsdb = "SELECT * FROM websql";
$query_limit_Rsdb = sprintf("%s LIMIT %d, %d", $query_Rsdb, $startRow_Rsdb, $maxRows_Rsdb);
$Rsdb = mysql_query($query_limit_Rsdb, $webconn) or die(mysql_error());
$row_Rsdb = mysql_fetch_assoc($Rsdb);

if (isset($_GET['totalRows_Rsdb'])) {
  $totalRows_Rsdb = $_GET['totalRows_Rsdb'];
} else {
  $all_Rsdb = mysql_query($query_Rsdb);
  $totalRows_Rsdb = mysql_num_rows($all_Rsdb);
}
$totalPages_Rsdb = ceil($totalRows_Rsdb/$maxRows_Rsdb)-1;

$queryString_Rsdb = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Rsdb") == false && 
        stristr($param, "totalRows_Rsdb") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Rsdb = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Rsdb = sprintf("&totalRows_Rsdb=%d%s", $totalRows_Rsdb, $queryString_Rsdb);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP动态系统</title>
<style type="text/css">
.aline_center {
	text-align: center;
}
.ca {
	text-align: center;
}
</style>
</head>

<body class="ca">
<p class="aline_center">PHP动态系统</p>
<hr />
共有<?php echo $totalRows_Rsdb ?> 笔记录，目前查看第<?php echo ($startRow_Rsdb + 1) ?>笔至第<?php echo min($startRow_Rsdb + $maxRows_Rsdb, $totalRows_Rsdb) ?>笔
<table width="600" border="1" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td>序号</td>
    <td>姓名</td>
    <td>年龄</td>
    <td>成绩</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><a href="detail.php?ID=<?php echo $row_Rsdb['ID']; ?>"><?php echo $row_Rsdb['ID']; ?></a></td>
      <td><?php echo $row_Rsdb['name']; ?></td>
      <td><?php echo $row_Rsdb['age']; ?></td>
      <td><?php echo $row_Rsdb['Result']; ?></td>
    </tr>
    <?php } while ($row_Rsdb = mysql_fetch_assoc($Rsdb)); ?>
</table>
<table width="600" border="1" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td width="143"><?php if ($pageNum_Rsdb > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Rsdb=%d%s", $currentPage, 0, $queryString_Rsdb); ?>">[第一页]</a>
        <?php } // Show if not first page ?></td>
    <td width="143"><?php if ($pageNum_Rsdb > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Rsdb=%d%s", $currentPage, max(0, $pageNum_Rsdb - 1), $queryString_Rsdb); ?>">[前一页]</a>
        <?php } // Show if not first page ?></td>
    <td width="143"><?php if ($pageNum_Rsdb < $totalPages_Rsdb) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Rsdb=%d%s", $currentPage, min($totalPages_Rsdb, $pageNum_Rsdb + 1), $queryString_Rsdb); ?>">[下一页]</a>
        <?php } // Show if not last page ?></td>
    <td width="148"><?php if ($pageNum_Rsdb < $totalPages_Rsdb) { // Show if not last page ?>
  <a href="<?php printf("%s?pageNum_Rsdb=%d%s", $currentPage, $totalPages_Rsdb, $queryString_Rsdb); ?>">[最后一页]</a>
  <?php } // Show if not last page ?></td>
  </tr>
</table>
<hr />
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Rsdb);
?>
