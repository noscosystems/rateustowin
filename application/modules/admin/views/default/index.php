<?php
	/* @var $this DefaultController */

	$this->breadcrumbs=array(
		$this->module->id,
	);

	$form->attributes = array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data');
	
?>

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#organisation" role="tab" data-toggle="tab">Organisation</a></li>
  <li><a href="#branch" role="tab" data-toggle="tab">Branch</a></li>
  <li><a href="#survey" role="tab" data-toggle="tab">Survey</a></li>
  <li><a href="#settings" role="tab" data-toggle="tab">Selected survey to make live</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
<div class="container tab-pane active " id="organisation" style="/*background:#FF0000;*/ padding:5px;">
<?php
	echo $form->renderBegin();
	$widget = $form->activeFormWidget;

	if(Yii::app()->user->hasFlash('addSuccess')):
?>
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

<div class="tab-pane container" id="branch" style="padding:7px;">
<?php
	$formBranch->attributes = array('class' => 'form-horizontal');
	echo $formBranch->renderBegin();
	$widget = $formBranch->activeFormWidget;
	if(Yii::app()->user->hasFlash('addBranchSucc')):
?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('addBranchSucc'); ?>
    </div>
    <?php endif; ?>
    <?php if($widget->errorSummary($formBranch)){
        echo '<div class="alert alert-danger">' . $widget->errorSummary($formBranch) . '</div>';
    } ?>
<div class="row">
    <div class="col-sm-1 control-label">Organisation the branch belongs to:</div>
    <div class="col-sm-3">
        <?php echo $widget->input($formBranch, 'organisationId', array('class' => 'form-control') ); ?>
    </div>
    <div class="col-sm-1 control-label">Name</div>
    <div class="col-sm-3">
        <?php echo $widget->input($formBranch, 'name', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-1 control-label">Address:</div>
    <div class="col-sm-3">
        <?php echo $widget->input($formBranch, 'address', array('class' => 'form-control') ); ?>
    </div>
    <div class="col-sm-1 control-label">Town</div>
    <div class="col-sm-3">
        <?php echo $widget->input($formBranch, 'town', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-1 control-label">County:</div>
    <div class="col-sm-3">
        <?php echo $widget->input($formBranch, 'county', array('class' => 'form-control') ); ?>
    </div>
    <div class="col-sm-1 control-label">Postcode:</div>
    <div class="col-sm-3">
        <?php echo $widget->input($formBranch, 'postcode', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-1 control-label">Phone Number:</div>
    <div class="col-sm-3">
        <?php echo $widget->input($formBranch, 'phoneNum', array('class' => 'form-control') ); ?>
    </div>
    <div class="col-sm-1 control-label">Email:</div>
    <div class="col-sm-3">
        <?php echo $widget->input($formBranch, 'email', array('class' => 'form-control') ); ?>
    </div>
</div>
<div class="col-sm-3 col-sm-offset-1">
        <?php echo $widget->button($form, 'submit', array('class' => 'btn btn-sm btn-success') ); ?>
    </div>
	<?php echo $formBranch->renderEnd(); ?>
  </div>

<div class="tab-pane" id="survey" style="padding:7px;">

  	<?php
		$formSurvey->attributes = array('class' => 'form-horizontal');
		echo $formSurvey->renderBegin();
		$widget = $formSurvey->activeFormWidget;
		if(Yii::app()->user->hasFlash('addSurveySucc')):
	?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('addSurveySucc'); ?>
    </div>
    <?php endif; ?>
    <?php if($widget->errorSummary($formSurvey)){
        echo '<div class="alert alert-danger">' . $widget->errorSummary($formSurvey) . '</div>';
    } ?>
	<div class="row">
	    <div class="col-sm-1 control-label">Organisation:</div>
	    <div class="col-sm-3">
	        <?php echo $widget->input($formSurvey, 'orgId', array('class' => 'form-control') ); ?>
	    </div>
	    <div class="col-sm-1 control-label">Name</div>
	    <div class="col-sm-3">
	        <?php echo $widget->input($formSurvey, 'name', array('class' => 'form-control') ); ?>
	    </div>
	</div>
	<br>

	<?php $answerTypes = \application\models\db\Answertype::model()->findAll(); ?>

	<?php for ($i=0; $i<6; $i++):?>
		<div class="row">
		    <div class="col-sm-1 control-label">Question <?php echo$i+1; ?>:</div>
		    <div class="col-sm-3">
		        <input type="text" name="question[]" class="form-control">
		    </div>
		    <div class="col-sm-1 control-label">Answer Type</div>
		    <div class="col-sm-3">
		        <select name="answerType[]" class="form-control">
		        	<option selected>Select please</option>
			    	<?php foreach (	$answerTypes as $answertype): ?>
			        	<option value="<?php echo $answertype->id; ?>"><?php echo $answertype->type; ?></option>
			        <?php endforeach; ?>
		        </select>

		    </div>
		</div>
		<br>
	<?php endfor; ?>

	<div class="col-sm-3 col-sm-offset-1">
        <?php echo $widget->button($formSurvey, 'submit', array('class' => 'btn btn-sm btn-success') ); ?>
    </div>
<?php echo $formSurvey->renderEnd(); ?>
</div>
  <div class="tab-pane" id="settings">...</div>

</div>
<script>
$(function () {
    $('#myTab a:last').tab('show')
  })
</script>
