<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>����</title>
</head>

<body>
<?php 
//������һ�����飺
$songs = array(1 => 'СС��','������','waka waka');

//�����ڶ������飺
$movies = array(1 => '������','���ν��','������');

//�������������飺
$books = array(1 => '��������','ĺ��֮��','Ʒ����');

//������ά���飺
$interests = array(
	'music' => $songs,
	'movie' => $movies,
	'book' => $books
);
	
//���һЩֵ��
echo "<p>��ϲ����һ�׸��� <i>{$interests['music'][1]}</i>��</p>";
echo "<p>��ϲ���ĵ�Ӱ�� <i>{$interests['movie'][2]}</i>��</p>";
echo "<p>��ϲ�������� <i>{$interests['book'][3]}</i>��</p>";

//ʹ��foreach��Ƕ�ײ���������ӡ��ά����
foreach ($interests as $title => $content) {
  print "<p>$title";
  foreach ($content as $number => $value) {
  print "<br />��ϲ���ĵ� $number ���� $value";
  } 
  print '</p>';
}

?>
</body>
</html>
