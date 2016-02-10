<?php require_once('Connections/gbook.php'); ?>
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

$maxRows_Rs = 3;
$pageNum_Rs = 0;
if (isset($_GET['pageNum_Rs'])) {
  $pageNum_Rs = $_GET['pageNum_Rs'];
}
$startRow_Rs = $pageNum_Rs * $maxRows_Rs;

mysql_select_db($database_gbook, $gbook);
$query_Rs = "SELECT * FROM gbook WHERE passid=1";
$query_limit_Rs = sprintf("%s LIMIT %d, %d", $query_Rs, $startRow_Rs, $maxRows_Rs);
$Rs = mysql_query($query_limit_Rs, $gbook) or die(mysql_error());
$row_Rs = mysql_fetch_assoc($Rs);

if (isset($_GET['totalRows_Rs'])) {
  $totalRows_Rs = $_GET['totalRows_Rs'];
} else {
  $all_Rs = mysql_query($query_Rs);
  $totalRows_Rs = mysql_num_rows($all_Rs);
}
$totalPages_Rs = ceil($totalRows_Rs/$maxRows_Rs)-1;$maxRows_Rs = 3;
$pageNum_Rs = 0;
if (isset($_GET['pageNum_Rs'])) {
  $pageNum_Rs = $_GET['pageNum_Rs'];
}
$startRow_Rs = $pageNum_Rs * $maxRows_Rs;

mysql_select_db($database_gbook, $gbook);
$query_Rs = "SELECT * FROM gbook WHERE passid=0";
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
<title>留言首页</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
	margin-left: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
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
.STYLE3 {font-size: 10px}
.STYLE4 {color: #FF0000}
.STYLE5 {color: #000000}
a:link {
	color: #000000;
	text-decoration: none;
}
a:active {
	color: #FF0000;
	text-decoration: none;
}
a:visited {
	color: #000000;
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
.STYLE6 {
	font-size: 16px;
	color: #FF0000;
	font-family: "黑体";
}
.STYLE7 {
	font-size: 14px;
	color: #FF0000;
}
-->
</style></head>

<body>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><img src="images/logo.jpg" width="750" height="120" border="0" /></td>
  </tr>
  
  <tr>
    <td width="195" bgcolor="#FEFEFE"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="90%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="98%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="195" height="133" background="images/index.02.gif" bgcolor="#FEFEFE" valign="top"><form id="form2" name="form2" method="POST">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="38">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="25">&nbsp;&nbsp; 用户名：
                          <input name="username" type="text" class="STYLE3" id="username" size="15" /></td>
                      </tr>
                      <tr>
                        <td height="20">&nbsp;&nbsp; 密&nbsp; 码：
                          <input name="password" type="password" class="STYLE3" id="password" size="15" /></td>
                      </tr>
                      <tr>
                        <td height="25">&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;
                                    <input type="submit" name="Submit" value="提交" />
                                    <input type="reset" name="Submit2" value="重置" /></td>
                      </tr>
                      <tr>
                        <td height="12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 注册新用户 找回密码 </td>
                      </tr>
                    </table>
                </form></td>
              </tr>
              <tr>
                <td bgcolor="#FEFEFE"><img src="images/index_04.gif" width="195" height="36" /></td>
              </tr>
              <tr>
                <td bgcolor="#FEFEFE"><img src="images/lxwm.jpg" width="195" height="155" /></td>
              </tr>
              <tr>
                <td height="25" bgcolor="#FEFEFE">　洽谈合作 </td>
              </tr>
              <tr>
                <td height="25" bgcolor="#FEFEFE"><img src="images/memeber.gif" width="195" height="83" /></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      
    </table>      </td>
    <td width="555" bgcolor="#FEFEFE" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp; 你的位置---在线留言&nbsp;&nbsp;    &nbsp;    &nbsp;      &nbsp;    &nbsp;    &nbsp;  &nbsp;&nbsp;&nbsp; 现在时间是：<?php
date_default_timezone_set('Asia/Shanghai');
echo date("Y-m-d h:i:s");
?></td>
            </tr>
            <tr>
              <td height="40">&nbsp;<img src="images/14384-m.jpg" width="23" height="22" /><span class="STYLE6"> 留言簿</span></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="25">&nbsp;&nbsp; 如果你有什么问题需要咨询的话，请单击<a href="book.php"><span class="STYLE7">留言</span></a>给我留言，我们会第一时间给你答复。</td>
      </tr>
      <tr>
        <td height="20" bgcolor="#F3F3F3">记录 <?php echo ($startRow_Rs + 1) ?> 到 <?php echo min($startRow_Rs + $maxRows_Rs, $totalRows_Rs) ?> (总共 <?php echo $totalRows_Rs ?>)
          <table width="40%" border="0" align="right">
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
          </table></td>
      </tr>
      <tr>
        <td height="10"><form id="form1" name="form1" method="post" action="">
          <?php do { ?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="8%" bgcolor="#F3F3F3"><div align="center">ID号</div></td>
                <td width="18%" height="20" bgcolor="#F3F3F3">留言主题：</td>
                <td width="74%"><label><?php echo $row_Rs['subject']; ?></label></td>
                </tr>
              <tr>
                <td bgcolor="#F3F3F3"><div align="center"><?php echo $row_Rs['ID']; ?></div></td>
                <td height="20" bgcolor="#F3F3F3">留言内容：</td>
                <td height="20"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="20">来自<?php echo $row_Rs['IP']; ?>的朋友在&nbsp;留言内容：</td>
                    </tr>
                  <tr>
                    <td>&nbsp;&nbsp;<?php echo $row_Rs['content']; ?></td>
                    </tr>
                  </table></td>
                </tr>
              <tr>
                <td bgcolor="#F3F3F3">&nbsp;</td>
                <td height="30" bgcolor="#F3F3F3">管理回复：</td>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>
                      <?php 
					if ( $row_Rs['reply']= empty( $row_Rs['reply'])) {
                    echo "对不起，暂无回复！";} 
					else{ ?>			
                      <br />		
                      管理员在<?php echo $row_Rs['redate']; ?>回复内容：<br />
                      <?php echo $row_Rs['reply']; }?>
                      </td>
                    </tr>
                  </table></td>
                </tr>
              <tr>
                <td height="25" colspan="3" bgcolor="#F3F3F3">&nbsp;</td>
                </tr>
            </table>
            <?php } while ($row_Rs = mysql_fetch_assoc($Rs)); ?>
        </form></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="50" colspan="2" bgcolor="#55C2EB"><div align="center"><span class="STYLE1">Copyright@2011-2012 hbculture.com Inc.All rights reserved.   环博文化 版权所有</span></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p class="STYLE2">&nbsp;</p>
<map name="Map" id="Map"><area shape="rect" coords="284,13,371,32" href="book.php" />
</map>
</body>
</html>
<?php
mysql_free_result($Rs);
?>
