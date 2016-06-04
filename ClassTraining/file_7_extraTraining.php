<html>
<frameset rows="15%,85%">
	<frame src="top.html">
	<frame src="Rect.php" name="showframe">
</frameset>

</html>
<?php
abstract class Shape {
	abstract function getArea();
	abstract function getPerimeter();
}