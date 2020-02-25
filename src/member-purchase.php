<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>TAAC - Check Balance</title>
<link rel="stylesheet" type="text/css" href="css/taacstyle.css">
</head>

<body>
<p>&nbsp;</p>
<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <a href="../index.html"><img src="images/TAAC title.png" alt="" width="700" height="131"/></a></p>
<p><strong>MEMBER PURCHASE - POINT OF SALE</strong></p>
<form method="POST" action="scripts/purchase.inc.php">
<p>
  <label for="textfield">Date of Purchase (MM/DD/YYYY):</label>
  <input name="purchase_date" type="text" id="textfield" placeholder="date of purchase">
</p>
<p>
  <label for="number">Account Number Making Purchase:</label>
  <input type="number" name="account_number" id="number">
</p>
<p>Type of Purchase:
  <select name="purchase_type" size="3" multiple>
    <option value="concessions">Concessions</option>
    <option value="tickets">Tickets</option>
    <option value="other">Other</option>
  </select>
</p>
<p>
  <label for="number2">Purchase Amount, round to nearest dollar:</label>
  <input type="number" name="purchase_amount" id="number2">
</p>
<p>
  <label for="textfield2">Additional Information:</label>
  <input name="add_info" type="text" id="textfield2" size="100">
</p>
<p>
  <input type="submit" name="submit" id="submit" value="Purchase">
</p>
	</form>

  <?php
    if(isset($_GET['log'])){
    $response = $_GET['log'];

    $responseCheck = strcmp($response, "success");
      if($responseCheck == 0){
        echo '<p style="color:red"> This purchase has been successfully proccessed!<br> </p>';
      }else {
        echo '<p style="color:red">There was an error proccessing your request.<br> </p>';
      }
    }
?>
</body>
</html>