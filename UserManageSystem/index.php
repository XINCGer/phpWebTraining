<?php require_once('Connections/mymember.php'); ?>
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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "welcome.php";
  $MM_redirectLoginFailed = "loginfail.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_mymember, $mymember);
  
  $LoginRS__query=sprintf("SELECT username, password FROM member WHERE username=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $mymember) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP用户管理系统</title>
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
-->
</style>
</head>

<body>
<table width="775" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><img src="images/01.gif" width="775" height="231" /></td>
  </tr>
  <tr>
    <td width="179" height="456" background="images/02.gif" valign="top"><form ACTION="<?php echo $loginFormAction; ?>" id="form1" name="form1" method="POST">
      <table width="400%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="40%" height="35">&nbsp;</td>
          <td width="60%">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;&nbsp; 用户名
            <input name="username" type="text" id="username" size="12" /></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp; &nbsp;密&nbsp; 码
            <input name="password" type="password" id="password" size="12" /></td>
        </tr>
        <tr>
          <td height="22" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="Submit" value="登录" />
            <input type="reset" name="Submit2" value="重置" /></td>
        </tr>
        <tr>
          <td height="22" colspan="2">&nbsp;&nbsp;&nbsp; <a href="register.php">注册新用户</a>&nbsp;&nbsp;<a href="lostpassword.php">找回密码</a></td>
        </tr>
      </table>
    </form></td>
    <td><img src="images/03.gif" width="423" height="456" /></td>
    <td width="173" height="456"><img src="images/04.gif" width="173" height="456" /></td>
  </tr>
  <tr>
    <td height="45" colspan="3" background="images/05.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
</table>
</body>
</html>