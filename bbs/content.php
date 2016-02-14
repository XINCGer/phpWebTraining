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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_detail = 5;
$pageNum_detail = 0;
if (isset($_GET['pageNum_detail'])) {
  $pageNum_detail = $_GET['pageNum_detail'];
}
$startRow_detail = $pageNum_detail * $maxRows_detail;

mysql_select_db($database_bbs, $bbs);
$query_detail = "SELECT bbs_main.*,bbs_ref.* FROM bbs_main LEFT OUTER JOIN bbs_ref ON  bbs_main.bbs_ID=bbs_ref.bbs_main_ID WHERE bbs_main.bbs_ID ='".$bbs_ID."' ";
$query_limit_detail = sprintf("%s LIMIT %d, %d", $query_detail, $startRow_detail, $maxRows_detail);
$detail = mysql_query($query_limit_detail, $bbs) or die(mysql_error());
$row_detail = mysql_fetch_assoc($detail);

mysql_query("UPDATE bbs_main SET bbs_hits = bbs_hits + 1 WHERE bbs_ID = '".$bbs_ID."'");



if (isset($_GET['totalRows_detail'])) {
  $totalRows_detail = $_GET['totalRows_detail'];
} else {
  $all_detail = mysql_query($query_detail);
  $totalRows_detail = mysql_num_rows($all_detail);
}
$totalPages_detail = ceil($totalRows_detail/$maxRows_detail)-1;

$queryString_detail = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_detail") == false && 
        stristr($param, "totalRows_detail") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_detail = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_detail = sprintf("&totalRows_detail=%d%s", $totalRows_detail, $queryString_detail);




?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>论坛管理系统</title>
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
.STYLE29 {
	color: #990000;
	font-size: 14px;
}
.STYLE26 {font-size: 16px}
-->
</style></head>
<body>
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="764"><img src="images/1副本.gif" width="764" height="179" /></td>
  </tr>
  
  <tr>
    <td height="30" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="572" height="30"><table width="99%" height="30" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="STYLE29">讨论主题：<?php echo $row_detail['bbs_title']; ?>&nbsp;</span></td>
            </tr>
        </table></td>
        <td width="192">&nbsp;<a href="bbs_add.php"><img src="images/postnew.gif" width="72" height="21" /></a>&nbsp;&nbsp;&nbsp; &nbsp;<a href="admin_login.php"><img src="images/Editor.gif" width="59" height="20" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td><table width="100%" border="1" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td width="168" rowspan="2" bgcolor="#FFFFFF" valign="top"><p align="center">&nbsp;</p>
                <p align="center"><img src="<?php echo $row_detail['bbs_sex']; ?>" alt="" width="60" height="100"></p>
                <p align="center"> 发表人：<?php echo $row_detail['bbs_name']; ?></p></td>
            <td width="588" height="120" bgcolor="#FFFFFF">主题内容：<?php echo $row_detail['bbs_content']; ?></td>
          </tr>
          <tr>
            <td height="25" bgcolor="#FFFFFF">&nbsp;&nbsp;&nbsp;<img src="images/email.gif" width="16" height="16" />&nbsp; <a href="mailto:<?php echo $row_detail['bbs_email']; ?>">电子邮件</a> &nbsp;<img src="images/home.gif" width="16" height="16" />&nbsp; <a href="http://<?php echo $row_detail['bbs_url']; ?>">主页</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <img src="images/write.gif" width="16" height="16" /><a href="bbs_reply.php?bbs_ID=<?php echo $row_detail['bbs_ID']; ?>">回复主题</a></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php do { ?>
            <?php if ($totalRows_detail > 0) { // Show if recordset not empty ?>
              <table width="100%" border="1" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="170" rowspan="2" bgcolor="#FFFFFF" valign="top"><p align="center">&nbsp;</p>
                    <p align="center"><img src="<?php echo $row_detail['bbs_ref_sex']; ?>" alt="" width="60" height="100">&nbsp;&nbsp;&nbsp; </p>
                    <p align="center">回复人：<?php echo $row_detail['bbs_ref_name']; ?></p></td>
                  <td width="587" height="120" bgcolor="#FFFFFF">回复内容：<?php echo $row_detail['bbs_ref_content']; ?></td>
                </tr>
                <tr>
                  <td height="25" bgcolor="#FFFFFF">&nbsp;&nbsp; <img src="images/11.gif" width="16" height="15" />&nbsp;&nbsp;<?php echo $row_detail['bbs_ref_time']; ?>&nbsp;<img src="images/email.gif" width="16" height="16" />&nbsp;&nbsp;&nbsp; <a href="mailto:<?php echo $row_detail['bbs_ref_email']; ?>">电子邮件</a> &nbsp;<img src="images/home.gif" width="16" height="16" />&nbsp;<a href="http://<?php echo $row_detail['bbs_ref_url']; ?>"> 主页</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>
              </table>
              <?php } // Show if recordset not empty ?>
            <?php } while ($row_detail = mysql_fetch_assoc($detail)); ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="STYLE26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    &nbsp;  &nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;    &nbsp;
<?php if ($totalRows_detail == 0) { // Show if recordset empty ?>
  &nbsp;&nbsp;&nbsp;&nbsp;            目前没有回复
  <?php } // Show if recordset empty ?>
</span></td>
      </tr>
      
    </table></td>
  </tr>
</table>
<table width="764" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="749" height="1"><table border="0" align="center">
        <tr>
          <td width="82"><?php if ($pageNum_detail > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_detail=%d%s", $currentPage, 0, $queryString_detail); ?>">第一页</a>
              <?php } // Show if not first page ?></td>
          <td width="71"><?php if ($pageNum_detail > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_detail=%d%s", $currentPage, max(0, $pageNum_detail - 1), $queryString_detail); ?>">前一页</a>
              <?php } // Show if not first page ?></td>
          <td width="59"><?php if ($pageNum_detail < $totalPages_detail) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_detail=%d%s", $currentPage, min($totalPages_detail, $pageNum_detail + 1), $queryString_detail); ?>">下一个</a>
              <?php } // Show if not last page ?></td>
          <td width="89"><?php if ($pageNum_detail < $totalPages_detail) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_detail=%d%s", $currentPage, $totalPages_detail, $queryString_detail); ?>">最后一页</a>
              <?php } // Show if not last page ?></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="40" bgcolor="#4DAFFE"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="STYLE28"> Copyright @ 2012 www.hbculture.com Inc.All rights reserved. PHP论坛管理系统 </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
<?php 
  mysql_close($conn);  
?>
</html>
<?php
mysql_free_result($detail);
?>
