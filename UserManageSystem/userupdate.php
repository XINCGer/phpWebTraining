<?php require_once('Connections/mymember.php'); ?>
<?php 
  session_start();
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE member SET username=%s, password=%s, question=%s, answer=%s, truename=%s, sex=%s, address=%s, tel=%s, QQ=%s, email=%s WHERE ID=%s",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['question'], "text"),
                       GetSQLValueString($_POST['answer'], "text"),
                       GetSQLValueString($_POST['truename'], "text"),
                       GetSQLValueString($_POST['sex'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['tel'], "text"),
                       GetSQLValueString($_POST['QQ'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['ID'], "int"));

  mysql_select_db($database_mymember, $mymember);
  $Result1 = mysql_query($updateSQL, $mymember) or die(mysql_error());

  $updateGoTo = "userupdateok.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_upuser = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_upuser = $_SESSION['MM_Username'];
}
mysql_select_db($database_mymember, $mymember);
$query_upuser = sprintf("SELECT * FROM member WHERE username = %s", GetSQLValueString($colname_upuser, "text"));
$upuser = mysql_query($query_upuser, $mymember) or die(mysql_error());
$row_upuser = mysql_fetch_assoc($upuser);
$totalRows_upuser = mysql_num_rows($upuser);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员修改页面</title>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
body {
	margin-top: 0px;
	background-color: #CCCCCC;
}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #990000;
}
a:active {
	text-decoration: none;
	color: #CC3300;
}
.STYLE2 {color: #FF0000}
.STYLE3 {color: #000000}
.input {font-size: 10px}
.STYLE6 {font-size: 15px}
.STYLE7 {font-size: 12px}
-->
</style>
</head>

<body>


<table width="775" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><img src="images/01.gif" width="775" height="231" /></td>
  </tr>
  <tr>
    <td width="179" height="320" background="images/02_02.gif" valign="top">&nbsp;</td>
    <td width="596" height="320" bgcolor="#FEFEFE" valign="top"><form action="<?php echo $editFormAction; ?>" method="POST" name="form1" autocomplete="off">
      <table width="65%" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="STYLE6">请用户认真修改注册信息！</span> </td>
        </tr>
        <tr>
          <td width="24%">用 户 名：</td>
          <td width="76%" class="input"><label>
            <input name="username" type="text" id="username" onChange="callServer();" value="<?php echo $row_upuser['username']; ?>" />
            <input name="ID" type="hidden" id="ID" value="<?php echo $row_upuser['ID']; ?>" />
          </label></td>
        </tr>
        <tr>
          <td>密&nbsp;&nbsp;&nbsp; 码：</td>
          <td><input name="password" type="password" class="input" id="password" value="<?php echo $row_upuser['password']; ?>" /></td>
        </tr>
        <tr>
          <td>密码验证：</td>
          <td><p>
              <input name="password1" type="password" class="input" id="password1" value="<?php echo $row_upuser['password']; ?>" />
            请写密码填写一致！</p></td>
        </tr>
        <tr>
          <td>真实姓名：</td>
          <td><input name="truename" type="text" class="input" id="truename" value="<?php echo $row_upuser['truename']; ?>" /></td>
        </tr>
        <tr>
          <td>姓&nbsp;&nbsp;&nbsp; 别：</td>
          <td><label>
            <input <?php if (!(strcmp($row_upuser['sex'],"男"))) {echo "checked=\"checked\"";} ?> name="sex" type="radio" value="男" checked="checked" />
            男
            <input <?php if (!(strcmp($row_upuser['sex'],"女"))) {echo "checked=\"checked\"";} ?> type="radio" name="sex" value="女" />
            女 </label></td>
        </tr>
        <tr>
          <td>E-mail：</td>
          <td><input name="email" type="text" class="input" id="email" value="<?php echo $row_upuser['email']; ?>" /></td>
        </tr>
        <tr>
          <td>电&nbsp;&nbsp;&nbsp; 话：</td>
          <td><input name="tel" type="text" class="input" id="tel" value="<?php echo $row_upuser['tel']; ?>" /></td>
        </tr>
        <tr>
          <td>QQ：</td>
          <td><input name="QQ" type="text" class="input" id="QQ" value="<?php echo $row_upuser['QQ']; ?>" /></td>
        </tr>
        <tr>
          <td>地&nbsp;&nbsp;&nbsp; 址：</td>
          <td><input name="address" type="text" class="input" id="address" value="<?php echo $row_upuser['address']; ?>" size="40" /></td>
        </tr>
        <tr>
          <td>密码提示问题：</td>
          <td><label>
            <select name="question" id="question">
              <option value="" <?php if (!(strcmp("", $row_upuser['question']))) {echo "selected=\"selected\"";} ?>>你最好的朋友是？</option>
              <option value="" <?php if (!(strcmp("", $row_upuser['question']))) {echo "selected=\"selected\"";} ?>>你小学上学的学校名叫？</option>
<option value="" <?php if (!(strcmp("", $row_upuser['question']))) {echo "selected=\"selected\"";} ?>>你妈妈的名字是？</option>
              <option value="" <?php if (!(strcmp("", $row_upuser['question']))) {echo "selected=\"selected\"";} ?>>你的生日是那年那月</option>
              <?php
do {  
?>
              <option value="<?php echo $row_upuser['question']?>"<?php if (!(strcmp($row_upuser['question'], $row_upuser['question']))) {echo "selected=\"selected\"";} ?>><?php echo $row_upuser['question']?></option>
              <?php
} while ($row_upuser = mysql_fetch_assoc($upuser));
  $rows = mysql_num_rows($upuser);
  if($rows > 0) {
      mysql_data_seek($upuser, 0);
	  $row_upuser = mysql_fetch_assoc($upuser);
  }
?>
            </select>
          </label></td>
        </tr>
        <tr>
          <td>密码提示答案：</td>
          <td><input name="answer" type="text" class="input" id="answer" value="<?php echo $row_upuser['answer']; ?>" /></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>&nbsp;&nbsp;&nbsp;
              <input type="submit" name="Submit4" value="修改" />
              <input type="reset" name="Submit42" value="重写" />
                &nbsp;</label></td>
        </tr>
      </table>
      <input type="hidden" name="MM_update" value="form1" />
    </form>    </td>
  </tr>
  <tr>
    <td height="45" colspan="2" background="images/05.gif"><div align="center">所有</div></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($upuser);
?>
