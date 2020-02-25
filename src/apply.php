<!doctype html>

<html>
<head>
<meta charset="utf-8">
<title>TAAC - Apply</title>
<link rel="stylesheet" type="text/css" href="css/taacstyle.css">
</head>

<body>
	<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <a href="../index.html"><img src="images/TAAC title.png" alt="" width="700" height="131"/></a></p>
<h2>Club Application</h2>
<h3>Membership can be revoked at any time for misconduct.</h3>
<form method="POST" action = "scripts/signup.inc.php">
<p class="serif">
  <label for="first">First Name:</label>
  <input name="first" type="text" required="required" id="first" placeholder="first name" tabindex="1" size="50">
  <label for="last"><br>
    <br>
  Last Name:</label>
  <input name="last" type="text" required="required" id="last" tabindex="2" placeholder="last name" size="50">
</p>
<p>
  <label for="email">Email Address that you check regularly:</label>
  <input name="email" type="email" required="required" id="email" tabindex="3" placeholder="email address" size="75">
</p>
<p>
  <label for="cell">Cell Phone:</label>
  <input name="phone" type="cell" required="required" id="cell" tabindex="4" placeholder="cell phone" size="30">
Note: Notifications will come via email and text message.</p>
<p>Type of Member:
  <label>
    <input type="radio" name="typeofmember" value="Student" id="TypeofMember_0">
    Student</label>
  <label>
    <input type="radio" name="typeofmember" value="Parent" id="TypeofMember_1">
  Parent</label>
  <label>
    <input type="radio" name="typeofmember" value="Other" id="TypeofMember_2">
  Other</label>
</p>
<p>What year will you graduate?
  <label for="grad_year">:</label>
  <input name="grad_year" type="text" id="grad_year" placeholder="Graduation Year">
</p>
<p>Tshirt Size: 
  <label>
    <input type="radio" name="tshirt" value="Adult Small" id="Tshirtsize_0">
    Adult Small</label>
  <label>
    <input type="radio" name="tshirt" value="Adult Medium" id="Tshirtsize_1">
  Adult Medium</label>
  <label>
    <input type="radio" name="tshirt" value="Adult Large" id="Tshirtsize_2">
  Adult Large</label>
  <label>
    <input type="radio" name="tshirt" value="Adult XLarge" id="Tshirtsize_3">
  Adult XLarge</label>
</p>
<p>Please enter a password for this account
  <label for="password">:</label>
  <input name="password" type="text" id="password" placeholder="password">
</p>
<p>Were you referred to join by anyone?
  <label for="referred_by">:</label>
  <input name="referred_by" type="text" id="referred_by" placeholder="Referred by">
</p>
<p>
  <input type="submit" name="submit" id="submit" value="Submit">
  <br>
</p>
</form>
<?php
  if(isset($_GET['apply'])){
  $apply = $_GET['apply'];

  $applyCheck = strcmp($apply, "success");
      if($applyCheck == 0){
        echo '<p style="color:green"> Your application has been successfully proccessed! Please wait for an email with your account information.<br> </p>';
      }else {
        echo '<p style="color:red">Please fill out your account information and then press the submit button!<br> </p>';
      }
  }
?>
<p>&nbsp;</p>
</body>
</html>