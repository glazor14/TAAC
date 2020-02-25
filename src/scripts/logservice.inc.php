<?php
session_start();
include("dbh.inc.php");

date_default_timezone_set("America/New_York");

$service_entry_date = date("Y-m-d h:i:sa");
$member_id = $_SESSION['u_id'];
$service_date = $_POST['service_date'];
$type_of_service = $_POST['type_of_service'];
$add_info = $_POST['add_info'];
$points_earned = $_POST['points_earned'];

if (isset($_SESSION['u_id'])){
	$sql = "INSERT INTO service_log (member_id, service_date, service_type, points_earned, additional_service_info, service_entry_date) 
	VALUES ('$member_id', '$service_date', '$type_of_service', '$points_earned','$add_info', '$service_entry_date')";
	
	$result = mysqli_query($conn, $sql);
	
	$sql = "UPDATE members SET current_points = current_points + $points_earned, lifetime_points = lifetime_points + $points_earned 
	WHERE member_id = '$member_id'";
	$result = mysqli_query($conn, $sql);
	
	$_SESSION['current_points'] = $_SESSION['current_points'] + $points_earned;
	$_SESSION['lifetime_points'] = $_SESSION['lifetime_points'] + $points_earned;
	
	header("Location: ../logservice.php?log=success");
	exit();

} else {
	header("Location: ../logservice.php?log=notloggedin");
	exit();
}
