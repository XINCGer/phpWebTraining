<html>
<head>
<title>ѧ��������</title>
</head>
<body>
	<form action="" method="post">
		ѧ��:<input type="text" name="no"> <br /> ����:<input type="text"
			name="name"> <br /> �Ա���<input type="radio" name="sex" value="��"> Ů<input
			type="radio" name="sex" value="Ů"> <br /> <input type="submit"
			name="btn" value="��ʾ">
	</form>
</body>
</html>


<?php
class Student {
	private $no;
	private $name;
	private $sex;
	function __construct($no = "", $name = "", $sex = "") {
		$this->no = $no;
		$this->name = $name;
		$this->sex = $sex;
	}
	function toString() {
		echo "ѧ�ţ�" . $this->no . "<br/>";
		echo "������" . $this->name . "<br/>";
		echo "�Ա�" . $this->sex . "<br/>";
	}
}

if (isset ( $_POST ["btn"] )) {
	if (isset ( $_POST ["sex"] )) {
		$stu1 = new Student ( $_POST ["no"], $_POST ["name"], $_POST ["sex"] );
		$stu1->toString ();
	} else {
		echo "<script>alert('��ѡ���Ա�');</script>";
	}
}