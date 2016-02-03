<?php require_once('../Connections/news.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
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

$maxRows_Re = 10;
$pageNum_Re = 0;
if (isset($_GET['pageNum_Re'])) {
  $pageNum_Re = $_GET['pageNum_Re'];
}
$startRow_Re = $pageNum_Re * $maxRows_Re;

mysql_select_db($database_news, $news);
$query_Re = "SELECT * FROM news ORDER BY news_id DESC";
$query_limit_Re = sprintf("%s LIMIT %d, %d", $query_Re, $startRow_Re, $maxRows_Re);
$Re = mysql_query($query_limit_Re, $news) or die(mysql_error());
$row_Re = mysql_fetch_assoc($Re);

if (isset($_GET['totalRows_Re'])) {
  $totalRows_Re = $_GET['totalRows_Re'];
} else {
  $all_Re = mysql_query($query_Re);
  $totalRows_Re = mysql_num_rows($all_Re);
}
$totalPages_Re = ceil($totalRows_Re/$maxRows_Re)-1;

mysql_select_db($database_news, $news);
$query_Re1 = "SELECT * FROM newstype";
$Re1 = mysql_query($query_Re1, $news) or die(mysql_error());
$row_Re1 = mysql_fetch_assoc($Re1);
$totalRows_Re1 = mysql_num_rows($Re1);

$queryString_Re = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re") == false && 
        stristr($param, "totalRows_Re") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re = sprintf("&totalRows_Re=%d%s", $totalRows_Re, $queryString_Re);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理主页面</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
	background-image: url(images/bg.gif);
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
	text-decoration: none;
	color: #006600;
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
.STYLE23 {font-size: 14px}
.STYLE24 {font-size: 12px}
-->
</style></head>

<body>
<table width="768" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="../images/top.gif" width="769" height="310" border="0" usemap="#Map">
      <map name="Map">
        <area shape="rect" coords="106,282,171,304" href="index.php">
    </map></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td width="266" height="222" bgcolor="#FFFFFF"><table width="95%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="222" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    
                    <tr>
                      <td height="30">&nbsp;新闻后台管理中心：</td>
                    </tr>
                    <tr>
                      <td height="25">&nbsp;<a href="news_add.php">添加新闻</a></td>
                    </tr>
                    <tr>
                      <td height="25"><a href="type_add.php">添加新闻分类</a>&nbsp;&nbsp;</td>
                    </tr>
                  </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="37%" height="20">  管理员你好！</td>
                      <td width="63%">请你管理新闻分类 ！ </td>
                    </tr>
                  </table>
                
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="20"> 类　型　　　　　管　理</td>
                    </tr>
                    <?php do { ?>
                      <tr>
                        <td><?php echo $row_Re1['type_name']; ?>　
                        [<a href="type_upd.php?type_id=<?php echo $row_Re1['type_id']; ?>">修改</a>޸] 　[<a href="type_del.php?type_id=<?php echo $row_Re1['type_id']; ?>">删除</a>]</td>
                      </tr>
                      <?php } while ($row_Re1 = mysql_fetch_assoc($Re1)); ?>
                  </table></td>
            </tr>
        </table></td>
        <td width="496" valign="top" bgcolor="#FFFFFF"><?php do { ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="70%" height="20">标题：<a href="../newscontent.php?news_id=<?php echo $row_Re['news_id']; ?>"><?php echo $row_Re['news_title']; ?></a></td>
                <td width="30%"><div align="center">[<a href="news_upd.php?news_id=<?php echo $row_Re['news_id']; ?>">修改</a>޸] 　[<a href="news_del.php?news_id=<?php echo $row_Re['news_id']; ?>">删除</a>] </div></td>
                </tr>
            </table>
            <?php } while ($row_Re = mysql_fetch_assoc($Re)); ?>
<br>
<table width="90%" border="0" align="center">
  <tr>
    <td><?php if ($pageNum_Re > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Re=%d%s", $currentPage, 0, $queryString_Re); ?>">第一页</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_Re > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Re=%d%s", $currentPage, max(0, $pageNum_Re - 1), $queryString_Re); ?>">前一页</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_Re < $totalPages_Re) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Re=%d%s", $currentPage, min($totalPages_Re, $pageNum_Re + 1), $queryString_Re); ?>">下一个</a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_Re < $totalPages_Re) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Re=%d%s", $currentPage, $totalPages_Re, $queryString_Re); ?>">最后一页</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table></td>
        <td width="6"></td>
      </tr>
      
    </table></td>
  </tr>
  <tr>
    <td><img src="../images/di.gif" width="768" height="50" /></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Re);

mysql_free_result($Re1);
?>
