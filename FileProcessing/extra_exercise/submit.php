<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ע���</title>
<style type="text/css">
<!--
table {
	border: 1px solid #333333;
}
th,td {
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: solid;
	border-left-style: none;
	border-top-color: #CCCCCC;
	border-right-color: #CCCCCC;
	border-bottom-color: #CCCCCC;
	border-left-color: #CCCCCC;
	font-size: 12px;
	color: #333333;
	font-weight: normal;
	padding-top: 5px;
	padding-bottom: 5px;
	padding-left: 20px;
}
input {
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	border-top-color: #333333;
	border-right-color: #999999;
	border-bottom-color: #999999;
	border-left-color: #333333;
}
-->
</style>
</head>

<body>
	<form action="" method="post" enctype="multipart/form-data" name="form1">
		<h1>ע��</h1>
		<table width="600" align="center" cellpadding="0" cellspacing="0" summary="ע��">
				<tr>
					<th width="185"><div align="left">������Ϣ ( * Ϊ������)</div></th>
					<td width="410">&nbsp;</td>
				</tr>
		<tr>
		  <th><div align="left">
            <label for="username">�û��� *</label>
	      </div></th>
			<td>
				<input type="text" id="username" name="username" size="25" maxlength="15" value="<?php echo $_POST['username']; ?>" />
		  </td>
		</tr>
		<tr>
			<th><div align="left">
	          <label for="password">����  *</label>
              </td>
            </div>
		  <td>
				<input type="password" name="password" size="25" id="password" />
		  </td>
		</tr>

		<tr>
		  <th><div align="left">
            <label for="password2">ȷ������ *</label>
	      </div></th>
			<td>
				<input type="password" name="password2" size="25" id="password2" />
		  </td>
		</tr>

		<tr>
			<th><div align="left">
	          <label for="email">Email *</label>
              </td>
            </div>
		  <td>
				<input type="text" name="email" size="25" id="email" value="<?php echo $_POST['email']; ?>" />
		  </td>
		</tr>
			<tr>
				<th><div align="left">��չ��Ϣ</div></th>
				<td>&nbsp;</td>
			</tr>
		<tr>
		  <th><div align="left">
            <label for="questionid">��ȫ����</label>
	      </div></th>
			<td>
				<select id="questionid" name="questionid">
					<option value="0" <?php if($_POST['questionid']=='0')echo 'selected="selected"'; ?>>�ް�ȫ����</option>
					<option value="1" <?php if($_POST['questionid']=='1')echo 'selected="selected"'; ?>>ĸ�׵�����</option>
					<option value="2" <?php if($_POST['questionid']=='2')echo 'selected="selected"'; ?>>үү������</option>
					<option value="3" <?php if($_POST['questionid']=='3')echo 'selected="selected"'; ?>>���׳����ĳ���</option>
					<option value="4" <?php if($_POST['questionid']=='4')echo 'selected="selected"'; ?>>������һλ��ʦ������</option>
					<option value="5" <?php if($_POST['questionid']=='5')echo 'selected="selected"'; ?>>�����˼�������ͺ�</option>
					<option value="6" <?php if($_POST['questionid']=='6')echo 'selected="selected"'; ?>>����ϲ���Ĳ͹�����</option>
					<option value="7" <?php if($_POST['questionid']=='7')echo 'selected="selected"'; ?>>��ʻִ�յ������λ����</option>
				</select></td>
		</tr>

		<tr>
		  <th><div align="left">
            <label for="answer">�ش�</label>
	      </div></th>
		  <td><input type="text" id="answer" name="answer" size="25" value="<?php echo $_POST['answer']; ?>" /></td>
		</tr>
		<tr>
			<th><div align="left">�Ա�</div></th>
			<td>
				<label><input type="radio" name="gender" value="1" <?php if($_POST['gender']=='1')echo 'checked="checked"'; ?> /> ��</label>
				<label><input type="radio" name="gender" value="2" <?php if($_POST['gender']=='2')echo 'checked="checked"'; ?> /> Ů</label>
				<label><input type="radio" name="gender" value="0" <?php if($_POST['gender']=='0')echo 'checked="checked"'; ?>> ����</label>
		  </td>
		</tr>

		<tr>
		  <th><div align="left">
            <label for="bday">����</label>
	      </div></th>
		  <td>
		  <?php 
			// ������������˵�
			echo '<select name="year">';
			$year = 1970;
			while ($year <= 2000) {
				echo "<option value=\"$year\" ";
				if($_POST['year'] == $year) echo 'selected="selected" ';
				echo ">$year</option>\n";
				$year++;
			}
			echo '</select>�� ';
			
			// �����·������˵�
			echo '<select name="month">';
			$month = 1;
			do{
				echo "<option value=\"$month\" ";
				if($_POST['month'] == $month) echo 'selected="selected" ';
				echo ">$month</option>\n";
				$month++;
			}while($month <= 12); 
			echo '</select>�� ';
			
			// �������������˵�
			echo '<select name="day">';
			for ($day = 1; $day <= 31; $day++) {
				echo "<option value=\"$day\" ";
				if($_POST['day'] == $day) echo 'selected="selected" ';
				echo ">$day</option>\n";
			}
			echo '</select>�� ';
			
			?>
		  </td>
		</tr>

		<tr>
		  <th><div align="left">
            <label for="loactionnew">����</label>
	      </div></th>
		  <td><input type="text" id="loaction" name="location" size="25" value="<?php echo $_POST['location']; ?>" /></td>
		</tr>

		<tr>
		  <th><div align="left">
            <label for="site">������վ</label>
	      </div></th>
		  <td><input type="text" id="site" name="site" size="25" value="<?php echo $_POST['site']; ?>"  /></td>
		</tr>

		<tr>
		  <th><div align="left">
            <label for="qq">QQ</label>
	      </div></th>
		  <td><input type="text" id="qq" name="qq" size="25" value="<?php echo $_POST['qq']; ?>" /></td>
		</tr>
		
		<tr>
		  <th><div align="left">
            <label for="msn">MSN</label>
	      </div></th>
			<td>
				<input type="text" name="msn" size="25"  value="<?php echo $_POST['msn']; ?>"/>
		  </td>
		</tr>
		<tr>
		  <th><div align="left">
            <label for="msn">����</label>
	      </div></th>
		  <td>
		    <input type="checkbox" name="interests[]" value="����"  <?php if(isset($_POST['interests'])){if(in_array("����",$_POST['interests'])) echo 'checked="checked"'; }?> />���� 
			<input type="checkbox" name="interests[]" value="��Ӱ"  <?php if(isset($_POST['interests'])){if(in_array("��Ӱ",$_POST['interests'])) echo 'checked="checked"'; }?> />��Ӱ 
			<input type="checkbox" name="interests[]" value="����"  <?php if(isset($_POST['interests'])){if(in_array("����",$_POST['interests'])) echo 'checked="checked"'; }?> />���� 
			<input type="checkbox" name="interests[]" value="�˶�"  <?php if(isset($_POST['interests'])){if(in_array("�˶�",$_POST['interests'])) echo 'checked="checked"'; }?> />�˶� 
			<input type="checkbox" name="interests[]" value="����"  <?php if(isset($_POST['interests'])){if(in_array("����",$_POST['interests'])) echo 'checked="checked"'; }?> />����
		</td>
		</tr>
		<tr>
			<th valign="top"><div align="left">
	          <label for="bio">ͷ��</label>
              </td>
            </div>
		  <td><input name="upload" type="file" /><input type="hidden" name="MAX_FILE_SIZE" value="524288" /></td>
		</tr>
		<tr>
			<th valign="top"><div align="left">
	          <label for="bio">���ҽ���</label>
              </td>
            </div>
		  <td><textarea rows="5" cols="30" id="bio" name="bio"><?php echo stripslashes($_POST['bio']); ?></textarea></td>
		</tr>
		<tr>
			<th>&nbsp;</th>
		  <td><input name="submit" type="submit" value="ע��" />
	      &nbsp;&nbsp;
	      <input name="reset" type="reset" value="����" /></td>
		</tr>
	  </table>
