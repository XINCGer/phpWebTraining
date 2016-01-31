<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "logout.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
		session_start();  
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎界面</title>
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
</style></head>

<body>
<table width="775" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><img src="images/01.gif" width="775" height="231" /></td>
  </tr>
  <tr>
    <td width="179" height="456" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="137" background="images/未标题-1_02_01.gif" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="33">&nbsp;&nbsp;&nbsp; 登录成功！ </td>
            </tr>
            <tr>
              <td height="30">&nbsp;&nbsp;&nbsp; 欢迎你：<?php echo $_SESSION["MM_Username"]; ?></td>
            </tr>
            <tr>
              <td height="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="userupdate.php">修改你的资料</a></td>
            </tr>
            <tr>
              <td height="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo $logoutAction ?>">注销你的用户</a></td>
            </tr>
            <tr>
              <td height="25">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td><img src="images/02_02.gif" width="179" height="319" /></td>
      </tr>
    </table></td>
    <td><img src="images/03.gif" width="423" height="456" /></td>
    <td width="173" height="456" background="images/04.gif">&nbsp;</td>
  </tr>
  <tr>
    <td height="45" colspan="3" background="images/05.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
