<?php
	/* @var $this DefaultController */

	$this->breadcrumbs=array(
		$this->module->id,
	);

	$form->attributes = array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data');
	echo $form->renderBegin();
	$widget = $form->activeFormWidget;
?>

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#home" role="tab" data-toggle="tab">Organisation</a></li>
  <li><a href="#branch" role="tab" data-toggle="tab">Branch</a></li>
  <li><a href="#survey" role="tab" data-toggle="tab">Survey</a></li>
  <li><a href="#settings" role="tab" data-toggle="tab">Selected survey to make live</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
<div class="container tab-pane active " id="home" style="/*background:#FF0000;*/ padding:5px;">
	<?php if(Yii::app()->user->hasFlash('addSuccess')): ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('addSuccess'); ?>
    </div>
    <?php endif; ?>
    <?php if($widget->errorSummary($form)){
        echo '<div class="alert alert-danger">' . $widget->errorSummary($form) . '</div>';
    } ?>
	<div class="row">
	    <div class="col-sm-1 control-label">Name:</div>
	    <div class="col-sm-3">
	        <?php echo $widget->input($form, 'name', array('class' => 'form-control') ); ?>
	    </div>
	    <div class="col-sm-2 control-label">Prize image:</div>
	    <div class="col-sm-3">
	        <input type="file" name="image[]" class="form-control">
	    </div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-6 control-label">Enter description for your image here to use as a caption (max. 255 characters).</div>
		<div class="col-sm-3">
	        <input type="text" name="desc[]" class="form-control">
	    </div>
	</div>
	<br>
	<div class="row">
	    <div class="col-sm-1 control-label">Address:</div>
	    <div class="col-sm-3">
	        <?php echo $widget->input($form, 'address', array('class' => 'form-control') ); ?>
	    </div>
	    <div class="col-sm-2 control-label">Logo image:</div>
	    <div class="col-sm-3">
	        <input type="file" name="image[]" class="form-control">
	    </div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-6 control-label">Enter description for your image here to use as a caption (max. 255 characters).</div>
		<div class="col-sm-3">
	        <input type="text" name="desc[]" class="form-control">
	    </div>
	</div>
	<br>
	<div class="row">
	    <div class="col-sm-1 control-label">Email:</div>
	    <div class="col-sm-3">
	        <?php echo $widget->input($form, 'email', array('class' => 'form-control') ); ?>
	    </div>
	</div>
	<br>
	<div class="row">
	    <div class="col-sm-1 control-label">Phone number:</div>
	    <div class="col-sm-3">
	        <?php echo $widget->input($form, 'phoneNumber', array('class' => 'form-control') ); ?>
	    </div>
	</div>
	<div class="row">
    <div class="col-sm-3 col-sm-offset-1">
        <?php echo $widget->button($form, 'submit', array('class' => 'btn btn-sm btn-success') ); ?>
    </div>
</div>
</div>
<?php echo $form->renderEnd(); ?>
<!-- <div class="tab-pane active" id="home">...</div> -->
  <div class="tab-pane" id="branch" style="background:#00FF00; width:500px; height200px;">...</div>
  <div class="tab-pane" id="survey">

  </div>
  <div class="tab-pane" id="settings">...</div>

</div>
<script>
  $(function () {
    $('#myTab a:last').tab('show')
  })
</script>