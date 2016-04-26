<?php
echo "к╝ои╩╗йЩё╨";
for($i =100;$i<=200;$i++){
	$var_1 = $i%10;
	$var_2 =(int)($i/10%10);
	$var_3 =(int)($i/100);
	if(pow($var_1, 3)+pow($var_2, 3)+pow($var_3, 3) ==$i){
		echo "$i"." ";
	}
}
?>