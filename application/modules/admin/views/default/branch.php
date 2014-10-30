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
        <?php echo $widget->button($formBranch, 'submit', array('class' => 'btn btn-sm btn-success') ); ?>
    </div>
	<?php echo $formBranch->renderEnd(); ?>