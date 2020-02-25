<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>TAAC - Sign In</title>
<link rel="stylesheet" type="text/css" href="css/taacstyle.css">
<style type="text/css">
</style>
</head>

<body>
<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <a href="../index.html"><img src="images/TAAC title.png" alt="" width="700" height="131"/></a></p>
<p>&nbsp;</p>
<form method="POST" enctype="multipart/form-data" action="scripts/login.inc.php">
<p>
  <label for="number">Account Number:</label>
  <input type="number" name="user_id" id="user_id">
 (provided to you via email after you have Applied)</p>
<p>
  <label for="password">Account Password:</label>
  	<input type="password" name="password" id="password">
</p>
<p>
  <input type="submit" name="submit" id="submit" value="Submit">
</p>
</form>
<?php
    if(isset($_GET['login'])){
    $response = $_GET['login'];

    $responseCheck = strcmp($response, "wrongpwd");
      if($responseCheck == 0)
      {
        echo '<p style="color:red"> This account number or password is incorrect.<br> </p>';
      }
    }
?>
<p>&nbsp;</p>
<p><strong><font size="5">For more information, please email:</font></strong> 
  <a href="mailto:TuscaroraAthleticAmbassadors@aol.com">
  <font size="5">TuscaroraAthleticAmbassadors@aol.com</font>
  </a>
</p>
</body>
</html>