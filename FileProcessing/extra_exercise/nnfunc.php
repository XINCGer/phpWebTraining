<?php
function nn($n){
	echo "<table border=1>\n";
			for($x = 1;$x <= $n;$x++){
				echo "<tr>\n";
				for($y = 1;$y <= $n;$y++){
					echo "<td width=\"60\">\n";
					echo $x."*".$y."=".($x*$y)."\n";
					echo "</td>";
			   }
			   echo "</tr>\n";
			}
		echo "</table>\n";
}
?>

