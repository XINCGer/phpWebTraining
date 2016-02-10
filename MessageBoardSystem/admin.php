<?php require_once('Connections/gbook.php'); ?>
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

$MM_restrictGoTo = "admin_login.php";
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

$maxRows_Rs = 10;
$pageNum_Rs = 0;
if (isset($_GET['pageNum_Rs'])) {
  $pageNum_Rs = $_GET['pageNum_Rs'];
}
$startRow_Rs = $pageNum_Rs * $maxRows_Rs;

mysql_select_db($database_gbook, $gbook);
$query_Rs = "SELECT * FROM gbook ORDER BY ID DESC";
$query_limit_Rs = sprintf("%s LIMIT %d, %d", $query_Rs, $startRow_Rs, $maxRows_Rs);
$Rs = mysql_query($query_limit_Rs, $gbook) or die(mysql_error());
$row_Rs = mysql_fetch_assoc($Rs);

if (isset($_GET['totalRows_Rs'])) {
  $totalRows_Rs = $_GET['totalRows_Rs'];
} else {
  $all_Rs = mysql_query($query_Rs);
  $totalRows_Rs = mysql_num_rows($all_Rs);
}
$totalPages_Rs = ceil($totalRows_Rs/$maxRows_Rs)-1;

$queryString_Rs = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Rs") == false && 
        stristr($param, "totalRows_Rs") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Rs = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Rs = sprintf("&totalRows_Rs=%d%s", $totalRows_Rs, $queryString_Rs);
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
	background-color: #CCCCCC;
}
body,td,th {
	font-size: 12px;
}
.STYLE1 {
	font-size: 13px;
	color: #FFFFFF;
}
.STYLE2 {font-size: 9px}
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
.STYLE5 {font-size: 16px}
-->
</style>
</head>

<body>
<table width="749" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/logo.jpg" width="750" height="120" border="0" usemap="#Map2" /></td>
  </tr>
  
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="30">&nbsp;&nbsp;&nbsp;&nbsp; 你的位置：管理主页面&nbsp;&nbsp;    &nbsp;    &nbsp;      &nbsp;    &nbsp;    &nbsp;  &nbsp;&nbsp;&nbsp;</td>
            </tr>
            <tr>
              <td> &nbsp;&nbsp;&nbsp;&nbsp; <img src="images/14384-m.jpg" width="23" height="22" /><span class="STYLE6">管理中心：</span></td>
            </tr>
          </table></td>
        </tr>
      
      <tr>
        <td><?php if ($totalRows_Rs > 0) { // Show if recordset not empty ?>
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr align="char">
                <td width="8%" height="25" bgcolor="#F3F3F3">编号</td>
                <td width="28%" bgcolor="#F3F3F3">主题</td>
                <td width="38%" bgcolor="#F3F3F3">内容</td>
                <td width="15%" bgcolor="#F3F3F3">IP</td>
                <td width="11%" bgcolor="#F3F3F3">管理 </td>
              </tr>
              <?php do { ?>
                <tr>
                  <td height="20"><?php echo $row_Rs['ID']; ?></td>
                  <td height="20"><?php echo $row_Rs['subject']; ?></td>
                  <td><?php echo $row_Rs['content']; ?></td>
                  <td><?php echo $row_Rs['IP']; ?></td>
                  <td><a href="delbook.php?ID=<?php echo $row_Rs['ID']; ?>">删除</a>　<a href="reply.php?ID=<?php echo $row_Rs['ID']; ?>">回复</a></td>
                </tr>
                <?php } while ($row_Rs = mysql_fetch_assoc($Rs)); ?>
            </table>
          <?php } // Show if recordset not empty ?></td>
        </tr>
    </table>
      <table width="80%" border="0" align="center">
        <tr>
          <td><?php if ($pageNum_Rs > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Rs=%d%s", $currentPage, 0, $queryString_Rs); ?>">第一页</a>
            <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Rs > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Rs=%d%s", $currentPage, max(0, $pageNum_Rs - 1), $queryString_Rs); ?>">前一页</a>
            <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Rs < $totalPages_Rs) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Rs=%d%s", $currentPage, min($totalPages_Rs, $pageNum_Rs + 1), $queryString_Rs); ?>">下一个</a>
            <?php } // Show if not last page ?></td>
          <td><?php if ($pageNum_Rs < $totalPages_Rs) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Rs=%d%s", $currentPage, $totalPages_Rs, $queryString_Rs); ?>">最后一页</a>
            <?php } // Show if not last page ?></td>
        </tr>
      </table>
      <?php if ($totalRows_Rs == 0) { // Show if recordset empty ?>
        <p>目前没有任何留言</p>
        <?php } // Show if recordset empty ?>
<p>&nbsp;</p></td>
  </tr>
  <tr>
    <td height="50" bgcolor="#55C2EB"><div align="center" class="STYLE1">Copyright@2011-2012 hbculture.com Inc.All rights reserved.   环博文化 版权所有</div></td>
  </tr>
</table>
<p class="STYLE2">&nbsp;</p>

<map name="Map" id="Map"><area shape="rect" coords="284,13,371,32" href="book.php" />
</map>
<map name="Map2" id="Map2">
  <area shape="rect" coords="541,95,610,116" href="index.php" />
</map></body>
</html>
<?php
mysql_free_result($Rs);
?>
