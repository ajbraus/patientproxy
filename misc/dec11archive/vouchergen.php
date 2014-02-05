<?php
/* VOUCHER DB INFO:
db: patientproxy
table: vouchercodes
fields: vouchercode (varchar 5); creationdate (date), useddate (date), used (tinyint 1), voucher_pk (int 10)
*/
if ( isset($_POST['vouchercodes']) ) {
	
	require_once('login.php');
	$dbc = mysqli_connect ( $db_hostname, $db_username, $db_password, $db_database) or die ( 'failed to connect to database' );
	
	$vouchers = trim ( $_POST['vouchercodes'] );
	$vouchers = explode ( '
', $vouchers );
	$dupes = array ();
	foreach ( $vouchers as &$voucher ) {
		$voucher = trim ( $voucher );
		$voucher = "'" . $voucher . "'";
		$query = "SELECT vouchercode FROM vouchercodes WHERE vouchercode=$voucher";
		$result = mysqli_query ( $dbc, $query );
		$num = mysqli_num_rows ( $result );
		if ( $num > 0 ) {
			$dupes[] = $voucher;
			}
		else {
			$query2 = "INSERT INTO vouchercodes ( vouchercode, creationdate ) VALUE ( $voucher, NOW() )";
			$result2 = mysqli_query ( $dbc, $query2 ) or die ('insert failed');
			if ( $result2 ) {
				echo 'insert worked for voucher: ' . $voucher . '<br />';
				}
			}
		echo '<br />';
		}
	if ( count ( $dupes ) ) {
		echo 'DUPLICATES (not added):<br />';
		foreach ( $dupes as $dupe ) {
			echo $dupe . '<br />';
			}
		}
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<label for="vouchercodes">PASTE CODE LIST:</label><br />
<textarea name="vouchercodes"></textarea>
<input type="submit" value="GO" />
