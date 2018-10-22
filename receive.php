 <link rel="stylesheet" href="form.css">
 
 <?php session_start(); ?>
 <div class = "body content">
		
		<?php
		
		$mysqli = new mysqli('localhost','root','','bank');
		$sql = 'SELECT acc_no, FROM loans';
		$result = $mysqli->query($sql); //result = mysqli_result object
		
		
		?>
	<div class = "received">
		<div class = "alert alert-success"><?= $_SESSION['message'] ?></div>
		Received <span class = "acc_no"><?php= $_SESSION['acc_no'] ?></span>
	</div>