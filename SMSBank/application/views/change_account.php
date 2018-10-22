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
	<script>$("a[href='<?php echo site_url('transaction_log')?>']").addClass("active")</script>
	<div class="container mb-5" style="position: relative;top: 60px">
		<div class="text-muted display-4 mb-4">Change Account Information for <?php echo $this->session->userdata('accountnumber')?></div>
		<form method="post" action="<?php echo site_url('update')?>">
			<table class="table table-striped table-bordered table-hover" style="cursor: pointer;">
				<caption>Info for <?php echo $this->session->userdata('accountnumber')?></caption>
				<thead>
					<tr>
						<td>Account Number</td>
						<td>Name</td>
						<td>Balance</td>
						<td>Type</td>
						<td>Time</td>
						<td></td>
					</tr>
				</thead>
				<?php 
					echo "<tr>";
					echo "<td>$userdata->Acc_No</td>";
					echo "<td><input class='form-control' type='text' name='name' value='$userdata->Name'></td>";
					echo "<td>$userdata->Balance</td>";
					echo "<td><input class='form-control' type='text' name='type' value='$userdata->Type'></td>";
					echo "<td>".date_format(date_create($userdata->time),"d-m-Y h:i a")."</td>";
					echo "<td><button class='btn btn-success' type='submit'>Submit</button></td>";
					echo "</tr>";
				?>
			</table>
		</form>
		<script>$("table").DataTable()</script>
	</div>
</body>
</html>