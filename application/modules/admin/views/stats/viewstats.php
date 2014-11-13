<?php if (isset($report) && !empty($report)): ?>
	<div class="row">
		<div class="col-sm-12">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<?php foreach ($report[0] as $ind => $row): ?>
				<th><?php echo $ind?></th>
				<?php endforeach; ?>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($report as $ind => $row): ?>
			<tr>
				<?php foreach ($row as $col): ?>
					<td><?php echo $col ?></td>
				<?php endforeach; ?>
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