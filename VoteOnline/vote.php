<?php require_once('Connections/vote.php'); ?>


<script language="javascript">
  function chknc(nc)
  {
    window.open("chkusernc.php?nc="+nc,"newframe","width=200,height=10,left=500,top=200,menubar=no,toolbar=no,location=no,scrollbars=no,location=no");
  }
</script>

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
$query_Rsvote = "SELECT * FROM vote";
$Rsvote = mysql_query($query_Rsvote, $vote) or die(mysql_error());
$row_Rsvote = mysql_fetch_assoc($Rsvote);
$totalRows_Rsvote = mysql_num_rows($Rsvote);
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
	background-color: #CCCCCC;
}
.STYLE1 {font-size: 14px}
.STYLE2 {font-size: 13px}
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
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><img src="images/vote_01.gif" width="600" height="294" /></td>
  </tr>
  <tr>
    <td colspan="3"><img src="images/vote_02.gif" width="600" height="39" /></td>
  </tr>
  <tr>
    <td width="76" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="448" height="271" background="images/vote_03.gif"><form action="voteadd.php" method="POST" name="form1" id="form1">
      <table width="75%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#ECF4FC" >
        <tr>
          <td height="30" colspan="2"><span class="STYLE1">&nbsp;你投的选项是：</span></td>
        </tr>
        <?php do { ?>
          <tr>
            <td width="14%" height="25"><label> &nbsp;
              <input name="ID" type="radio"  value=" <?php echo $row_Rsvote['ID']; ?>" >
             </label></td>
            <td width="86%"><?php echo $row_Rsvote['item']; ?></td>
          </tr>
          <?php } while ($row_Rsvote = mysql_fetch_assoc($Rsvote)); ?>
<tr>
  <td height="25" colspan="2"><label>
            &nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            <input name="Submit" type="submit"  value="投票" />
            &nbsp;&nbsp; 
            <input name="Submit2" type="reset" onClick="MM_goToURL('parent','voteok.php');return document.MM_returnValue" value="查看" />
          </label></td>
    </tr>
      </table>
      <input name="voteip" type="hidden" id="voteip" value="<?php echo $_SERVER['REMOTE_ADDR'];?>">
    </form>
    </td>
    <td width="76" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><img src="images/vote_04.gif" width="600" height="48" /></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Rsvote);
?>
