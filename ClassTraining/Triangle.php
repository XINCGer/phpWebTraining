<html>
<head>
</head>
<body>
	<form action="" method="post">
	请输入|三角形|的三条边：<br/>
	第一条边：<input type="text" name="edge[]" > <br/>
	第二条边：<input type="text" name="edge[]" > <br/>
	第三条边：<input type="text" name="edge[]" > <br/>
	<input type="submit" name="btn" value="计算">
	</form>
</body>
</html>

<?php
include 'file_7_extraTraining.php';
class Triangle extends Shape {
	private $edge1, $edge2, $edge3;
	function __construct($edge1, $edge2, $edge3) {
		$this->edge1 = $edge1;
		$this->edge2 = $edge2;
		$this->edge3 = $edge3;
	}
	function getArea() {
		$temp = $this->getPerimeter () / 2;
		return sqrt ( $temp * ($temp - $this->edge1) * ($temp - $this->edge2) * ($temp - $this->edge3) );
	}
	function getPerimeter() {
		return $this->edge1 + $this->edge2 + $this->edge3;
	}
}
if(isset($_POST["btn"])){
	$edge = $_POST["edge"];
	$triangle1 = new Triangle($edge[0], $edge[1], $edge[2]);
	echo "三角形的周长：".$triangle1->getPerimeter()."<br/>";
	echo "三角形的面积：".$triangle1->getArea()."<br/>";
}