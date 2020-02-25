<?php

session_start();
include("dbh.inc.php");

date_default_timezone_set("America/New_York");

$purchase_entry_date = date("Y-m-d h:i:sa");
$buyer_id = $_POST['account_number'];
$is_admin = $_SESSION['is_admin'];
$purchase_date = $_POST['purchase_date'];
$purchase_type = $_POST['purchase_type'];
$add_info = $_POST['add_info'];
$purchase_amount = $_POST['purchase_amount'];


if (isset($_SESSION['u_id']) && $is_admin){
	
	$sql = "SELECT * FROM members WHERE member_id = '$buyer_id'";
			$result = mysqli_query($conn, $sql);
	if($row = mysqli_fetch_assoc($result)){
	 		$buyer_current_points = $row['current_points'];
	} else {
		header("Location: ../member-purchase.php?log=memberdoesntexist");
		exit();
	}
	
	if($purchase_amount <= 0 ){
		header("Location: ../member-purchase.php?log=positivetransfersonly");
		exit();
	}

	if($purchase_amount > $buyer_current_points){
		header("Location: ../member-purchase.php?log=notenoughpoints");
		exit();
	}else{
	
		$sql = "INSERT INTO purchase_log (member_id, purchase_date, purchase_type, points_spent, additional_purchase_info, purchase_entry_date) VALUES ('$buyer_id', '$purchase_date', '$purchase_type', '$purchase_amount','$add_info', '$purchase_entry_date')";
	
		$result = mysqli_query($conn, $sql);
		
	
		$sql = "UPDATE members SET current_points = current_points - $purchase_amount WHERE member_id = '$buyer_id'";
		$result = mysqli_query($conn, $sql);
		
		$_SESSION['current_points'] = $_SESSION['current_points'] - $purchase_amount;
		
		header("Location: ../member-purchase.php?log=success");
		exit();
	}
} else {
	header("Location: ../member-purchase.php?error=notloggedin");
	exit();
}
