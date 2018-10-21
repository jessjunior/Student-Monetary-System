<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $links;?>
	<?php echo $datatable;?>
</head>
<body>
	<?php echo $nav;?>
	<script>$("a[href='<?php echo site_url('transaction_log/get_log')?>']").addClass("active")</script>
	<div class="row w-100 p-3" style="position: relative;top: 60px">
		<div class="text-muted display-4 mb-4 ml-4">Transaction Log - <?php echo $this->session->userdata('accountnumber');?></div>
		<div class="col-xl-9">
			<div class="container mb-5">
				<table class="table table-striped table-bordered table-hover" style="cursor: pointer;">
					<caption>Transactions made by <?php echo $this->session->userdata('accountnumber');?> in SMS Bank.</caption>
					<?php echo $this->session->flashdata('log'); ?>
					<thead>
						<tr>
							<td>Log ID</td>
							<td>Transaction Source</td>
							<td>Transaction Recipient</td>
							<td>Transaction</td>
							<td>Amount</td>
							<td>Time</td>
						</tr>
					</thead>
					<?php 
						foreach ($t_log as $record) {
							echo "<tr>";
							echo "<td>$record->Log_ID</td>";
							echo "<td>$record->tName</td>";
							echo "<td>$record->rName</td>";
							echo "<td>$record->Transactions</td>";
							echo "<td>$record->Amount</td>";
							echo "<td>".date_format(date_create($record->Time),"d-m-Y h:i a")."</td>";
							echo "</tr>";
						}
					?>
				</table>
				<script>$("table").DataTable()</script>
			</div>
		</div>
		<div class="col-xl-3 ml-auto mr-auto p-0 w-50">
			<h3 class="text-muted text-center">Account Information</h3>
			<table class="table table-bordered table-striped table-dark w-100">
				<?php 
					echo "<tr><td><b>Acc No.</b></td><td>$userdata->Acc_No</td></tr>";
					echo "<tr><td><b>Name</b></td><td>$userdata->Name</td></tr>";
					echo "<tr><td><b>Acc Type</b></td><td>$userdata->Type</td></tr>";
					echo "<tr><td><b>Balance</b></td><td>$userdata->Balance</td></tr>";
					echo "<tr><td><b>Create Time</b></td><td>".date_format(date_create($userdata->time),"d-m-Y h:i a")."</td></tr>";
				?>
			</table>
			<div class="d-flex justify-content-between mb-3">
				<button class="btn btn-success" data-toggle='modal' data-target='#deposit'>Deposit</button>
				<button class="btn btn-success" data-toggle='modal' data-target='#withdraw'>Withdraw</button>
				<button class="btn btn-success" data-toggle='modal' data-target='#transfer'>Transfer</button>
			</div>
			<button class="btn btn-danger w-100">Change Account Information</button>
		</div>
	</div>

	<div class="modal fade" id="deposit">
		<div class="modal-dialog">
		  	<div class="modal-content">
		      	<div class="modal-header">
				  	<h4 class="modal-title">Deposit Cash</h4>
				  	<button type="button" class="close" data-dismiss="modal">&times;</button>
			  	</div>
			  	<form method="post" enctype="multipart/form-data" action="<?php echo site_url('deposit')?>">
			      	<div class="modal-body">
				        <input class="form-control" type="number" name="amount" placeholder="Amount" required="">
				  	</div>
				    <div class="modal-footer">
				    	<button type="submit" class="close">Submit</button>
				    </div>
			    </form>
		    </div>
		</div>
	</div>
	<div class="modal fade" id="withdraw">
		<div class="modal-dialog">
		  	<div class="modal-content">
		      	<div class="modal-header">
				  	<h4 class="modal-title">Withdraw Cash</h4>
				  	<button type="button" class="close" data-dismiss="modal">&times;</button>
			  	</div>
			  	<form method="post" enctype="multipart/form-data" action="<?php echo site_url('withdraw')?>">
			      	<div class="modal-body">
				        <input class="form-control" type="number" name="amount" placeholder="Amount" required="">
				  	</div>
				    <div class="modal-footer">
				    	<button type="submit" class="close">Submit</button>
				    </div>
			    </form>
		    </div>
		</div>
	</div>
	<div class="modal fade" id="transfer">
		<div class="modal-dialog">
		  	<div class="modal-content">
		      	<div class="modal-header">
				  	<h4 class="modal-title">Transfer Cash</h4>
				  	<button type="button" class="close" data-dismiss="modal">&times;</button>
			  	</div>
			  	<form method="post" enctype="multipart/form-data" action="<?php echo site_url('transfer')?>">
			      	<div class="modal-body">
			      		<input class="form-control mb-3" type="text" name="to" placeholder="To" required="">
				        <input class="form-control" type="number" name="amount" placeholder="Amount" required="">
				  	</div>
				    <div class="modal-footer">
				    	<button type="submit" class="close">Submit</button>
				    </div>
			    </form>
		    </div>
		</div>
	</div>
</body>
</html>