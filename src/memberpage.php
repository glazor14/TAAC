<!doctype html>
<?php
	session_start();
?>
<html>
<head>
<title>TAAC</title>
<link rel="stylesheet" type="text/css" href="css/taacstyle.css">
<style type="text/css">
</style>
</head>

<body>
<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<a href="../index.html"><img src="images/TAAC title.png" alt="" width="700" height="131"/></a>
</p>
<p>
<a href="http://signup.com/go/chMAoNR" target="_blank"><img src="images/Button Sign Up For Events.png" width="301" height="131" alt=""></a>
<a href="logservice.php"> <img src="images/Button Log Service.png" width="301" height="131" alt=""/></a>
<a href="check-balance.php"><img src="images/Button Check Balance.png" width="301" height="131" alt=""/></a>
</p>
<p> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
  <a href="transfer-points.php"><img src="images/Button Transfer Points.png" width="301" height="131" alt=""/></a>
<?php
    if(isset($_GET['admin'])){
    $response = $_GET['admin'];

    $responseCheck = strcmp($response, "true");
      if($responseCheck == 0){
      	echo '<a href="admin.html"><img src="images/Button Admin Page.png" width="301" height="131" alt=""/></a>';
      }
  }
?>	
</p>
</body>
</html>
