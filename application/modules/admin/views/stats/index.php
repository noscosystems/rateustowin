<?php
	$orgSelect->attributes = array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data');
	echo $orgSelect->renderBegin();
	$widget = $orgSelect->activeFormWidget;
?>
<div class="row">
	<div class="control-label col-sm-3">Choose organisation:</div>
	<div class="col-sm-6">
		<?php echo $widget->input($orgSelect, 'id', array('class' => 'form-control') ); ?>
	</div>
</div>
<br>
<div class="row">
	<div class="control-label col-sm-3"></div>
		<div class="col-sm-3">
			<?php echo $widget->button($orgSelect, 'submit', array('class' => 'btn btn-success btn-md')); ?>
		</div>
</div>
<?php 
	echo $orgSelect->renderEnd();

	if (isset($enquiryForm) && !empty($enquiryForm)):

		$enquiryForm->attributes = array('class' => 'form-horizontal');
		echo $enquiryForm->renderBegin();
		$enquiryFormWidget = $enquiryForm->activeFormWidget;
?>
<?php if($widget->errorSummary($enquiryForm)){
        echo '<div class="alert alert-danger">' . $widget->errorSummary($enquiryForm) . '</div>';
    } ?>
<div class="row">
	<h2 align="center">Time period the enquiry is for</h2>
		<div class="control-label col-sm-3">Select start date:</div>
		<div class="col-sm-3">
			<?php echo $enquiryFormWidget->input($enquiryForm, 'startDate', array('class' => 'form-control')); ?>
		</div>
		<div class="control-label col-sm-3">Select end date:</div>
		<div class="col-sm-3">
			<?php echo $enquiryFormWidget->input($enquiryForm, 'endDate', array('class' => 'form-control')); ?>
		</div>
</div>
<br>
<div class="row">
	<div class="control-label col-sm-3">Select branch:</div>
	<div class="col-sm-6">
		<?php echo $enquiryFormWidget->input($enquiryForm, 'branch', array('class' => 'form-control')); ?>
	</div>
</div>
<br>
<div class="row">
	<div class="control-label col-sm-3"></div>
	<div class="col-sm-3">
		<?php echo $enquiryFormWidget->button($enquiryForm, 'submit', array('class' => 'btn btn-success btn-md')); ?>
	</div>
</div>
<br>
<?php
		echo $enquiryForm->renderEnd(); 
	endif;
?>
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
<?php endif; ?>
</div>
</div>
<?php $path = Yii::app()->assetPublisher->publish(Yii::getPathOfAlias('composer.twbs.bootstrap.dist')); ?>
<script type="text/javascript" src="<?php echo $path;?>/js/jquery-ui.js"></script>
<link href="<?php echo $path; ?>/js/jquery-ui.css" rel="stylesheet" type="text/css" />
<script>

    $(function() {
        $( "#application_models_form_Answersenquiry_startDate" ).datepicker();
        $( "#application_models_form_Answersenquiry_endDate" ).datepicker();
    });
</script>