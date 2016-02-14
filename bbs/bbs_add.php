<?php require_once('Connections/bbs.php'); ?> 
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
  $insertSQL = sprintf("INSERT INTO bbs_main (bbs_title, bbs_content, bbs_name, bbs_time, bbs_face, bbs_sex, bbs_email, bbs_url, bbs_hits) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['bbs_title'], "text"),
                       GetSQLValueString($_POST['bbs_content'], "text"),
                       GetSQLValueString($_POST['bbs_name'], "text"),
                       GetSQLValueString($_POST['bbs_time'], "text"),
                       GetSQLValueString($_POST['bbs_face'], "text"),
                       GetSQLValueString($_POST['bbs_sex'], "text"),
                       GetSQLValueString($_POST['bbs_email'], "text"),
                       GetSQLValueString($_POST['bbs_url'], "text"),
                       GetSQLValueString($_POST['bbs_hits'], "int"));

  mysql_select_db($database_bbs, $bbs);
  $Result1 = mysql_query($insertSQL, $bbs) or die(mysql_error());

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
<title>新增讨论主题</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
body,td,th {
	font-family: Times New Roman, Times, serif;
	font-size: 12px;
}
.style18 {color: #FFFF00}
.style25 {font-size: 18px; font-weight: bold;}
a:link {
	text-decoration: none;
	color: #000000;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #FF0000;
}
a:active {
	text-decoration: none;
	color: #FF0000;
}
.STYLE29 {font-size: 14px}
.STYLE28 {font-size: 13px;
	color: #FFFFFF;
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

<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="764"><img src="images/1副本.gif" width="764" height="179" /></td>
  </tr>
  
  <tr>
    <td><table width="764" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#FFFFFF"><form method="POST" action="<?php echo $editFormAction; ?>" name="form1" id="form1" onSubmit="MM_validateForm('bbs_title','','R','bbs_name','','R','bbs_email','','RisEmail','bbs_url','','R','bbs_content','','R');return document.MM_returnValue">
          <table width="668" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#66CCFF">
            <tr>
              <td width="12%"><div align="right">新主题：</div></td>
              <td width="88%"><label>
                <input name="bbs_title" type="text" id="bbs_title" size="40" />
              </label></td>
            </tr>
            <tr>
              <td><div align="right">发表人：</div></td>
              <td><input name="bbs_name" type="text" id="bbs_name" size="20" maxlength="10" /></td>
            </tr>
            <tr>
              <td valign="top"> <div align="right">性别形象：</div></td>
              <td><label>
                <input name="bbs_sex" type="radio" value="images/1.gif" checked="checked" />
                <img src="images/1.gif" width="60" height="100" />
                <input type="radio" name="bbs_sex" value="images/2.gif" />
                <img src="images/2.gif" width="60" height="100" />
                <input type="radio" name="bbs_sex" value="images/3.gif" />
                <img src="images/3.gif" width="60" height="100" />
                <input type="radio" name="bbs_sex" value="images/4.gif" />
                <img src="images/4.gif" width="60" height="100" />
                <input type="radio" name="bbs_sex" value="images/5.gif" />
                <img src="images/5.gif" width="60" height="100" />
                <input type="radio" name="bbs_sex" value="/images/6.gif" />
                <img src="images/6.gif" width="60" height="100" /> </label></td>
            </tr>
            <tr>
              <td><div align="right">心情： </div></td>
              <td><input name="bbs_face" type="radio" value="images/p1.gif" checked="checked" />
                  <img src="images/p1.gif" width="22" height="22" />
                  <input name="bbs_face" type="radio" value="images/p2.gif" />
                  <img src="images/p2.gif" width="19" height="19" />
                  <input type="radio" name="bbs_face" value="images/p3.gif" />
                  <img src="images/p3.gif" width="19" height="19" />
                  <input type="radio" name="bbs_face" value="images/p4.gif" />
                  <img src="images/p4.gif" width="22" height="22" />
                  <input type="radio" name="bbs_face" value="images/p5.gif" />
                  <img src="images/p5.gif" width="19" height="19" />
                  <input type="radio" name="bbs_face" value="images/p6.gif" />
                  <img src="images/p6.gif" width="19" height="19" /></td>
            </tr>
            <tr>
              <td> <div align="right">电子邮件：</div></td>
              <td><input name="bbs_email" type="text" id="bbs_email" size="30" maxlength="20" /></td>
            </tr>
            <tr>
              <td><div align="right">个人主页：</div></td>
              <td><input name="bbs_url" type="text" id="bbs_url" size="30" maxlength="30" /></td>
            </tr>
            <tr>
              <td valign="top"> <div align="right">主题内容： </div></td>
              <td><label>
                <textarea name="bbs_content" cols="45" rows="8" id="bbs_content"></textarea>
                <input type="hidden" name="bbs_time" id="bbs_time" value="<?php
date_default_timezone_set('Asia/Shanghai');
echo date("Y-m-d");
?>
">
                <input name="bbs_hits" type="hidden" id="bbs_hits" value="0">
              </label></td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;   &nbsp;
                  <label>
                  <input name="Submit" type="submit" onClick="MM_validateForm('bbs_title','','R','bbs_name','','R','bbs_email','','RisEmail','bbs_url','','R','bbs_content','','R');return document.MM_returnValue" value="确定提交" />
                    &nbsp;
                    <input type="reset" name="Submit2" value="重新填写" />
                </label></td>
            </tr>
          </table>
          <input type="hidden" name="MM_insert" value="form1">
        </form>        </td>
      </tr>
      <tr>
        <td height="40" bgcolor="#4DAFFE"><p><span class="STYLE28">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="STYLE28"> Copyright @ 2012 www.hbculture.com Inc.All rights reserved. PHP论坛管理系统 </span></p>          </td>
      </tr>
      
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>