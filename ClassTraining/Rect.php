<html>
<head>
</head>
<body>
	<form action="" method="post">
	������|����|�Ŀ�Ⱥ͸߶ȣ�<br/>
	��ȣ�<input type="text" name="width" > <br/>
	�߶ȣ�<input type="text" name="height" > <br/>
	<input type="submit" name="btn" value="����">
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
	echo "���ε��ܳ���".$rect1->getPerimeter()."<br/>";
	echo "���ε������".$rect1->getArea()."<br/>";
}
?>