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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE websql SET name=%s, age=%s, `Result`=%s WHERE ID=%s",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['age'], "int"),
                       GetSQLValueString($_POST['Result'], "text"),
                       GetSQLValueString($_POST['ID'], "int"));

  mysql_select_db($database_webconn, $webconn);
  $Result1 = mysql_query($updateSQL, $webconn) or die(mysql_error());

  $updateGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rsupdate = "-1";
if (isset($_GET['ID'])) {
  $colname_rsupdate = $_GET['ID'];
}
mysql_select_db($database_webconn, $webconn);
$query_rsupdate = sprintf("SELECT * FROM websql WHERE ID = %s", GetSQLValueString($colname_rsupdate, "int"));
$rsupdate = mysql_query($query_rsupdate, $webconn) or die(mysql_error());
$row_rsupdate = mysql_fetch_assoc($rsupdate);
$totalRows_rsupdate = mysql_num_rows($rsupdate);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>更新页面</title>
<style type="text/css">
.aline_center {	text-align: center;
}
.dc {
	text-align: center;
}
</style>
</head>

<body>
<p class="aline_center">PHP动态系统</p>
<hr />
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <table width="600" border="1" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td>序号</td>
      <td>姓名</td>
      <td>年龄</td>
      <td>成绩</td>
    </tr>
    <tr>
      <td><input name="ID" type="text" id="ID" value="<?php echo $row_rsupdate['ID']; ?>" size="16" readonly="readonly" /></td>
      <td><input name="name" type="text" id="name" value="<?php echo $row_rsupdate['name']; ?>" size="16" /></td>
      <td><input name="age" type="text" id="age" value="<?php echo $row_rsupdate['age']; ?>" size="16" /></td>
      <td><input name="Result" type="text" id="Result" value="<?php echo $row_rsupdate['Result']; ?>" size="16" /></td>
    </tr>
    <tr>
      <td colspan="4" class="dc"><input type="submit" name="button" id="button" value="更新" />
　
<input type="reset" name="button2" id="button2" value="重置" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
</form>
<hr />
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsupdate);
?>
