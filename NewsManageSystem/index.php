<?php require_once('Connections/news.php'); 
?>
<?php
$keyword=$_POST[keyword];
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

mysql_select_db($database_news, $news);
$query_Recordset1 = "SELECT * FROM newstype";
$Recordset1 = mysql_query($query_Recordset1, $news) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$maxRows_Re1 = 10;
$pageNum_Re1 = 0;
if (isset($_GET['pageNum_Re1'])) {
  $pageNum_Re1 = $_GET['pageNum_Re1'];
}
$startRow_Re1 = $pageNum_Re1 * $maxRows_Re1;

mysql_select_db($database_news, $news);
$query_Re1 = "SELECT * FROM news where news_title like '%".$keyword."%' ORDER BY news_id DESC";
$query_limit_Re1 = sprintf("%s LIMIT %d, %d", $query_Re1, $startRow_Re1, $maxRows_Re1);
$Re1 = mysql_query($query_limit_Re1, $news) or die(mysql_error());
$row_Re1 = mysql_fetch_assoc($Re1);

if (isset($_GET['totalRows_Re1'])) {
  $totalRows_Re1 = $_GET['totalRows_Re1'];
} else {
  $all_Re1 = mysql_query($query_Re1);
  $totalRows_Re1 = mysql_num_rows($all_Re1);
}
$totalPages_Re1 = ceil($totalRows_Re1/$maxRows_Re1)-1;

$queryString_Re1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re1") == false && 
        stristr($param, "totalRows_Re1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re1 = sprintf("&totalRows_Re1=%d%s", $totalRows_Re1, $queryString_Re1);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新闻首页</title>
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
.STYLE26 {
	font-size: 14px;
	color: #FFFFFF;
}
-->
</style>
</head>

<body>
<table width="768" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="722" bgcolor="#FFFFFF"><img src="images/top.gif" width="769" height="310" border="0" usemap="#Map"></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="497" height="192" valign="top"><table width="100%" cellspacing="0" cellpadding="0"><tr></tr>
        </table>
          <table width="100%" cellspacing="0" cellpadding="0"><tr></tr>
          </table>          
          <table width="768" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="150" valign="top" rowspan="2"><table width="150" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="150" height="30"><div align="center">新闻分类：</div></td>
                </tr>
                <?php do { ?>
                  <tr>
                    <td><div align="center">
                      <a href="type.php?id=<?php echo $row_Recordset1['type_id']; ?>"><?php echo $row_Recordset1['type_name']; ?></a></div></td>
                  </tr>
                  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
<tr>
  <td>&nbsp;</td>
            </tr>
              </table></td>
              <td width="618" height="25" ><form id="form1" name="form1" method="post" action="">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="20"><div align="center">查询主题：
                      <input type="text" name="keyword" id="keyword" />
                            <input type="submit" name="button" id="button" value="查询" />
                    </div></td>
                  </tr>
                </table>
              </form></td>
            </tr>
            <tr>
              <td valign="top"><table width="96%" border="1" cellpadding="0" cellspacing="0" bordercolor="#0073B5">
                <tr>
                  <td height="30" colspan="3" bgcolor="#0073B5">　<span class="STYLE26">最新新闻：
记录 <?php echo ($startRow_Re1 + 1) ?> 到 <?php echo min($startRow_Re1 + $maxRows_Re1, $totalRows_Re1) ?> (总共 <?php echo $totalRows_Re1 ?>）</span></td>
                  </tr>
                <tr>
                  <td width="44%" height="25"><div align="center">主　题</div></td>
                  <td width="37%"><div align="center">加入时间</div></td>
                  <td width="19%"><div align="center">详细内容</div></td>
                </tr>
                <?php do { ?>
                  <tr>
                    <td height="25"><div align="center"><?php echo $row_Re1['news_title']; ?></div></td>
                    <td><div align="center"><?php echo $row_Re1['news_date']; ?></div></td>
                    <td><div align="center"><a href="newscontent.php?news_id=<?php echo $row_Re1['news_id']; ?>">查看</a></div></td>
                  </tr>
                  <?php } while ($row_Re1 = mysql_fetch_assoc($Re1)); ?>
              </table>
                <table width="583" border="0">
                  <tr>
                    <td><?php if ($pageNum_Re1 > 0) { // Show if not first page ?>
                        <a href="<?php printf("%s?pageNum_Re1=%d%s", $currentPage, 0, $queryString_Re1); ?>">第一页</a>
                        <?php } // Show if not first page ?></td>
                    <td><?php if ($pageNum_Re1 > 0) { // Show if not first page ?>
                        <a href="<?php printf("%s?pageNum_Re1=%d%s", $currentPage, max(0, $pageNum_Re1 - 1), $queryString_Re1); ?>">前一页</a>
                        <?php } // Show if not first page ?></td>
                    <td><?php if ($pageNum_Re1 < $totalPages_Re1) { // Show if not last page ?>
                        <a href="<?php printf("%s?pageNum_Re1=%d%s", $currentPage, min($totalPages_Re1, $pageNum_Re1 + 1), $queryString_Re1); ?>">下一个</a>
                        <?php } // Show if not last page ?></td>
                    <td><?php if ($pageNum_Re1 < $totalPages_Re1) { // Show if not last page ?>
                        <a href="<?php printf("%s?pageNum_Re1=%d%s", $currentPage, $totalPages_Re1, $queryString_Re1); ?>">最后一页</a>
                        <?php } // Show if not last page ?></td>
                  </tr>
              </table>
                </p></td>
            </tr>
          </table>
          </td>
      </tr>
      
      
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><img src="images/di.gif" width="768" height="50" /></td>
  </tr>
</table>

<map name="Map">
  <area shape="rect" coords="106,282,171,304" href="index.php">
</map>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Re1);
?>
