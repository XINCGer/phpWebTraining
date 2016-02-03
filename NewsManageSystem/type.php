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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysql_select_db($database_news, $news);
$query_Recordset1 = sprintf("SELECT * FROM news WHERE news_id = %s ORDER BY news_id ASC", GetSQLValueString($colname_Recordset1, "int"));
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $news) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新闻分类</title>
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
.STYLE23 {color: #0073B5}
.STYLE24 {font-size: 14px}
-->
</style></head>

<body>
<table width="768" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="722" bgcolor="#FFFFFF"><img src="images/top.gif" width="769" height="310" border="0" usemap="#Map">
      <map name="Map">
        <area shape="rect" coords="106,282,171,304" href="index.php">
    </map></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="497" height="192" valign="top"><?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
            <table width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td height="30">&nbsp;
                  记录 <?php echo ($startRow_Recordset1 + 1) ?> 到 <?php echo min($startRow_Recordset1 + $maxRows_Recordset1, $totalRows_Recordset1) ?> (总共 <?php echo $totalRows_Recordset1 ?>)</td>
              </tr>
              <tr align="center">
                <td><table width="67%" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><?php do { ?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="80%"> 　新闻标题：<?php echo $row_Recordset1['news_title']; ?></td>
                            <td width="20%" height="20"><a href="newscontent.php?news_id=<?php echo $row_Recordset1['news_id']; ?>">详细内容</a></td>
                          </tr>
                        </table>
                        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?></td>
                  </tr>
                  <tr>
                    <td><img src="images/obj_ta_07.gif" width="255" height="1" /></td>
                  </tr>
                </table>
                  <br>
                  <table width="67%" border="0">
                    <tr>
                      <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
                          <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">第一页</a>
                          <?php } // Show if not first page ?></td>
                      <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
                          <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">前一页</a>
                          <?php } // Show if not first page ?></td>
                      <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
                          <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">下一个</a>
                          <?php } // Show if not last page ?></td>
                      <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
                          <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">最后一页</a>
                          <?php } // Show if not last page ?></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            <?php } // Show if recordset not empty ?>
<p>&nbsp;</p></td>
      </tr>
      
      
    </table>
      <?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>对不起，此新闻分类中没有任何新闻</td>
    </tr>
  </table>
  <?php } // Show if recordset empty ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><img src="images/di.gif" width="768" height="50" /></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
