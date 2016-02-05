<?php require_once('Connections/vote.php'); ?>
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

mysql_select_db($database_vote, $vote);
$query_Rs = "SELECT * FROM vote";
$Rs = mysql_query($query_Rs, $vote) or die(mysql_error());
$row_Rs = mysql_fetch_assoc($Rs);
$totalRows_Rs = mysql_num_rows($Rs);

mysql_select_db($database_vote, $vote);
$query_Rs1 = "SELECT sum(vote) as sum FROM vote";
$Rs1 = mysql_query($query_Rs1, $vote) or die(mysql_error());
$row_Rs1 = mysql_fetch_assoc($Rs1);
$totalRows_Rs1 = mysql_num_rows($Rs1);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>投票主页面</title>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
body {
	margin-top: 0px;
	background-color: #CCC;
}
.STYLE1 {font-size: 14px}
.STYLE3 {
	color: #FF0000;
	font-size: 14;
}
.STYLE5 {color: #FF0000; font-size: 16px; }
.STYLE6 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	color: #FF0000;
}
-->
</style>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
</head>

<body>
<table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
  
  <tr>
    <td height="30" colspan="3" bgcolor="#66CC00"><p class="STYLE1">&nbsp;&nbsp;&nbsp;&nbsp; 选项调查中总共有<?php echo $row_Rs1['sum']; ?><span class="STYLE5"></span> 人参加投票！</p>
    </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="40">&nbsp;</td>
    <td width="464" height="208"><form id="form1" name="form1" method="post" action="">
      <table width="85%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="b18a02" bgcolor="#fff">
        <tr>
          <td height="20" colspan="3" bgcolor="#FFFFFF"><span class="STYLE1">&nbsp;<span class="STYLE6">投票结果：</span></span></td>
        </tr>
        <?php do { ?>
          <tr bgcolor="#FFFFFF">
            <td width="18%" height="25"><label><span class="STYLE3">&nbsp; <?php echo $row_Rs['item']; ?></span></label></td>
            <td width="40%">&nbsp;<img src="images/bar.gif" width="<?php echo round(($row_Rs['vote']/$row_Rs1['sum']),4)*100?>" height="13" /><span class="STYLE3">
              <?php echo round(($row_Rs['vote']/$row_Rs1['sum']),4)*100?>%</span></td>
            <td width="42%" class="STYLE3">&nbsp;小计：<?php echo $row_Rs['vote']; ?>票数&nbsp; </td>
          </tr>
          <?php } while ($row_Rs = mysql_fetch_assoc($Rs)); ?>
<tr bgcolor="#FFFFFF">
  <td height="20" colspan="3">&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;　　　　　　　　&nbsp;&nbsp;&nbsp;
            <input name="Submit" type="reset" onClick="MM_goToURL('parent','vote.php');return document.MM_returnValue" value="返回" /></td>
    </tr>
      </table>
    </form></td>
    <td width="40">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" colspan="3" bgcolor="#66CC00">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Rs);

mysql_free_result($Rs1);
?>
