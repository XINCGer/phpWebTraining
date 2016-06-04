<html>
<head>
<title>学生管理类</title>
</head>
<body>
	<form action="" method="post">
		学号:<input type="text" name="no"> <br /> 姓名:<input type="text"
			name="name"> <br /> 性别：男<input type="radio" name="sex" value="男"> 女<input
			type="radio" name="sex" value="女"> <br /> <input type="submit"
			name="btn" value="显示">
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
		echo "学号：" . $this->no . "<br/>";
		echo "姓名：" . $this->name . "<br/>";
		echo "性别：" . $this->sex . "<br/>";
	}
}

if (isset ( $_POST ["btn"] )) {
	if (isset ( $_POST ["sex"] )) {
		$stu1 = new Student ( $_POST ["no"], $_POST ["name"], $_POST ["sex"] );
		$stu1->toString ();
	} else {
		echo "<script>alert('请选择性别！');</script>";
	}
}