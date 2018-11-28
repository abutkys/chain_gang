<?php
$email = $_POST['email'] ?? '';
$value = $_POST['month'] ?? '';


$months = [1 => 'January', 'February','March','April', 'May','Jun','July','August','September','Octobre','Novembre','Decembre'];
$days = range(1, 31);
$years = range(2007, 2025);


?>
<h1>Result: <?php echo $value; ?> </h1>

<form action = "testukas.php" method="post">
	<?php
	
	echo '<select name="month">';
	foreach ($months as $month => $value){
		echo "<option value=\"$value\">$value</option>\n";
	}
	echo '</select>';
	
	?>
	<input type = "text" name="email">
	<input type = "submit">
</form>

