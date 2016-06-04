<?php
class Painter {
	private $x1, $x2, $y1, $y2;
	private $color;
	private $im;
	function __construct($image) {
		$this->im = $image;
	}
	function setProperty($x1, $y1, $x2, $y2, $color) {
		$this->x1 = $x1;
		$this->x2 = $x2;
		$this->y1 = $y1;
		$this->y2 = $y2;
		$this->color = $color;
	}
	function drawLine() {
		imageline ( $this->im, $this->x1, $this->y1, $this->x2, $this->y2, $this->color );
	}
	function drawCircle() {
		imageellipse ( $this->im, $this->x1, $this->y1, $this->x2, $this->y2, $this->color );
	}
	function drawRect() {
		imagerectangle ( $this->im, $this->x1, $this->y1, $this->x2, $this->y2, $this->color );
	}
}

// 准备工作
$im = imagecreatetruecolor ( 800, 600 );
$red = imagecolorallocate ( $im, 255, 0, 0 );
$green = imagecolorallocate ( $im, 0, 255, 0 );
$blue = imagecolorallocate ( $im, 0, 0, 255 );
imagefill ( $im, 0, 0, $blue );
header ( "Content-type:image/png" );
// 定义画笔
$painter1 = new Painter ( $im );
// 绘制线段
$painter1->setProperty ( 20, 20, 200, 100, $red );
$painter1->drawLine ();
// 绘制矩形
$painter1->setProperty ( 100, 150, 300, 200, $green );
$painter1->drawRect ();
// 绘制圆形
$painter1->setProperty ( 400, 300, 200, 200, $red );
$painter1->drawCircle ();
imagepng ( $im );
imagedestroy ( $im );