<?php
	/* @var $this DefaultController */

	$this->breadcrumbs=array(
		$this->module->id,
	);

	// $form->attributes = array('class' => 'form-horizontal');
	// echo $form->renderBegin();
	// $widget = $form->activeFormWidget;
?>

<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#organisation">Organisation</a></li>
  <li><a href="#">Profile</a></li>
  <li><a href="#">Messages</a></li>
</ul>


<div class="container" id="organisation" style="background:#FF0000;">
	<div class="row">
	    <div class="col-sm-3 control-label">Name:</div>
	    <div class="col-sm-6">
	        <?php echo $widget->input($form, 'name', array('class' => 'form-control') ); ?>
	    </div>
	</div>

</div>


