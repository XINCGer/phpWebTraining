<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>@pple�ļ���Ӫ</title>
<style type="text/css">
<!--
.style1 {
	font-size: 50px;
	font-family: Tahoma;
}
.style2 {color: #669900}
.style3 {color: #CC0000}
.style4 {
	font-size: 24px;
	color: #0000FF;
	font-family: Tahoma;
}
.style5 {
	font-size: 24px;
	color: #DB4D4D;
}
-->
</style>
</head>
<body>
<?php 
	$fp = fopen("times.txt", "r");
    //�Զ���ʽ�򿪼�¼���������������ļ�times.txt

    $str1 = fread($fp, filesize("times.txt"));
    //���ļ��ж�����ֵ

    $str1++;
    //����������

    fclose($fp);
    //�ر��ļ�

    $fp = fopen("times.txt", "w");
    //һд�ķ�ʽ�򿪼�¼�����������ļ�times.txt

    fwrite($fp, $str1);
    //�����µķ�������д���ļ�

    fclose($fp);
    //�ر��ļ�

	
	
	for($i = 0;$i < strlen($str1);$i++){
	//��0���ļ�ȡ�����ַ�������ѭ��
		$digit = substr($str1,$i,1);
		//ȡ��ÿһ������
		$str .= "<img src=\"blue/blue_$digit.gif\">";
		//�趨���ֶ�Ӧ��ͼƬ·��
	}

?>
<p align="center" class="style1"><span class="style2">@pple</span><span class="style3">�ļ���Ӫ</span></p>
<p align="center" class="style4">��վ��������<span class="style5"><?php echo $str?></span>�˵��ã�</p>
<p align="center" class="style4">����...<img src="blue/blue_0.gif" width="122" height="104">�˼��ʳɹ�...</p>
</body>
</html>
