<?php
$btn = $_POST ["btn_submit"];
$userName = $_POST ["userName"];
$password = $_POST ["password"];
if (isset ( $btn )) {
	if ($userName == "user" && $password == "123456") {
		echo "µÇÂ¼³É¹¦£¡";
		echo "<script>
			alert('µÇÂ¼³É¹¦£¡');
			</script>";
	} else {
		echo "µÇÂ¼Ê§°Ü£¡";
		echo "<script>
			  alert('µÇÂ¼Ê§°Ü£¡');
			  </script>";
	}
}
?>