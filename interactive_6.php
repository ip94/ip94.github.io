<!DOCTYPE html>
<?php
$cookie_name = "user";
$ThreeMonthExpire = 60 * 60 * 24 * 90 + time();
// See if the HTTP request has ever set $cookie_visit_count
if(!isset($cookie_visit_count)) {
 // No cookie called count, set the counter to 1 
 $cookie_visit_count = 1;
} else {
 $cookie_visit_count++;
}
// Set a cookie "count" with the current value
setcookie($cookie_name, "$cookie_visit_count", $ThreeMonthExpire);
?>
<html>
<head>
	<title>PHP Interactive 6 Results</title>
	<style type="text/css">
		div {align-content: center;}
		table {border-collapse: collapse; width: 80%;}
		table, th, td {border: 1px solid black; text-align: center; height: 30px}
		p {font-size: 20px;}
	</style>
</head>
<body>
	<h1>Lab 6 - Interactive PHP (Results)</h1>
	<div>
	<?php
	$size = $_GET['table_size'];
	// validate that input is between 3 and 12
	// if input is not, print Invalid Size. Please go back and try again.
	if (3 > $size or $size > 12) {
	    echo "Invalid size. Please go back and try again";
	} else {
	// else, create a table
		// Create an array containing all numbers ranging from 1 to $size
		$x = 1;
		for ($x; $x <= $size; 1) {
		    $size_array[$x - 1] = $x;
		    $x ++;
		}
		echo "<table>";
		echo "<tr><th colspan=\"$size\">My Multiplication Table</th></tr>";
		foreach ($size_array as $value_0) {
			echo "<tr>";
			foreach ($size_array as $value_1) {
				$table_content = $value_0*$value_1;
				echo "<td>$table_content</td>";
			}
			echo "</tr>";
		}
	}

	echo "<p>Your visits: $cookie_visit_count!</p>";
	?>
	</div>
</body>
</html>