</form>
<?php # Script 6-7 �Chandle_regist.php
 	if($_POST['submit']){
		if(empty($_POST['username'])){
			echo "�û�������Ϊ�ա�";
			exit;
		}
		if (empty($_POST['password'])) {
			echo "���벻��Ϊ�ա�";
			exit;
		}
		if (empty($_POST['password2'])) {
			echo "ȷ�����벻��Ϊ�ա�";
			exit;
		}
		if (empty($_POST['email'])) {
			echo "Email����Ϊ�ա�";
			exit;
		}
		if ($_POST['password']!==$_POST['password2']) {
			echo "������ȷ�����벻ͬ�����������롣";
			exit;
		}
		if (!ereg("^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]{2,6})+",$_POST['email'])){
			echo "Email��ʽ����ȷ��";
			exit;
		} 
		if(!empty($_POST['site'])){
			if(!eregi("^((http|https|ftp)://)?([[:alnum:]\-\.])+(\.)([[:alnum:]]){2,6}([[:alnum:]/+=%&_\.~?\-]*)$",$_POST['site'])){
				echo "��ҳ��ʽ����ȷ��";
				exit;
		}}
		if (isset($_FILES['upload'])) {
	if($_FILES['upload']['error'] == 2){
		echo '<p><font color="red">���ϴ�һ��С��512K��ͼƬ��</font></p>';
		exit;
	}else{
		$allowed = array ('image/jpg','image/jpeg','image/png','image/pjpeg','image/gif','image/x-png');
		if (in_array($_FILES['upload']['type'], $allowed)) {
			if (move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/{$_FILES['upload']['name']}")) {
				$src="uploads/{$_FILES['upload']['name']}";
			} else { 
				echo '<p><font color="red">�ļ��ϴ�����: </b>';
				switch ($_FILES['upload']['error']) {
					case 1:
						echo '����ļ�����php.ini���趨��upload_max_filesizeָ����С��';
						break;
					case 2:
						echo '����ļ����������趨��MAX_FILE_SIZE��ָ����С��';
						break;
					case 3:
						echo '�ļ����������ϴ���';
						break;
					case 4:
						echo '�ļ�δ���ϴ���';
						break;
					case 6:
						echo 'û�п��õ���ʱ�ļ��С�';
						break;
					default:
						echo 'ϵͳ����';
						break;
				} 
				echo '</b></font></p>';
				exit;
			} 
	 	} else { 
			echo '<p><font color="red">��ѡ��ͼƬ��ʽ�ļ��ϴ���</font></p>';
			unlink ($_FILES['upload']['tmp_name']); 
			exit;
		} 
	} 
}

?>
		<h1>����������ϢΪ��</h1>
		<table width="600" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<th width="185"><div align="left">������Ϣ ( * Ϊ������)</div></th>
					<td width="410">&nbsp;</td>
				</tr>
		<tr>
		  <th><div align="left">
            <label for="username">�û��� *</label>
	      </div></th>
			<td>
				<?php echo $_POST['username']; ?>
		  </td>
		</tr>
		<tr>
			<th><div align="left">
	          <label for="password">����  *</label>
              </td>
            </div>
		  <td>
				<?php echo $_POST['password']; ?>
		  </td>
		</tr>

		<tr>
			<th><div align="left">
	          <label for="email">Email *</label>
              </td>
            </div>
		  <td>
				<?php echo $_POST['email']; ?>
		  </td>
		</tr>
			<tr>
				<th><div align="left">��չ��Ϣ</div></th>
				<td>&nbsp;</td>
			</tr>
		<tr>
		  <th><div align="left">
            <label for="questionid">��ȫ����</label>
	      </div></th>
			<td>
			<?php switch($_POST['questionid']){
			case 1:
				echo "ĸ�׵�����";
				break;
			case 2:
				echo "үү������";
				break;
			case 3:
				echo "���׳����ĳ���";
				break;
			case 4:
				echo "������һλ��ʦ������";
				break;
			case 5:
				echo "�����˼�������ͺ�";
				break;
			case 6:
				echo "����ϲ���Ĳ͹�����";
				break;
			case 7:
				echo "��ʻִ�յ������λ����";
				break;	
			default:
				echo "�ް�ȫ����";
				break;
		}?>
			</td>
		</tr>

		<tr>
		  <th><div align="left">
            <label for="answer">�ش�</label>
	      </div></th>
		  <td><?php echo $_POST['answer']; ?>&nbsp;</td>
		</tr>
		<tr>
			<th><div align="left">�Ա�</div></th>
			<td>
				<?php 
	  		switch ($_POST['gender']){
	  		case 1:
	  			echo "��";
	  			break;
	  		case 2:
	  			echo "Ů";
	  			break;
	  		case 0:
	  			echo "����";
	  			break;
	  	}
	  ?> </td>
		</tr>

		<tr>
		  <th><div align="left">
            <label for="bday">����</label>
	      </div></th>
		  <td>
		   <?php
			echo $_POST['year'] . '��' . $_POST['month'] . '��' . $_POST['day'] . '��';	
		   ?>
		  </td>
		</tr>

		<tr>
		  <th><div align="left">
            <label for="loactionnew">����</label>
	      </div></th>
		  <td><?php echo $_POST['location']; ?></td>
		</tr>

		<tr>
		  <th><div align="left">
            <label for="site">������վ</label>
	      </div></th>
		  <td><?php echo $_POST['site']; ?>"</td>
		</tr>

		<tr>
		  <th><div align="left">
            <label for="qq">QQ</label>
	      </div></th>
		  <td><?php echo $_POST['qq']; ?></td>
		</tr>
		
		<tr>
		  <th><div align="left">
            <label for="msn">MSN</label>
	      </div></th>
			<td><?php echo $_POST['msn']; ?>
		  </td>
		</tr>
		<tr>
		  <th><div align="left">
            <label for="msn">����</label>
	      </div></th>
		  <td>
		  <?php 
			foreach($interests as $value){
				echo $value;
				echo "&nbsp;&nbsp;"; 
			}
		?>

		</td>
		</tr>
		<tr>
		  <th><div align="left">
            <label for="msn">ͷ��</label>
	      </div></th>
			<td><img src="<?php echo $src; ?>" />
		  </td>
		</tr>
		<tr>
			<th valign="top"><div align="left">
	          <label for="bio">���ҽ���</label>
              </td>
            </div>
		  <td><?php 
		  $more = stripslashes($_POST['bio']);
		  $more = htmlspecialchars($more);
		  $more = str_replace(" ","&nbsp;",$more); 
		  echo nl2br($more); 
	?></td>
		</tr>
	  </table>
<?php
 } 
?>
</body>
</html>
