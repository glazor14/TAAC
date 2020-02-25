<?php

session_start();
include("dbh.inc.php");

$member_id = $_POST['to_account_number'];
$service_date = $_POST['date_of_service'];
$type_of_service = $_POST['type_of_service'];
$add_info = $_POST['add_info'];
$points_earned = $_POST['points_earned'];
$is_admin = $_SESSION['is_admin'];

if (isset($_SESSION['u_id']) && $is_admin){
	$sql = "INSERT INTO service_log (member_id, service_date, service_type, points_earned, additional_service_info, admin_added) 
	VALUES ('$member_id', '$service_date', '$type_of_service', '$points_earned','$add_info', 1)";
	
	$result = mysqli_query($conn, $sql);
	
	$sql = "UPDATE members SET current_points = current_points + $points_earned, lifetime_points = lifetime_points + $points_earned 
	WHERE member_id = '$member_id'";
	$result = mysqli_query($conn, $sql);
	
	$_SESSION['current_points'] = $_SESSION['current_points'] + $points_earned;
	$_SESSION['lifetime_points'] = $_SESSION['lifetime_points'] + $points_earned;
	
	header("Location: ../src/award-pointslog-service.php?log=success");
	exit();

} else {
	header("Location: ../src/award-pointslog-service.php?log=notloggedin");
	exit();
}