<?php 
session_start();
if(!isset($_SESSION['agent']) OR ($_SESSION ['agent'] != md5($_SERVER['HTTP_USER_AGENT']))){
	$url = 'index.php'; 
	header("Location: $url");
	exit(); 
}

$page_title = '注册';
include ('./includes/header.html');

if (isset($_POST['Submit'])) {
	$errors = array(); 	
	if (empty($_POST['title'])) {
		$errors[] = '您忘记输入留言主题.';
	}
	if (empty($_POST['content'])) {
		$errors[] = '您忘记输入留言内容.';
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
			echo '<h1 id="mainhead">留言成功！</h1>';
			echo '<p>您已留言成功，<a href="show.php">点击这里</a>查看留言！</p><p></p>';
			include ('./includes/footer.html');
			exit();
		}else{
			echo '<h1 id="mainhead">系统错误！</h1>
			<p class="error">很抱歉您暂时无法留言。<br />';
			echo '<p>' . mysql_error() ;
			include ('./includes/footer.html');
			exit();
		}
		mysql_close();
	} else { 
		echo '<h1 id="mainhead">错误！</h1>
		<p class="error">出现以下错误：<br />';
		foreach ($errors as $msg) { 
			echo " - $msg<br />\n";
		}
		echo '</p><p>请重填：</p><p><br /></p>';
	} 
} 
?>
<h2>注册：</h2>
<form action="input.php" method="post">
	<table width="434" height="152">
      <tr>
        <td width="84">留言主题：</td>
        <td width="338"><input type="text" name="title" size="20" value="<?php if(isset($_POST['title'])) echo $_POST['title']; ?>" /></td>
      </tr>
      <tr>
        <td>留言内容：</td>
        <td><textarea name="content" cols="30" rows="5"><?php echo stripslashes($_POST['content']); ?></textarea></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" name="Submit" value="提交" />
        </div></td>
      </tr>
  </table>
</form>
<?php
include ('./includes/footer.html');
?>