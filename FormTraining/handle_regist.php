<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>ע���</title>
<style type="text/css">
<!--
.style5 {font-family: Tahoma; font-size: 12px; font-weight: bold; }
-->
</style>
</head>

<body>
<p align="center">�û�ע��<br />*�ű�־����</p>
<form name="form1" method="post" action="">
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">���û���*</span></td>
      <td>��
        <input name="name" type="text" /></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">������*</span></td>
      <td>��
        <input name="pass1" type="password" /></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">��ȷ������*</span></td>
      <td>��
        <input name="pass2" type="password" /></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">��Email��ַ*</span></td>
      <td>��
        <input name="email" type="text" /></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">���Ա�</span></td>
      <td><span class="style5">        ��
            <input type="radio" name="gender" value="1" />�С�
			<input type="radio" name="gender" value="2" />Ů��
        <input name="gender" type="radio" value="3" checked="checked" />
        ����</span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">����������</span></td>
      <td>��
        <input name="birthday" type="text" />
        <span class="style5">        //��ʽ1900-01-01</span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">������</span></td>
      <td><span class="style5">
        ��
            <input name="interests[]" type="checkbox" value="��Ӱ" checked="checked" />
            ��Ӱ��
            <input name="interests[]" type="checkbox" value="����" />
            ���֡�  
            <input name="interests[]" type="checkbox" value="�˶�" />
            �˶���
            <input name="interests[]" type="checkbox" value="����" />
            ���顡
            <input name="interests[]" type="checkbox" value="����" />
            ����</span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">����ҳ</span></td>
      <td>��
        <input name="web" type="text" value="http://" /></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">�����˼��</span></td>
      <td><span class="style5">
        ��
            <textarea name="more" cols="30" rows="5"></textarea>
      </span></td>
    </tr>
    <tr align="center" valign="middle" bgcolor="#FFFFFF">
      <td colspan="2"><input type="submit" name="Submit" value="�ύ" />
      ����
        <input type="reset" name="reset" value="����" /></td>
    </tr>
  </table>
</form>
<?php # Script 6-7 �Chandle_regist.php
 	if($_POST['Submit']){
		if(empty($_POST['name'])){
			echo "�û�������Ϊ�ա�";
			exit;
		}
		if (empty($_POST['pass1'])) {
			echo "���벻��Ϊ�ա�";
			exit;
		}
		if (empty($_POST['pass2'])) {
			echo "ȷ�����벻��Ϊ�ա�";
			exit;
		}
		if (empty($_POST['email'])) {
			echo "Email����Ϊ�ա�";
			exit;
		}
		if ($_POST['pass1']!==$_POST['pass2']) {
			echo "������ȷ�����벻ͬ�����������롣";
			exit;
		}
		if (!ereg("^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]{2,6})+",$_POST['email'])){
			echo "Email��ʽ����ȷ��";
			exit;
		} 
		$output = strtotime($_POST['birthday']);
		if($output === false){
			echo "���ڸ�ʽ����ȷ";
			exit;
		}
		if(!eregi("^((http|https|ftp)://)?([[:alnum:]\-\.])+(\.)([[:alnum:]]){2,6}([[:alnum:]/+=%&_\.~?\-]*)$",$_POST['web'])){
			echo "��ҳ��ʽ����ȷ��";
			exit;
		}
?>
<p align="center">��������Ϊ��</p>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">���û���</span></td>
      <td><span class="style5"><?php echo $_POST['name'];?></span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">������</span></td>
      <td><span class="style5"><?php echo $_POST['pass1'];?></span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">��Email��ַ</span></td>
      <td><span class="style5"><?php echo $_POST['email'];?></span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">���Ա�</span></td>
      <td><span class="style5">
	  <?php 
	  	switch ($_POST['gender']){
	  		case 1:
	  			echo "��";
	  			break;
	  		case 2:
	  			echo "Ů";
	  			break;
	  		case 3:
	  			echo "����";
	  			break;
	  	}
	  ?>
	  </span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">����������</span></td>
      <td><span class="style5">
	   <?php
	   		echo date('Y��m��d��',$output);
	    ?>
	 </span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">������</span></td>
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
      <td width="100" height="30" valign="middle"><span class="style5">����ҳ</span></td>
      <td><span class="style5"><a href=<?php echo $_POST['web'];?>><?php echo $_POST['web'];?></a></span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="100" height="30" valign="middle"><span class="style5">�����˼��</span></td>
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
