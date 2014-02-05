<?php
require_once('../login.php');
$dbc = mysqli_connect($db_hostname, $db_username, $db_password, $db_database) or die("Failed to connect: " . mysql_error());


$query = "DESCRIBE emailrenew";
$result = mysqli_query($dbc, $query) or die ("Database access failed: " . mysql_error());
$rows = mysqli_num_rows($result);
echo "<table><tr> <th>Column</th> <th>Type</th> <th>Null</th> <th>Key</th> </tr>";
for ( $j=0; $j < $rows ; ++$j) {
	$row = mysqli_fetch_row($result);
	echo "<tr>";
	for ($k = 0; $k<4; ++$k) echo "<td>$row[$k]</td>";
	echo "</tr>";
	}
echo "</table>";

if ( isset($_POST['emailaddress'])) {
	
	$emailaddress = $_POST['emailaddress'];
	$idcode = ''; // generate random number to store w email
	$startdate = ''; // php version of NOW()
	$nextdate = ''; // = startdate + 365 days
	$enddate = ''; // = startdate + 365*x days (how many years?)
	
	$query = "INSERT INTO emailrenew (emailaddress, idcode, startdate, nextdate, enddate, userdisabled) VALUES" . "('$emailaddress', '$idcode', NOW(), '$nextdate', '$enddate', NULL)";
	if ( !mysqli_query($dbc, $query)) {
		echo "INSERT failed: $query<br />" . mysql_error() . "<br /><br />";
		}
}
?>

<form action="signup.php" method="post"><pre>
	Email Address <input type="text" name="emailaddress" />
	<input type="submit" value="ADD RECORD" />
</pre></form>


<?
$query = "SELECT * FROM emailrenew";
$result = mysqli_query($dbc, $query) or die ("database access failed: " . mysql_error());
while ( $row = mysqli_fetch_array($result) ) {
	echo '<p>EMAIL ADDRESS: ' . $row['emailaddress'] . '<br />';
	echo 'START DATE: ' . $row['startdate'] . '<br /></p>';
	}

mysqli_close($dbc);
?>