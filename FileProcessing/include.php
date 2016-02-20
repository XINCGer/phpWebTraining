<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
<title>include包含文件</title>
<style type="text/css">
<!--
.STYLE1 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
  <?php
	include('file.php');
?> 
<div align="center"><span class="STYLE1">欢迎来到我的主页</span> 
</div>
<p>PHP有4个用于外部文件的函数：include()、include_once()、require()和require_once()。</p>
<p>这些函数能够把其他文件，通常是其他PHP脚本包含到PHP文档中。这些包含的文件中的PHP代码就好像是主文档的一部分一样来执行，这对于在多个页面中包含代码库是很有用的。  </p>
<p>这4个函数的用法相同，PHP脚本中将包括如下代码行：</p>
<p> include_once('filename.php');  </p>
<p>require('/path/to/filename.html'); </p>
</body>
</html>
