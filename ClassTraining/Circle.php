<html>
<head>
</head>
<body>
	<form action="" method="post">
	������|Բ��|�İ뾶��<br/>
	�뾶��<input type="text" name="radius" > <br/>
	<input type="submit" name="btn" value="����">
	</form>
</body>
</html>

<?php
include 'file_7_extraTraining.php';
class Circle extends Shape {
	private $radius;
	function __construct($radius) {
		$this->radius = $radius;
	}
	function getArea() {
		return $this->radius * $this->radius * 3.14;
	}
	function getPerimeter() {
		return $this->radius * 2 * 3.14;
	}
}
if(isset($_POST["btn"])){
	$circle1 = new Circle($_POST["radius"]);
	echo "Բ�ε��ܳ���".$circle1->getPerimeter()."<br/>";
	echo "Բ�ε������".$circle1->getArea()."<br/>";
}