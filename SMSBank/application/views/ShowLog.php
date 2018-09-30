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
	<div class="container mb-5" style="position: relative;top: 100px">
		<div class="text-muted display-4 mb-4">Transaction Log - All Transactions</div>
		<table class="table table-striped table-bordered table-hover" style="cursor: pointer;">
			<caption>All transactions made in SMS Bank.</caption>
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
</body>
</html>