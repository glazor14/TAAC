<?php

session_start();

include 'dbh.inc.php';

$user_id = $_POST['user_id'];
$password = $_POST['password'];

if(empty($user_id) || empty($password)){
	header("Location: ../signin.php?login=wrongpwd");
	exit();
	
}else {
	$sql = "SELECT * FROM members WHERE member_id = '$user_id'";
	$result = mysqli_query($conn, $sql);
	
	$resultCheck = mysqli_num_rows($result);
	
	if($resultCheck < 1){
		header("Location: ../signin.php?login=wrongpwd");
		exit();
	} else {
		if ($row = mysqli_fetch_assoc($result))
		{
			$pwdCheck = strcmp($password, $row['password']);
			if($pwdCheck == 0){
				//login the user here
				$_SESSION['u_id'] = $row['member_id'];
				$_SESSION['u_first'] = $row['first'];
				$_SESSION['u_last'] = $row['last'];
				$_SESSION['u_type'] = $row['type'];
				$_SESSION['is_admin'] = $row['is_admin'];
				$_SESSION['current_points'] = $row['current_points'];
				$_SESSION['lifetime_points'] = $row['lifetime_points'];
				
				if($_SESSION['is_admin']){
					header("Location: ../memberpage.php?admin=true");
					exit();
				}else{
					header("Location: ../memberpage.php?admin=false");
					exit();
				}
			} else {		
				header("Location: ../signin.php?login=wrongpwd");
				exit();
			}
		}
	}	
}
