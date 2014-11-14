<div class="row" align="center">
<h3>Time period our enquiry is for: <?php echo date('d-m-Y',$startDate);?> : <?php echo date('d-m-Y',$endDate);?></h3>
</div>
<br>
<?php if (isset($report) && !empty($report)): ?>
	<div class="row">
		<div class="col-sm-12">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Customer name</th>
				<th>Branch name</th>
				<th>Survey name</th>
				<th>Q1</th>
				<th>Q2</th>
				<th>Q3</th>
				<th>Q4</th>
				<th>Q5</th>
				<th>Q6</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($report as $ind => $row): ?>
			<tr>
<?php 			$rowCount = count($row);
				for ($i=0; $i<5; $i++)
					if(isset($row[$i])){
						if ($i+1 == $rowCount){
							$toSpan = $rowCount - ($i+1);
							echo'<td colspan='.$toSpan.'>'.$row[$i].'</td>';
						}
						else
							echo'<td>'.$row[$i].'</td>';
					}
					
				endfor;
?>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php elseif (empty($report)): ?>
	<div class="jumbotron">
		<div class="container">
			<h1>We are sorry, but there are no surveys answered for this time period.</h1>
		</div>
	</div>
</div>
</div>
<?php endif; ?>