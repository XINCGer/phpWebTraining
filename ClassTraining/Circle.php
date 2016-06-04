<html>
<head>
</head>
<body>
	<form action="" method="post">
	请输入|圆形|的半径：<br/>
	半径：<input type="text" name="radius" > <br/>
	<input type="submit" name="btn" value="计算">
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
	echo "圆形的周长：".$circle1->getPerimeter()."<br/>";
	echo "圆形的面积：".$circle1->getArea()."<br/>";
}