<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>注册表单</title>
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
		<h1>注册</h1>
		<table width="600" align="center" cellpadding="0" cellspacing="0" summary="注册">
				<tr>
					<th width="185"><div align="left">基本信息 ( * 为必填项)</div></th>
					<td width="410">&nbsp;</td>
				</tr>
		<tr>
		  <th><div align="left">
            <label for="username">用户名 *</label>
	      </div></th>
			<td>
				<input type="text" id="username" name="username" size="25" maxlength="15" value="<?php echo $_POST['username']; ?>" />
		  </td>
		</tr>
		<tr>
			<th><div align="left">
	          <label for="password">密码  *</label>
              </td>
            </div>
		  <td>
				<input type="password" name="password" size="25" id="password" />
		  </td>
		</tr>

		<tr>
		  <th><div align="left">
            <label for="password2">确认密码 *</label>
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
				<th><div align="left">扩展信息</div></th>
				<td>&nbsp;</td>
			</tr>
		<tr>
		  <th><div align="left">
            <label for="questionid">安全提问</label>
	      </div></th>
			<td>
				<select id="questionid" name="questionid">
					<option value="0" <?php if($_POST['questionid']=='0')echo 'selected="selected"'; ?>>无安全提问</option>
					<option value="1" <?php if($_POST['questionid']=='1')echo 'selected="selected"'; ?>>母亲的名字</option>
					<option value="2" <?php if($_POST['questionid']=='2')echo 'selected="selected"'; ?>>爷爷的名字</option>
					<option value="3" <?php if($_POST['questionid']=='3')echo 'selected="selected"'; ?>>父亲出生的城市</option>
					<option value="4" <?php if($_POST['questionid']=='4')echo 'selected="selected"'; ?>>您其中一位老师的名字</option>
					<option value="5" <?php if($_POST['questionid']=='5')echo 'selected="selected"'; ?>>您个人计算机的型号</option>
					<option value="6" <?php if($_POST['questionid']=='6')echo 'selected="selected"'; ?>>您最喜欢的餐馆名称</option>
					<option value="7" <?php if($_POST['questionid']=='7')echo 'selected="selected"'; ?>>驾驶执照的最后四位数字</option>
				</select></td>
		</tr>

		<tr>
		  <th><div align="left">
            <label for="answer">回答</label>
	      </div></th>
		  <td><input type="text" id="answer" name="answer" size="25" value="<?php echo $_POST['answer']; ?>" /></td>
		</tr>
		<tr>
			<th><div align="left">性别</div></th>
			<td>
				<label><input type="radio" name="gender" value="1" <?php if($_POST['gender']=='1')echo 'checked="checked"'; ?> /> 男</label>
				<label><input type="radio" name="gender" value="2" <?php if($_POST['gender']=='2')echo 'checked="checked"'; ?> /> 女</label>
				<label><input type="radio" name="gender" value="0" <?php if($_POST['gender']=='0')echo 'checked="checked"'; ?>> 保密</label>
		  </td>
		</tr>

		<tr>
		  <th><div align="left">
            <label for="bday">生日</label>
	      </div></th>
		  <td>
		  <?php 
			// 创建年份下拉菜单
			echo '<select name="year">';
			$year = 1970;
			while ($year <= 2000) {
				echo "<option value=\"$year\" ";
				if($_POST['year'] == $year) echo 'selected="selected" ';
				echo ">$year</option>\n";
				$year++;
			}
			echo '</select>年 ';
			
			// 创建月份下拉菜单
			echo '<select name="month">';
			$month = 1;
			do{
				echo "<option value=\"$month\" ";
				if($_POST['month'] == $month) echo 'selected="selected" ';
				echo ">$month</option>\n";
				$month++;
			}while($month <= 12); 
			echo '</select>月 ';
			
			// 创建日期下拉菜单
			echo '<select name="day">';
			for ($day = 1; $day <= 31; $day++) {
				echo "<option value=\"$day\" ";
				if($_POST['day'] == $day) echo 'selected="selected" ';
				echo ">$day</option>\n";
			}
			echo '</select>日 ';
			
			?>
		  </td>
		</tr>

		<tr>
		  <th><div align="left">
            <label for="loactionnew">来自</label>
	      </div></th>
		  <td><input type="text" id="loaction" name="location" size="25" value="<?php echo $_POST['location']; ?>" /></td>
		</tr>

		<tr>
		  <th><div align="left">
            <label for="site">个人网站</label>
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
            <label for="msn">爱好</label>
	      </div></th>
		  <td>
		    <input type="checkbox" name="interests[]" value="音乐"  <?php if(isset($_POST['interests'])){if(in_array("音乐",$_POST['interests'])) echo 'checked="checked"'; }?> />音乐 
			<input type="checkbox" name="interests[]" value="电影"  <?php if(isset($_POST['interests'])){if(in_array("电影",$_POST['interests'])) echo 'checked="checked"'; }?> />电影 
			<input type="checkbox" name="interests[]" value="看书"  <?php if(isset($_POST['interests'])){if(in_array("看书",$_POST['interests'])) echo 'checked="checked"'; }?> />看书 
			<input type="checkbox" name="interests[]" value="运动"  <?php if(isset($_POST['interests'])){if(in_array("运动",$_POST['interests'])) echo 'checked="checked"'; }?> />运动 
			<input type="checkbox" name="interests[]" value="其他"  <?php if(isset($_POST['interests'])){if(in_array("其他",$_POST['interests'])) echo 'checked="checked"'; }?> />其他
		</td>
		</tr>
		<tr>
			<th valign="top"><div align="left">
	          <label for="bio">头像</label>
              </td>
            </div>
		  <td><input name="upload" type="file" /><input type="hidden" name="MAX_FILE_SIZE" value="524288" /></td>
		</tr>
		<tr>
			<th valign="top"><div align="left">
	          <label for="bio">自我介绍</label>
              </td>
            </div>
		  <td><textarea rows="5" cols="30" id="bio" name="bio"><?php echo stripslashes($_POST['bio']); ?></textarea></td>
		</tr>
		<tr>
			<th>&nbsp;</th>
		  <td><input name="submit" type="submit" value="注册" />
	      &nbsp;&nbsp;
	      <input name="reset" type="reset" value="重填" /></td>
		</tr>
	  </table>
