<?php require ("connect.php"); ?>
<?php	echo "Entry Date: ".$entryDate = $_POST['start_date']; ?> <br>
<?php	echo "Deadline: ".$deadLine = $_POST['final_date']; ?> <br>

<?php	echo "Responsible Name: ".$respName = $_POST['responsible1']; ?> <br>
<?php	echo "Socket code: ".$socketCode = $_POST['outlet_code']; ?> <br>
<?php	echo "IP Address: ".$socketIPAddr = $_POST['ip_address']; ?> <br>



<?php	echo "Contact Name: ".$contactName = $_POST['user_name']; ?> <br>
<?php	echo "Contact Phone: ".$contactPhone = $_POST['user_phone']; ?> <br>

<?php	echo "Comments: ".$comments = $_POST['notes']; ?> <br>
<?php	if(isset($_POST['status']) ) {
				echo "Status: Complete";
				$status = 1;
			}else {
				echo "Status: Active";
				$status = 0;
			}
?>

<?php
	//$output6 = str_replace("/","-",$output6);
	//$output6 = date("Y/m/d", strtotime($output6));
?>

<?php
	echo "INSERT INTO failures (outlet_code, ip_address, ypeuthynos, user_name, user_phone, start_date, notes, final_date, status, end_date) VALUES('$socketCode', '$socketIPAddr','$respName','$contactName','$contactPhone','$entryDate','$comments','$deadLine', '$status', '$entryDate') ";

	mysqli_query($conn, "INSERT INTO failures (outlet_code, ip_address, ypeuthynos, user_name, user_phone, start_date, notes, final_date, status, end_date) VALUES('$socketCode', '$socketIPAddr','$respName','$contactName','$contactPhone','$entryDate','$comments','$deadLine', '$status', '$entryDate') ");
	//header('Location: view.php');
?>
