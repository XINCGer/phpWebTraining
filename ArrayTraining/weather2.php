<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��ӡ����</title>
</head>
<body>

<?php // Script 4-1 �C weather1.php
// �������飺
$weather = array (
   'Monday' => '��ת����',
   'Tuesday' => '����ת��',
   'Wednesday' => '��������',
   'Thursday' => '����',
   'Friday' => '����ת��',
   'Saturday' => '����ת��',
   'Sunday' => '��������'
);
 
// ��ӡ�����ֵ��
foreach ($weather as $day => $content) {
	echo "<p>$day: $content</p>\n";
}

?>
</body>
</html>