</form>
<?php # Script 6-7 –handle_regist.php
 	if($_POST['submit']){
		if(empty($_POST['username'])){
			echo "用户名不能为空。";
			exit;
		}
		if (empty($_POST['password'])) {
			echo "密码不能为空。";
			exit;
		}
		if (empty($_POST['password2'])) {
			echo "确认密码不能为空。";
			exit;
		}
		if (empty($_POST['email'])) {
			echo "Email不能为空。";
			exit;
		}
		if ($_POST['password']!==$_POST['password2']) {
			echo "密码与确认密码不同，请重新输入。";
			exit;
		}
		if (!ereg("^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]{2,6})+",$_POST['email'])){
			echo "Email格式不正确。";
			exit;
		} 
		if(!empty($_POST['site'])){
			if(!eregi("^((http|https|ftp)://)?([[:alnum:]\-\.])+(\.)([[:alnum:]]){2,6}([[:alnum:]/+=%&_\.~?\-]*)$",$_POST['site'])){
				echo "主页格式不正确。";
				exit;
		}}
		if (isset($_FILES['upload'])) {
	if($_FILES['upload']['error'] == 2){
		echo '<p><font color="red">请上传一个小于512K的图片。</font></p>';
		exit;
	}else{
		$allowed = array ('image/jpg','image/jpeg','image/png','image/pjpeg','image/gif','image/x-png');
		if (in_array($_FILES['upload']['type'], $allowed)) {
			if (move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/{$_FILES['upload']['name']}")) {
				$src="uploads/{$_FILES['upload']['name']}";
			} else { 
				echo '<p><font color="red">文件上传有误: </b>';
				switch ($_FILES['upload']['error']) {
					case 1:
						echo '这个文件超出php.ini中设定的upload_max_filesize指定大小。';
						break;
					case 2:
						echo '这个文件超出表单中设定的MAX_FILE_SIZE的指定大小。';
						break;
					case 3:
						echo '文件仅被部分上传。';
						break;
					case 4:
						echo '文件未被上传。';
						break;
					case 6:
						echo '没有可用的临时文件夹。';
						break;
					default:
						echo '系统错误。';
						break;
				} 
				echo '</b></font></p>';
				exit;
			} 
	 	} else { 
			echo '<p><font color="red">请选择图片格式文件上传。</font></p>';
			unlink ($_FILES['upload']['tmp_name']); 
			exit;
		} 
	} 
}

?>
		<h1>您的输入信息为：</h1>
		<table width="600" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<th width="185"><div align="left">基本信息 ( * 为必填项)</div></th>
					<td width="410">&nbsp;</td>
				</tr>
		<tr>
		  <th><div align="left">
            <label for="username">用户名 *</label>
	      </div></th>
			<td>
				<?php echo $_POST['username']; ?>
		  </td>
		</tr>
		<tr>
			<th><div align="left">
	          <label for="password">密码  *</label>
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
				<th><div align="left">扩展信息</div></th>
				<td>&nbsp;</td>
			</tr>
		<tr>
		  <th><div align="left">
            <label for="questionid">安全提问</label>
	      </div></th>
			<td>
			<?php switch($_POST['questionid']){
			case 1:
				echo "母亲的名字";
				break;
			case 2:
				echo "爷爷的名字";
				break;
			case 3:
				echo "父亲出生的城市";
				break;
			case 4:
				echo "您其中一位老师的名字";
				break;
			case 5:
				echo "您个人计算机的型号";
				break;
			case 6:
				echo "您最喜欢的餐馆名称";
				break;
			case 7:
				echo "驾驶执照的最后四位数字";
				break;	
			default:
				echo "无安全提问";
				break;
		}?>
			</td>
		</tr>

		<tr>
		  <th><div align="left">
            <label for="answer">回答</label>
	      </div></th>
		  <td><?php echo $_POST['answer']; ?>&nbsp;</td>
		</tr>
		<tr>
			<th><div align="left">性别</div></th>
			<td>
				<?php 
	  		switch ($_POST['gender']){
	  		case 1:
	  			echo "男";
	  			break;
	  		case 2:
	  			echo "女";
	  			break;
	  		case 0:
	  			echo "保密";
	  			break;
	  	}
	  ?> </td>
		</tr>

		<tr>
		  <th><div align="left">
            <label for="bday">生日</label>
	      </div></th>
		  <td>
		   <?php
			echo $_POST['year'] . '年' . $_POST['month'] . '月' . $_POST['day'] . '日';	
		   ?>
		  </td>
		</tr>

		<tr>
		  <th><div align="left">
            <label for="loactionnew">来自</label>
	      </div></th>
		  <td><?php echo $_POST['location']; ?></td>
		</tr>

		<tr>
		  <th><div align="left">
            <label for="site">个人网站</label>
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
            <label for="msn">爱好</label>
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
            <label for="msn">头像</label>
	      </div></th>
			<td><img src="<?php echo $src; ?>" />
		  </td>
		</tr>
		<tr>
			<th valign="top"><div align="left">
	          <label for="bio">自我介绍</label>
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
