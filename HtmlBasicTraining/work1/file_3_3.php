<?php
$btn = $_POST ["btn_submit"];
$userName = $_POST ["userName"];
$password = $_POST ["password"];
if (isset ( $btn )) {
	if ($userName == "user" && $password == "123456") {
		echo "��¼�ɹ���";
		echo "<script>
			alert('��¼�ɹ���');
			</script>";
	} else {
		echo "��¼ʧ�ܣ�";
		echo "<script>
			  alert('��¼ʧ�ܣ�');
			  </script>";
	}
}
?>