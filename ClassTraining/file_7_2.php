<html>
<head>
<title>������</title>
</head>
<body>
	<form action="" method="post">
		������1:<input type="text" name="num1"> <br /> ������2:<input type="text"
			name="num2"> <br /> ������+<input type="radio" name="op" value="+"> -<input
			type="radio" name="op" value="-"> *<input type="radio" name="op"
			value="*"> /<input type="radio" name="op" value="/"> <br /> <input
			type="submit" name="btn" value="����">
	</form>
</body>
</html>

<?php
class Calculator {
	private $num1;
	private $num2;
	private $operator;
	function __construct($num1 = "", $num2 = "", $op = "") {
		$this->num1 = $num1;
		$this->num2 = $num2;
		$this->operator = $op;
	}
	function calc() {
		switch ($this->operator) {
			case "+" :
				return $this->num1 + $this->num2;
				break;
			case "-" :
				return $this->num1 - $this->num2;
				break;
			case "*" :
				return $this->num1 * $this->num2;
				break;
			case "/" :
				if ($this->num2 == 0) {
					echo "<script>alert('��������Ϊ0��');</script>";
					return "��������Ϊ0��";
				} else {
					return $this->num1 / $this->num2;
				}
				break;
			default :
				break;
		}
	}
}

if (isset ( $_POST ["btn"] )) {
	if (isset ( $_POST ["op"] )) {
		$calculator1 = new Calculator ( $_POST ["num1"], $_POST ["num2"], $_POST ["op"] );
		echo "��������" . $calculator1->calc ();
	} else {
		echo "<script>alert('��ѡ�������');</script>";
	}
}