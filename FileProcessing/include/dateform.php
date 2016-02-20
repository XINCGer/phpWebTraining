<?php # Script 3.12 - dateform.php (2nd version after Script 3.7)
$page_title = '日期表单';
include ('./includes/header.html');

// This function makes three pull-down menus for the months, days, and years.
function make_calendar_pulldowns($m = NULL, $d = NULL, $y = NULL) {

// 创建月份数组
$months = array (1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

// 创建月份下拉菜单
echo '<select name="month">';
	foreach ($months as $key => $value) {
		echo "<option value=\"$key\"";
		if ($key == $m) { // Preselect.
			echo ' selected="selected"';
		}
		echo ">$value</option>\n";
	}
	echo '</select>';

// 创建日期下拉菜单
echo '<select name="day">';
	for ($day = 1; $day <= 31; $day++) {
		echo "<option value=\"$day\"";
		if ($day == $d) { // Preselect.
			echo ' selected="selected"';
		}
		echo ">$day</option>\n";
	}
	echo '</select>';
	
// 创建年份下拉菜单
echo '<select name="year">';
	for ($year = 2005; $year <= 2015; $year++) {
		echo "<option value=\"$year\"";
		if ($year == $y) { // Preselect.
			echo ' selected="selected"';
		}
		echo ">$year</option>\n";
	}
	echo '</select>';
	
} // 函数定义结束

// Create the form tags.
echo '<h1 id="mainhead">选择一个日期</h1>
<p><br /></p><form action="dateform.php" method="post">';

// Get today's information and call the function.
$dates = getdate();
make_calendar_pulldowns ($dates['mon'], $dates['mday'], $dates['year']);

echo '&nbsp;&nbsp;<input name="submit" type="submit" value="提交" />'; 
echo '</form><p><br /></p>'; // End of form.

if(!empty($_POST['submit'])){
	echo '<p>您选择了 '. $_POST['year'] . '年' . $_POST['month'] . '月' . $_POST['day'] . '日</p>';
}else{
	echo '<p>今天是 ' . date ('l') . '，现在时间为： ' . date ('g:i a') . '.</p>';
}

include ('./includes/footer.html');
?>