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

// *** Redirect if username exists
$MM_flag="MM_insert";
if (isset($_POST[$MM_flag])) {
  $MM_dupKeyRedirect="regfail.php";
  $loginUsername = $_POST['username'];
  $LoginRS__query = sprintf("SELECT username FROM member WHERE username=%s", GetSQLValueString($loginUsername, "text"));
  mysql_select_db($database_mymember, $mymember);
  $LoginRS=mysql_query($LoginRS__query, $mymember) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser){
    $MM_qsChar = "?";
    //append the username to the redirect page
    if (substr_count($MM_dupKeyRedirect,"?") >=1) $MM_qsChar = "&";
    $MM_dupKeyRedirect = $MM_dupKeyRedirect . $MM_qsChar ."requsername=".$loginUsername;
    header ("Location: $MM_dupKeyRedirect");
    exit;
  }
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO member (username, password, question, answer, truename, sex, address, tel, QQ, email, authority) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
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
                       GetSQLValueString($_POST['authority'], "text"));

  mysql_select_db($database_mymember, $mymember);
  $Result1 = mysql_query($insertSQL, $mymember) or die(mysql_error());

  $insertGoTo = "regok.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员注册页面</title>
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
<script type="text/javascript">
//宣告脚本语言为JavaScript
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+'需要输入邮箱地址.\n';
//如果提交的邮箱地址表单中不是邮件格式则显示为"需要输入邮箱地址"
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+'需要输入数字.\n';
//如果提交的电话表单中不是数字则显示为"需要输入数字"
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+'需要输入数字'+min+' and '+max+'.\n';
//如果提交的QQ表单中不是数字则显示为"需要输入数字"
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is 需要输入.\n'; }
//如果提交的地址表单为空则显示为"需要输入"
    } if (errors) alert('注册时出现如下错误:\n'+errors);
//如果出错是将显示"注册时出现如下错误：
    document.MM_returnValue = (errors == '');
} }
</script>

</head>

<body>


<table width="775" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><img src="images/01.gif" width="775" height="231" /></td>
  </tr>
  <tr>
    <td width="179" height="320" background="images/02_02.gif" valign="top">&nbsp;</td>
    <td width="596" height="320" bgcolor="#FEFEFE" valign="top"><form method="POST" action="<?php echo $editFormAction; ?>" name="form1" autocomplete="off">
      <table width="65%" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="STYLE6">请用户认真填写注册信息！</span> </td>
        </tr>
        <tr>
          <td width="24%">用 户 名：</td>
          <td width="76%" class="input"><label>
            <input type="text" name="username" id="username" onChange="callServer();" />
          </label></td>
        </tr>
        <tr>
          <td>密&nbsp;&nbsp;&nbsp; 码：</td>
          <td><input name="password" type="password" class="input" id="password" /></td>
        </tr>
        <tr>
          <td>密码验证：</td>
          <td><p>
              <input name="password1" type="password" class="input" id="password1" />
              请写密码填写一致！</p></td>
        </tr>
        <tr>
          <td>真实姓名：</td>
          <td><input name="truename" type="text" class="input" id="truename" size="20" /></td>
        </tr>
        <tr>
          <td>姓&nbsp;&nbsp;&nbsp; 别：</td>
          <td><label>
            <input name="sex" type="radio" value="男" checked="checked" />
            男
            <input type="radio" name="sex" value="女" />
            女 </label></td>
        </tr>
        <tr>
          <td>E-mail：</td>
          <td><input name="email" type="text" class="input" id="email" /></td>
        </tr>
        <tr>
          <td>电&nbsp;&nbsp;&nbsp; 话：</td>
          <td><input name="tel" type="text" class="input" id="tel" /></td>
        </tr>
        <tr>
          <td>QQ：</td>
          <td><input name="QQ" type="text" class="input" id="QQ" /></td>
        </tr>
        <tr>
          <td>地&nbsp;&nbsp;&nbsp; 址：</td>
          <td><input name="address" type="text" class="input" id="address" size="40" /></td>
        </tr>
        <tr>
          <td>密码提示问题：</td>
          <td><label>
            <select name="question" id="question">
              <option>你最好的朋友是？</option>
              <option>你小学上学的学校名叫？</option>
              <option>你妈妈的名字是？</option>
              <option>你的生日是那年那月</option>
            </select>
          </label></td>
        </tr>
        <tr>
          <td>密码提示答案：</td>
          <td><input name="answer" type="text" class="input" id="answer" />
            <input name="authority" type="hidden" id="authority" value="0"></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>&nbsp;&nbsp;&nbsp;
              <input name="Submit4" type="submit" onClick="MM_validateForm('username','','R','password','','R','password1','','R','truename','','R','email','','RisEmail','tel','','RisNum','QQ','','RisNum','address','','R','answer','','R');return document.MM_returnValue" value="注册" />
              <input type="reset" name="Submit42" value="重写" />
                &nbsp;</label></td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="form1">
    </form>    </td>
  </tr>
  <tr>
    <td height="45" colspan="2" background="images/05.gif"><div align="center">所有</div></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>

