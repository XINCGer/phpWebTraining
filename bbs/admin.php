<?php require_once('Connections/bbs.php'); ?>
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
$keyword=$_POST[keyword]; //定义keyword为表单中"keyword"的请求变量
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

$maxRows_rs_bbs = 20;
$pageNum_rs_bbs = 0;
if (isset($_GET['pageNum_rs_bbs'])) {
  $pageNum_rs_bbs = $_GET['pageNum_rs_bbs'];
}
$startRow_rs_bbs = $pageNum_rs_bbs * $maxRows_rs_bbs;

mysql_select_db($database_bbs, $bbs);
$query_rs_bbs = "SELECT bbs_Main.bbs_ID, bbs_Main.bbs_Time,bbs_Main.bbs_Hits,   bbs_Main.bbs_Title,bbs_Main.bbs_url,  bbs_Main.bbs_email,bbs_Main.bbs_sex, bbs_Main.bbs_Face,bbs_Main.bbs_Content, bbs_Main.bbs_Name,COUNT(bbs_Ref.bbs_Main_ID) AS ReturnNum, MAX(bbs_Ref.bbs_ref_Time) AS LatesTime FROM bbs_Main LEFT OUTER JOIN bbs_Ref ON  bbs_Main.bbs_ID=bbs_Ref.bbs_Main_ID where bbs_Title like '%".$keyword."%' GROUP BY bbs_Main.bbs_ID ";
$query_limit_rs_bbs = sprintf("%s LIMIT %d, %d", $query_rs_bbs, $startRow_rs_bbs, $maxRows_rs_bbs);
$rs_bbs = mysql_query($query_limit_rs_bbs, $bbs) or die(mysql_error());
$row_rs_bbs = mysql_fetch_assoc($rs_bbs);

if (isset($_GET['totalRows_rs_bbs'])) {
  $totalRows_rs_bbs = $_GET['totalRows_rs_bbs'];
} else {
  $all_rs_bbs = mysql_query($query_rs_bbs);
  $totalRows_rs_bbs = mysql_num_rows($all_rs_bbs);
}
$totalPages_rs_bbs = ceil($totalRows_rs_bbs/$maxRows_rs_bbs)-1;

$queryString_rs_bbs = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rs_bbs") == false && 
        stristr($param, "totalRows_rs_bbs") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rs_bbs = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rs_bbs = sprintf("&totalRows_rs_bbs=%d%s", $totalRows_rs_bbs, $queryString_rs_bbs);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>论坛管理系统</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
	background-color: #FFF;
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
	color: #000000;
}
.STYLE28 {
	font-size: 13px;
	color: #FFFFFF;
}
-->
</style></head>

<body>

<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="764"><img src="images/1副本.gif" width="764" height="179" /></td>
  </tr>
  
  <tr>
    <td height="30" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="339" height="30"><table width="100%" height="30" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td valign="middle"><form action="" name="form1" id="form1">
                    <div align="center">查询主题：
                                        
                      <span class="style18">
                      <input name="keyword" type="text" id="keyword8" value="" size="30" />
                      </span><span class="style18">
                      <input type="submit" name="Submit" value="查询" />
                      </span>
                    </div>
              </form></td>
            </tr>
        </table></td>
        <td width="425"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="67%"><table border="0">
              <tr>
                  <td><?php if ($pageNum_rs_bbs > 0) { // Show if not first page ?>
                      <a href="<?php printf("%s?pageNum_rs_bbs=%d%s", $currentPage, 0, $queryString_rs_bbs); ?>">第一页</a>
                      <?php } // Show if not first page ?></td>
                  <td><?php if ($pageNum_rs_bbs > 0) { // Show if not first page ?>
                      <a href="<?php printf("%s?pageNum_rs_bbs=%d%s", $currentPage, max(0, $pageNum_rs_bbs - 1), $queryString_rs_bbs); ?>">前一页</a>
                      <?php } // Show if not first page ?></td>
                  <td><?php if ($pageNum_rs_bbs < $totalPages_rs_bbs) { // Show if not last page ?>
                      <a href="<?php printf("%s?pageNum_rs_bbs=%d%s", $currentPage, min($totalPages_rs_bbs, $pageNum_rs_bbs + 1), $queryString_rs_bbs); ?>">下一个</a>
                      <?php } // Show if not last page ?></td>
                  <td><?php if ($pageNum_rs_bbs < $totalPages_rs_bbs) { // Show if not last page ?>
                      <a href="<?php printf("%s?pageNum_rs_bbs=%d%s", $currentPage, $totalPages_rs_bbs, $queryString_rs_bbs); ?>">最后一页</a>
                      <?php } // Show if not last page ?></td>
                </tr>
            </table></td>
            <td width="33%"><div align="right"><a href="bbs_add.php"><img src="images/postnew.gif" width="72" height="21" border="0" /></a>&nbsp;<a href="admin_login.php"><img src="images/Editor.gif" width="59" height="20" border="0" /></a></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#66CCFF" bgcolor="#FFFFFF" >
      <tr>
        <td width="5%" height="29" background="../froum/images/dow3.gif">心情</td>
        <td width="20%"> 发言主题 </td>
        <td width="10%">作&nbsp;者</td>
        <td width="9%"> 回复 </td>
        <td width="16%"> 最新回复</td>
        <td width="5%"> 阅读</td>
        <td width="15%"> 发布时间</td>
        <td width="10%">修改</td>
        <td width="10%">删除</td>
      </tr>
      <?php if ($totalRows_rs_bbs > 0) { // Show if recordset not empty ?>
        <?php do { ?>
          <tr>
            <td><img src="<?php echo $row_rs_bbs['bbs_Face']; ?>" alt="" name=""></td>
            <td height="40"><a href="del_reply.php?bbs_id=<?php echo $row_rs_bbs['bbs_ID']; ?>"><?php echo $row_rs_bbs['bbs_Title']; ?></a></td>
            <td><?php echo $row_rs_bbs['bbs_Name']; ?></td>
            <td><?php echo $row_rs_bbs['ReturnNum']; ?></td>
            <td><?php echo $row_rs_bbs['LatesTime']; ?></td>
            <td><?php echo $row_rs_bbs['bbs_Hits']; ?></td>
            <td><?php echo $row_rs_bbs['bbs_Time']; ?></td>
            <td><a href="upd_title.php?bbs_ID=<?php echo $row_rs_bbs['bbs_ID']; ?>"><img src="images/write.gif" width="16" height="16"></a></td>
            <td><a href="del_title.php?bbs_ID=<?php echo $row_rs_bbs['bbs_ID']; ?>"><img src="images/dele.gif" width="16" height="16"></a></td>
          </tr>
          <?php } while ($row_rs_bbs = mysql_fetch_assoc($rs_bbs)); ?>
        <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_rs_bbs == 0) { // Show if recordset empty ?>
        <tr>
          <td height="20" colspan="9">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="STYLE26">目前没有发表任何主题 </span></td>
        </tr>
        <?php } // Show if recordset empty ?>
      <tr>
        <td height="40" colspan="9" bgcolor="#4DAFFE"><span class="STYLE28">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Copyright @ 2012 www.hbculture.com Inc.All rights reserved. PHP论坛管理系统 </span></td>
</tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($rs_bbs);
?>
