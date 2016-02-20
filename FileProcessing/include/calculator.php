<?php # Script 3.11 - calculator.php (6th version after Scripts 3.5, 3.6, 3.8, 3.9 & 3.10)
$page_title = '���Ѽ���';
include ('./includes/header.html');

/* This function calculates a total
and then prints the results. */
function calculate_total ($tax = 5) {
	global $total;
	$taxrate = $tax / 100; // Turn 5% into .05.
	$total = ($_POST['quantity'] * $_POST['price']) * ($taxrate + 1);
	$total = number_format ($total, 2); 
} // End of function.

// Check if the form has been submitted.
if (isset($_POST['submitted'])) {

	if (is_numeric($_POST['quantity']) && is_numeric($_POST['price'])) {
	
		// Print the heading.
		echo '<h1 id="mainhead">�ܼƣ�</h1>';
	
		$total = NULL; // Initialize $total.
		
		if (is_numeric($_POST['tax'])) {
			calculate_total ($_POST['tax']);
		} else {
			calculate_total ();
		}
		
		echo '<p>�ܼƹ��� ' . $_POST['quantity'] . ' ����Ʒ��ÿ�� ' . number_format ($_POST['price'], 2) . ' Ԫ���ܼۣ���˰��Ϊ ' . $total . ' Ԫ.</p>';
		
		// Print some spacing.
		echo '<p><br /></p>';
		
	} else { // Invalid submitted values.
		echo '<h1 id="mainhead">����</h1>
		<p class="error">��������Ч����Ʒ���������ۣ�</p><p><br /></p>';
	}
	
} // End of main isset() IF.

// Leave the PHP section and create the HTML form.
?>
<h2>���Ѽ���</h2>
<form action="calculator.php" method="post">
	<p>����: <input type="text" name="quantity" size="5" maxlength="10" value="<?php if (isset($_POST['quantity'])) echo $_POST['quantity']; ?>" /></p>
	<p>����: <input type="text" name="price" size="5" maxlength="10" value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>" /></p>
	<p>˰ (%): <input type="text" name="tax" size="5" maxlength="10" value="<?php if (isset($_POST['tax'])) echo $_POST['tax']; ?>" /> (optional)</p>
	<p><input type="submit" name="submit" value="����!" /></p>
	<input type="hidden" name="submitted" value="TRUE" />
</form>
<?php
include ('./includes/footer.html');
?>