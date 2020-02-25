<!doctype html>
<?php
  session_start();
?>
<html>
<head>
<meta charset="utf-8">
<title>TAAC - Apply</title>
<link rel="stylesheet" type="text/css" href="css/taacstyle.css">
</head>

<body>
	<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <a href="../index.html"><img src="images/TAAC title.png" alt="" width="700" height="131"/></a></p>
<p>TRANSFER POINTS FOR MEMBER #
  <?php

		 if(isset($_SESSION['u_id'])){
			 echo $_SESSION['u_id'];
		 }
	 ?>
</p>
<form method="POST" action="scripts/transferpoints.inc.php">
<p>
  <label for="number">Number of Points to Transfer:</label>
  <input type="number" name="num_of_points" id="number">
</p>
<p>
  <label for="number2">Transfer TO Account Number:</label>
  <input type="number" name="to_account_number" id="number2">
</p>
<p>
  <label for="textfield">Additional Information:</label>
  <input name="add_info" type="text" id="textfield" size="100">
</p>
<p>
  <input type="submit" name="transfer" id="transfer" value="Transfer">
</p>
</form>
<?php
    if(isset($_GET['log'])){
    $response = $_GET['log'];

    $responseCheck = strcmp($response, "success");
      if($responseCheck == 0){
        echo '<p style="color:green"> Your transfer has been successfully proccessed!<br> </p>';
      }else {
        echo '<p style="color:red">There was an error in proccessing your request.<br> </p>';
      }
    }
?>
</body>
</html>