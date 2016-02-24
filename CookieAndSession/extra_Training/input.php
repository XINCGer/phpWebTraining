<?php 
session_start();
if(!isset($_SESSION['agent']) OR ($_SESSION ['agent'] != md5($_SERVER['HTTP_USER_AGENT']))){
	$url = 'index.php'; 
	header("Location: $url");
	exit(); 
}

$page_title = 'ע��';
include ('./includes/header.html');

if (isset($_POST['Submit'])) {
	$errors = array(); 	
	if (empty($_POST['title'])) {
		$errors[] = '������������������.';
	}
	if (empty($_POST['content'])) {
		$errors[] = '������������������.';
	}
	
	if (empty($errors)) {
		require_once("./includes/mysql_connect.php");
		$content = stripslashes($_POST['content']);
		$content = htmlspecialchars($content);
		$content = str_replace(" ","&nbsp;",$content); 
		$content = nl2br($content); 
		$sql = "INSERT INTO `message` ( `mes_id` , `user_id` , `title` , `content` , `write_date` ) 
				VALUES (NULL , '{$_SESSION['user_id']}', '{$_POST['title']}', '$content', NOW( ));";
		mysql_query("SET NAMES 'gb2312'");
		$result = @mysql_query($sql);
		
		if($result){
			echo '<h1 id="mainhead">���Գɹ���</h1>';
			echo '<p>�������Գɹ���<a href="show.php">�������</a>�鿴���ԣ�</p><p></p>';
			include ('./includes/footer.html');
			exit();
		}else{
			echo '<h1 id="mainhead">ϵͳ����</h1>
			<p class="error">�ܱ�Ǹ����ʱ�޷����ԡ�<br />';
			echo '<p>' . mysql_error() ;
			include ('./includes/footer.html');
			exit();
		}
		mysql_close();
	} else { 
		echo '<h1 id="mainhead">����</h1>
		<p class="error">�������´���<br />';
		foreach ($errors as $msg) { 
			echo " - $msg<br />\n";
		}
		echo '</p><p>�����</p><p><br /></p>';
	} 
} 
?>
<h2>ע�᣺</h2>
<form action="input.php" method="post">
	<table width="434" height="152">
      <tr>
        <td width="84">�������⣺</td>
        <td width="338"><input type="text" name="title" size="20" value="<?php if(isset($_POST['title'])) echo $_POST['title']; ?>" /></td>
      </tr>
      <tr>
        <td>�������ݣ�</td>
        <td><textarea name="content" cols="30" rows="5"><?php echo stripslashes($_POST['content']); ?></textarea></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" name="Submit" value="�ύ" />
        </div></td>
      </tr>
  </table>
</form>
<?php
include ('./includes/footer.html');
?>