<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>注册表单</title>
<style type="text/css">
<!--
.style5 {font-family: Tahoma; font-size: 12px; font-weight: bold; }
-->
</style>
</head>

<body>
<p align="center">用户注册<br />*号标志必填</p>
<form name="form1" method="post" action="">
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">　用户名*</span></td>
      <td>　
        <input name="name" type="text" /></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">　密码*</span></td>
      <td>　
        <input name="pass1" type="password" /></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">　确认密码*</span></td>
      <td>　
        <input name="pass2" type="password" /></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">　Email地址*</span></td>
      <td>　
        <input name="email" type="text" /></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">　性别</span></td>
      <td><span class="style5">        　
            <input type="radio" name="gender" value="1" />男　
			<input type="radio" name="gender" value="2" />女　
        <input name="gender" type="radio" value="3" checked="checked" />
        保密</span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">　出生日期</span></td>
      <td>　
        <input name="birthday" type="text" />
        <span class="style5">        //格式1900-01-01</span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">　爱好</span></td>
      <td><span class="style5">
        　
            <input name="interests[]" type="checkbox" value="电影" checked="checked" />
            电影　
            <input name="interests[]" type="checkbox" value="音乐" />
            音乐　  
            <input name="interests[]" type="checkbox" value="运动" />
            运动　
            <input name="interests[]" type="checkbox" value="看书" />
            看书　
            <input name="interests[]" type="checkbox" value="其它" />
            其它</span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">　主页</span></td>
      <td>　
        <input name="web" type="text" value="http://" /></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">　个人简介</span></td>
      <td><span class="style5">
        　
            <textarea name="more" cols="30" rows="5"></textarea>
      </span></td>
    </tr>
    <tr align="center" valign="middle" bgcolor="#FFFFFF">
      <td colspan="2"><input type="submit" name="Submit" value="提交" />
      　　
        <input type="reset" name="reset" value="重置" /></td>
    </tr>
  </table>
</form>
<?php # Script 6-7 –handle_regist.php
 	if($_POST['Submit']){
		if(empty($_POST['name'])){
			echo "用户名不能为空。";
			exit;
		}
		if (empty($_POST['pass1'])) {
			echo "密码不能为空。";
			exit;
		}
		if (empty($_POST['pass2'])) {
			echo "确认密码不能为空。";
			exit;
		}
		if (empty($_POST['email'])) {
			echo "Email不能为空。";
			exit;
		}
		if ($_POST['pass1']!==$_POST['pass2']) {
			echo "密码与确认密码不同，请重新输入。";
			exit;
		}
		if (!ereg("^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]{2,6})+",$_POST['email'])){
			echo "Email格式不正确。";
			exit;
		} 
		$output = strtotime($_POST['birthday']);
		if($output === false){
			echo "日期格式不正确";
			exit;
		}
		if(!eregi("^((http|https|ftp)://)?([[:alnum:]\-\.])+(\.)([[:alnum:]]){2,6}([[:alnum:]/+=%&_\.~?\-]*)$",$_POST['web'])){
			echo "主页格式不正确。";
			exit;
		}
?>
<p align="center">您的输入为：</p>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">　用户名</span></td>
      <td><span class="style5"><?php echo $_POST['name'];?></span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">　密码</span></td>
      <td><span class="style5"><?php echo $_POST['pass1'];?></span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">　Email地址</span></td>
      <td><span class="style5"><?php echo $_POST['email'];?></span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">　性别</span></td>
      <td><span class="style5">
	  <?php 
	  	switch ($_POST['gender']){
	  		case 1:
	  			echo "男";
	  			break;
	  		case 2:
	  			echo "女";
	  			break;
	  		case 3:
	  			echo "保密";
	  			break;
	  	}
	  ?>
	  </span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">　出生日期</span></td>
      <td><span class="style5">
	   <?php
	   		echo date('Y年m月d日',$output);
	    ?>
	 </span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">　爱好</span></td>
      <td><span class="style5">
	  	<?php 
			foreach($interests as $value){
				echo $value;
				echo "&nbsp;&nbsp;"; 
			}
		?>
	  </span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">　主页</span></td>
      <td><span class="style5"><a href=<?php echo $_POST['web'];?>><?php echo $_POST['web'];?></a></span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">　个人简介</span></td>
      <td><span class="style5">
	  <?php 
		  $more = stripslashes($_POST['more']);
		  $more = htmlspecialchars($more);
		  $more = str_replace(" ","&nbsp;",$more); 
		  echo nl2br($more); 
	?></span></td>
    </tr>
  </table>
<?php
 } 
?>
</body>
</html>
