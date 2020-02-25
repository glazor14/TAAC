<?php

	
	include_once 'dbh.inc.php';
	
	$first = $_POST['first'];
	$last = $_POST['last'];
	$grad_year = $_POST['grad_year'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$type = $_POST['typeofmember'];
	$size = $_POST['tshirt'];
	$pwd = $_POST['password'];
	$referred_by = $_POST['referred_by'];
	
	//Error Handlers
	//Check for empty fields
	if (empty($first) || empty($last) || empty($email) || empty($phone))
	{
		header("Location: ../apply.php?apply=empty");
		exit();
	} else {
					$sql = "INSERT INTO members (first, last, grad_year, email, cell, type, size, password, referred_by) VALUES ('$first', '$last', '$grad_year', '$email', '$phone', '$type', '$size', '$pwd', '$referred_by');";
					$result = mysqli_query($conn, $sql);
					header("Location: ../apply.php?apply=success");
					exit();
				
	}
