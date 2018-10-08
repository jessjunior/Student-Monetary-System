
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login Form</title>
<link rel="stylesheet" href="<?php echo base_url("/Resources/style.css");?>">
</head>
<body>

<div class ="container">
<img src="<?php echo base_url("/Resources/logo.jpg");?>" width="100px" height="100px"> 
<h1>LOG IN</h1>

<form action="confirm.php" method="post">

      <div class="tbox">
<input type ="text" placeholder="Student ID no" value="">
      </div>
      <div class="tbox">
<input type ="password" placeholder="password" value="">
      </div>
 
<input class="btn" type ="submit" name="" value="LOGIN" onclick="Homepage.html">
 </form>

  <a class="b1" href ="#">FORGOT PASSWORD?</a><br>
  <a class="b2" href ="Signup.html">CREATE ACCOUNT</a>
  
</div>
  </body>
  </html>
