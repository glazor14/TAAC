<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>TAAC - Check Balance</title>
<link rel="stylesheet" type="text/css" href="css/taacstyle.css">
</head>

<body>
<p>&nbsp;</p>
<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<a href="../index.html"><img src="images/TAAC title.png" alt="" width="700" height="131"/></a></p>
<p><strong>AWARD POINTS/LOG SERVICE</strong></p>
<form method="POST" action="../scripts/awardpoints.inc.php">
<p>
  <label for="number">Award Points TO Account Number: :</label>
  <input type="number" name="to_account_number" id="number">
</p>
<p>
  <label for="service_date">Date of Service MM/DD/YYYY:</label>
  <input type="text" name="date_of_service" id="service_date">
</p>
<p>Type of Service:
  <select name="type_of_service" size="5" multiple>
    <option value="concessions">Concessions</option>
    <option value="tickets">Tickets</option>
    <option value="track/xc meet">Meet</option>
    <option value="event">Event</option>
    <option value="other">Other</option>
  </select>
</p>
<p>
  <label for="points_earned">Points Earned:</label>
  <input type="number" name="points_earned" id="points_earned">
</p>
<p>
  <label for="additional_information">Additional Information:</label>
  <input name="add_info" type="text" id="additional_information
  " size="100">
</p>
<p>
  <input type="submit" name="submit" id="submit" value="Submit">
</p>
	</form>
    <?php
    if(isset($_GET['log'])){
    $response = $_GET['log'];

    $responseCheck = strcmp($response, "success");
      if($responseCheck == 0){
        echo '<p style="color:green"> This request has been successfully proccessed!<br> </p>';
      }else {
        echo '<p style="color:red">There was an error proccessing your request.<br> </p>';
      }
    }
?>
<p></p>
</body>
</html>