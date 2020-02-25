<?php

session_start();
include("dbh.inc.php");

$user_id = $_SESSION['u_id'];

if (isset($_SESSION['u_id']))
{
	$sql = "SELECT * FROM members WHERE member_id = '$user_id'";
	$result = mysqli_query($conn, $sql);

	if ($row = mysqli_fetch_assoc($result))
	{
		$current_balance  = $row['current_points'];
        $lifetime_balance = $row['lifetime_points'];

        header("Location: ../check-balance.php?current=$current_balance&lifetime=$lifetime_balance");
		exit();
	}
}