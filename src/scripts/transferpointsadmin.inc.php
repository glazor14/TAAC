<?php

session_start();
include("dbh.inc.php");

date_default_timezone_set("America/New_York");

$from_account_number = $_POST['from_account_number'];
$to_account_number = $_POST['to_account_number'];
$add_info = $_POST['add_info'];
$purchase_amount = $_POST['num_of_points'];
$transfer_date = date("Y-m-d h:i:sa");

if (isset($_SESSION['u_id'])){
	
	$sql = "SELECT * FROM members WHERE member_id = '$from_account_number'";
	$result = mysqli_query($conn, $sql);

	if($row = mysqli_fetch_assoc($result)){
	 		$sender_current_points = $row['current_points'];
	} else {
		header("Location: ../transfer-points-admin.php?log=memberdoesntexist");
		exit();
	}

	$sql = "SELECT * FROM members WHERE member_id = '$to_account_number'";
	$result = mysqli_query($conn, $sql);
	
	if($row = mysqli_fetch_assoc($result)){
	 		$reciever_current_points = $row['current_points'];
	} else {
		header("Location: ../transfer-points.php?log=memberdoesntexist");
		exit();
	}

	if($purchase_amount <= 0){
		header("Location: ../transfer-points.php?log=negativetransferamount");
		exit();
	}
	
	if($purchase_amount > $sender_current_points){
		header("Location: ../transfer-points-admin.php?log=notenoughpoints");
		exit();
	}else{
		//decrease amount of points for sender
		$sql = "UPDATE members SET current_points = current_points - $purchase_amount WHERE member_id = '$from_account_number'";
		$result = mysqli_query($conn, $sql);		
		$_SESSION['current_points'] = $_SESSION['current_points'] - $purchase_amount;
		
		//increase amount of poinits for reciever
		$sql = "UPDATE members SET current_points = current_points + $purchase_amount WHERE member_id = '$to_account_number'";
		$result = mysqli_query($conn, $sql);	

		$sql = "INSERT INTO transfer_log (transfer_date, transfer_FROM_member_id, transfer_amount, transfer_TO_member_id, transfer_additional_information, admin_added
) VALUES ('$transfer_date', '$from_account_number', '$purchase_amount', '$to_account_number', '$add_info', '1')";
	
			$result = mysqli_query($conn, $sql);
		
		header("Location: ../transfer-points-admin.php?log=success");
		exit();	
	}
	
} else {
	header("Location: ../transfer-points-admin.php?log=notloggedin");
	exit();
}