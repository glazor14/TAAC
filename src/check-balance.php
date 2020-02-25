<!doctype html>
<?php
  session_start();
?>
<html>
<head>
<meta charset="utf-8">
<title>TAAC - Check Balance</title>
<link rel="stylesheet" type="text/css" href="css/taacstyle.css">
</head>

<body>
<p>&nbsp;</p>
<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <a href="../index.html"><img src="images/TAAC title.png" alt="" width="700" height="131"/></a></p>
<p>CHECK BALANCE</p>
<p>Member Number: 
  <?php
		 if(isset($_SESSION['u_id'])){
			 echo $_SESSION['u_id'];
		 }
	 ?>
</p>
<form method="GET" action="scripts/check-balance.inc.php">
    <p>Click Here: 
    <input type="submit" name="submit" id="submit" value="Check Balance">
  </p>

</form>
<p>&nbsp;</p>
<p>Currently Available Points for Purchases:   
  <?php
    if(isset($_GET['current'])){
      $current_balance = $_GET['current'];
      echo $current_balance;
    }
   ?> </p>
<p>Lifetime Points:
  <?php
    if(isset($_GET['lifetime'])){
      $lifetime_balance = $_GET['lifetime'];
      echo $lifetime_balance;
    }
?></p>
<p>&nbsp;</p>
</body>
</html>