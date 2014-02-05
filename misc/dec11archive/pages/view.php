<?php
require_once('../login.php');
$dbc = mysqli_connect($db_hostname, $db_username, $db_password, $db_database) or die("Failed to connect: " . mysql_error());
$query = "SELECT * FROM emailrenew";
$result = mysqli_query($dbc, $query) or die ("database access failed: " . mysql_error());
while ( $row = mysqli_fetch_array($result) ) {
	echo '<p>EMAIL ADDRESS: ' . $row['emailaddress'] . '<br />';
	echo 'ID CODE: ' . $row['idcode'] . '<br />';
	echo 'START DATE: ' . $row['startdate'] . '<br /></p>';
	echo 'NEXT DATE: ' . $row['nextdate'] . '<br />';
	echo 'END DATE: ' . $row['enddate'] . '<br />';
	}

mysqli_close($dbc);
?>