<!DOCTYPE html>
<html style="height: 100%">
<head>
<meta charset="utf-8">
<title>SMSBank</title>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>

<link rel='shortcut icon' type='image/png' href="<?php echo base_url();?>resources/favicon.png">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css' integrity='sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU' crossorigin='anonymous'>
<link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet'>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>

</head>
<body style="height: 100%">
<div class ="container-fluid bg-light" style="height: 100%">
	<div class="container">
		<div class="text-center"><img src="<?php echo base_url('resources/favicon.png');?>" width="100px" height="100px"> 
		<h1>LOG IN</h1></div>
		<?php echo $this->session->flashdata("log");?>
		<form action="<?php echo site_url('main/login')?>" method="post">
		    <div class="form-group mb-3">
				<input type ="text" class="form-control" name='acc' placeholder="Account No" required="">
		    </div>
		    <div class="form-group mb-3">
				<input type ="password" class="form-control" name='pass' placeholder="Password" required="">
			</div>
			<input class="btn btn-secondary mb-3" type ="submit" value="LOGIN">
		</form>
		<a class="text-info" href ="">FORGOT PASSWORD</a><br>
		<a class="text-info" href ="">CREATE ACCOUNT</a>
	</div>	
</div>
</body>
</html>