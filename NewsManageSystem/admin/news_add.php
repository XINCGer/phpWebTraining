<?php require_once('../Connections/news.php'); ?>
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
  $insertSQL = sprintf("INSERT INTO news (news_title, news_type, news_content, news_date, news_author) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['news_title'], "text"),
                       GetSQLValueString($_POST['news_type'], "text"),
                       GetSQLValueString($_POST['news_content'], "text"),
                       GetSQLValueString($_POST['news_date'], "date"),
                       GetSQLValueString($_POST['news_author'], "text"));

  mysql_select_db($database_news, $news);
  $Result1 = mysql_query($insertSQL, $news) or die(mysql_error());

  $insertGoTo = "admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_news, $news);
$query_Recordset1 = "SELECT * FROM newstype";
$Recordset1 = mysql_query($query_Recordset1, $news) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加新闻</title>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
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
}
a:active {
	text-decoration: none;
	color: #FF0000;
}
body {
	margin-top: 0px;
}
.STYLE1 {color: #FF0000}
.STYLE2 {color: #000000}
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
<form method="POST" action="<?php echo $editFormAction; ?>" name="form1" id="form1" onSubmit="MM_validateForm('news_title','','R','news_author','','R','news_content','','R');return document.MM_returnValue">
  <table width="650" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#99CCCC">
    <tr>
      <td height="30" colspan="2">请添加新闻：</td>
    </tr>
    <tr>
      <td width="86" height="20">新闻标题：</td>
      <td width="508"><label>
        <input name="news_title" type="text" id="news_title" size="30" />
        </label>
          <span class="STYLE1">* </span></td>
    </tr>
    <tr>
      <td height="20">新闻分类：</td>
      <td><label>
        <select name="news_type" id="news_type">
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset1['type_id']?>"<?php if (!(strcmp($row_Recordset1['type_id'], $row_Recordset1['type_name']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset1['type_name']?></option>
          <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
        </select>
        </label>
          <span class="STYLE1">*&nbsp;&nbsp;作者：<span class="STYLE2"></span>
          <label>
          <input name="news_author" type="text" id="news_author" size="14" />
          </label>
          *</span></td>
    </tr>
    <tr>
      <td height="20">新闻内容：</td>
      <td>
          <span class="STYLE1">
          <label>
          <textarea name="news_content" cols="60" rows="20" id="news_content"></textarea>
          </label>
          *
          <input name="news_date" type="hidden" id="news_date" value="<?php
date_default_timezone_set('Asia/Beijing');
echo date("Y-m-d");
?>">
          </span></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="Submit" type="submit" onClick="MM_validateForm('news_title','','R','news_author','','R','news_content','','R');return document.MM_returnValue" value="添加" />
        &nbsp;&nbsp;
        <input type="reset" name="Submit2" value="重置" />
        &nbsp;&nbsp;<span class="STYLE1">*</span>带*号为必填项目</td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
