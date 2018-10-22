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
		    <div class="form-group input-group mb-3">
		    	<div class="input-group-prepend">
			      	<span class="input-group-text" id="show" style="cursor: pointer;"><img src="<?php echo base_url();?>/resources/show_password_icon.png" style="width: 23px;height: 23px;"></span>
			    </div>
				<input type ="password" class="form-control" name='pass' id='pass' placeholder="Password" required="">
			</div>
			<input class="btn btn-secondary mb-3" type ="submit" value="LOGIN">
		</form>
		<a class="text-info" data-toggle="modal" href ="#forgotPin">FORGOT PIN</a><br>
		<a class="text-info" data-toggle="modal" href ="#signUp">CREATE ACCOUNT</a>
	</div>

	<div class="modal fade" id="forgotPin">
		<div class="modal-dialog">
		  	<div class="modal-content">
		      	<div class="modal-header">
				  	<h4 class="modal-title">Change Password</h4>
				  	<button type="button" class="close" data-dismiss="modal">&times;</button>
			  	</div>
			  	<form method="post" enctype="multipart/form-data" action="<?php echo base_url()?>main/reset_password.html">
			      	<div class="modal-body">
			      		For your password to be reset, you have to provide your Account number to verify your identity.
				        <input class="form-control" type="text" name="acc_no" placeholder="Account No" required="">
				  	</div>
				    <div class="modal-footer">
				    	<button type="submit" class="close">Reset Pin</button>
				    </div>
			    </form>
		    </div>
		</div>
	</div>

	<div class="modal fade" id="signUp">
		<div class="modal-dialog" style="min-width: 70%;">
			<div class="modal-content" style="background-image: linear-gradient(-270deg,whitesmoke 10%,ghostwhite 90%);">
				<div class="modal-header">
					<div class="modal-title" style="font-size: 18px;">Sign Up</div>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form style="width: 100%;" method="post" enctype="multipart/form-data" action="<?php echo site_url('main/sign_up')?>">
					<div class="row modal-body" style="padding: 25px;box-sizing: border-box;width: 100%;">
						<div class="col-lg-6">
							<div class="form-group">
								<div class="input-group mb-4">
									<input type="text" class="form-control" name="name" id="name" placeholder="Full Name" required="">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group mb-4">
									<div class="input-group-prepend">
								      	<span class="input-group-text" id="showSecret" style="cursor: pointer;"><img src="<?php echo base_url();?>/resources/show_password_icon.png" style="width: 23px;height: 23px;"></span>
								    </div>
									<input type="password" class="form-control" name="secret" id="secret" placeholder="Password" required="">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group mb-4">
									<div class="input-group-prepend">
								      	<span class="input-group-text" id="showSecretRe" style="cursor: pointer;"><img src="<?php echo base_url();?>/resources/show_password_icon.png" style="width: 23px;height: 23px;"></span>
								    </div>
									<input type="password" class="form-control" name="secretRe" id="secretRe" placeholder="Repeat Password" required="">
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<div class="input-group mb-4">
									<input type="text" class="form-control" name="deposit" id="deposit" placeholder="Initial Deposit" required="">
								</div>
							</div>
							<div class="form-group input-group">
								<div class="input-group-prepend">
								   	<span class="input-group-text">Type</span>
								</div>
								<select class="custom-select" name="type" id="type" style="cursor: pointer;" required="">
									<option>Personal</option>
									<option>Business</option>
									<option>Other</option>
								</select>
							</div><br>
						</div>
					</div>
					<div class="form-group mb-3 modal-footer">
						<button type="submit" class="close">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
<script>
	function showPassword(event){
		var type=$(event.data.input).attr("type")
		if(type.localeCompare("password")===0){
			$(event.data.input).attr("type","text")
			$(event.data.button).addClass("bg-secondary")
		}else{
			$(event.data.input).attr("type","password")
			$(event.data.button).removeClass("bg-secondary")
		}
	}

	$("#show").click({button: "#show", input: "#pass"},showPassword)
	$("#showSecret").click({button: "#showSecret", input: "#secret"},showPassword)
	$("#showSecretRe").click({button: "#showSecretRe", input: "#secretRe"},showPassword)
</script>
</html>