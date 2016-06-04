<html>
<head>
</head>
<body>
	<form action="" method="post">
	请输入|矩形|的宽度和高度：<br/>
	宽度：<input type="text" name="width" > <br/>
	高度：<input type="text" name="height" > <br/>
	<input type="submit" name="btn" value="计算">
	</form>
</body>
</html>

<?php 
include 'file_7_extraTraining.php';
class Rectangle extends Shape {
	private $width, $height;
	function __construct($width, $height) {
		$this->width = $width;
		$this->height = $height;
	}
	function getArea() {
		return $this->width * $this->height;
	}
	function getPerimeter() {
		return 2 * $this->width + 2 * $this->height;
	}
}
if(isset($_POST["btn"])){
	$rect1 = new Rectangle($_POST["width"], $_POST["height"]);
	echo "矩形的周长：".$rect1->getPerimeter()."<br/>";
	echo "矩形的面积：".$rect1->getArea()."<br/>";
}
?>