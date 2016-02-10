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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO gbook (subject, content, `date`, IP, passid) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['subject'], "text"),
                       GetSQLValueString($_POST['content'], "text"),
                       GetSQLValueString($_POST['date'], "date"),
                       GetSQLValueString($_POST['IP'], "text"),
                       GetSQLValueString($_POST['passid'], "text"));

  mysql_select_db($database_gbook, $gbook);
  $Result1 = mysql_query($insertSQL, $gbook) or die(mysql_error());

  $insertGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
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
.STYLE6 {	font-size: 16px;
	color: #FF0000;
	font-family: "黑体";
}
-->
</style>
<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
</head>
<body>
<table width="749" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><img src="images/logo.jpg" width="750" height="120" border="0" usemap="#Map2" /></td>
  </tr>
  
  <tr>
    <td width="195"><table width="98%" border="0" cellspacing="0" cellpadding="0">
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
                <input type="submit" name="Submit2" value="提交" />
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
    <td width="555" bgcolor="#FEFEFE" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp; 你的位置---留言&nbsp;&nbsp;    &nbsp;    &nbsp;      &nbsp;    &nbsp;    &nbsp;  &nbsp;&nbsp;&nbsp; 现在时间是：
          <?php
date_default_timezone_set('Asia/Shanghai');
echo date("Y-m-d h:i:s");
?></td>
      </tr>
      <tr>
        <td height="40">&nbsp; &nbsp; <img src="images/14384-m.jpg" width="23" height="22" /><span class="STYLE6">留言簿</span></td>
      </tr>
      
      
      <tr>
        <td><form method="POST" action="<?php echo $editFormAction; ?>" name="form1" id="form1" onSubmit="MM_validateForm('subject','','R','content','','R');return document.MM_returnValue">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            
            <tr>
              <td><table width="90%" align="center" cellpadding="0" cellspacing="0" rules="rows">
                <tr>
                  <td height="25" colspan="2"><p>感谢您的访问，请留下您宝贵的意见！</p></td>
                </tr>
                <tr>
                  <td width="103" height="30">留言主题：</td>
                  <td width="397"><input name="subject" type="text" id="subject" size="30" maxlength="50" />
                      <span class="STYLE4">*</span>最多为50个字符
                      <input name="date" type="hidden" id="date" value="<?php
date_default_timezone_set('Asia/Shanghai');
echo date("Y-m-d h:i:s");
?>"></td>
                </tr>
                <tr>
                  <td height="20" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    
                    <tr>
                      <td height="20">留言内容</td>
                    </tr>
                  </table>                    
                    <p>&nbsp;</p></td>
                  <td><textarea name="content" cols="40" rows="10" id="content"></textarea>
                      <span class="STYLE4"> *</span></td>
                </tr>
                <tr>
                  <td colspan="2"><label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input name="Submit" type="submit" id="Submit" onClick="MM_validateForm('subject','','R','content','','R');return document.MM_returnValue" value="提交" />
                    </label>
                      <input name="Submit1" type="reset" id="Submit1" value="重置" />
                      带
                    <span class="STYLE4">*</span>号为必填字段
                    <input name="IP" type="hidden" id="IP" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" />
                    <input name="passid" type="hidden" id="passid" value="0" /></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <input type="hidden" name="MM_insert" value="form1">
        </form>        </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="50" colspan="2" bgcolor="#55C2EB"><div align="center" class="STYLE1">Copyright@2011-2012 hbculture.com Inc.All rights reserved.   环博文化 版权所有</div></td>
  </tr>
</table>
<p class="STYLE2">&nbsp;</p>

<map name="Map" id="Map"><area shape="rect" coords="284,13,371,32" href="book.php" />
</map>
<map name="Map2" id="Map2">
  <area shape="rect" coords="553,95,604,116" href="index.php" />
</map></body>
</html>

