<?php
	/* @var $this DefaultController */

	$this->breadcrumbs=array(
		//$this->module->id,
	);

	$form->attributes = array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data');
	
?>

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#organisation" role="tab" data-toggle="tab">Organisation</a></li>
  <li><a href="#branch" role="tab" data-toggle="tab">Branch</a></li>
  <li><a href="#survey" role="tab" data-toggle="tab">Survey</a></li>
  <li><a href="#selectedSurvey" role="tab" data-toggle="tab">Selected survey to make live</a></li>
  <li><a href="#editOrg" role="tab" data-toggle="tab">Edit Organisation</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
<div class="container tab-pane active " id="organisation" style="padding:7px;">
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
	    <div class="col-sm-2 control-label">Terms & conditions:</div>
	    <div class="col-sm-3">
	        <?php echo $widget->input($form, 'terms', array('class' => 'form-control') ); ?>
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
		        	<option value="Please select" selected>Please select</option>
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
    </div>it 
<?php echo $formSurvey->renderEnd(); ?>
</div>
  <div class="tab-pane" id="selectedSurvey" style="padding:7px;">
<?php if(Yii::app()->user->hasFlash('ChangeSuccess')): ?>
	<div class="alert alert-success">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	    <?php echo Yii::app()->user->getFlash('ChangeSuccess'); ?>
	</div>
<?php endif; ?>
<?php if (isset($organisation) && !empty($organisation)): ?>
  	<form action="<?php echo Yii::app()->baseUrl;?>/admin" method="post">
  	<div class="row">
  		<div class="col-sm-1 control-label">Select organisation:</div>
  		<div class="col-sm-3">
	  		<select name="myOrganisation" class="form-control" id="mySelect">
	  			<option value="Please select" selected>Please select</option>
		  			<?php $organisationCount = count($organisation);
		  			foreach ($organisation as $org):?>
		  				<option value="<?php echo$org->id;?>"> <?php echo$org->name;?></option>
		  			<?php endforeach; ?>
	  		</select>
  		</div>
  	</div>
<?php endif; ?>  	
  	<table class="table table-striped table-hover">
  		<thead >
  			<tr>   
  				<th>Survey name</th>
  				<th>Survey Status</th>
  			</tr>
  		</thead>
  		<tbody>
  		</tbody>
  	</table>
  	<button name="submit" type="submit" value="LiveSurvey" class="btn btn-sm btn-success">Submit</button>
  </form>
  </div>
  <div class="tab-pane" id="editOrg" style="padding:7px;">
  	<div class="row">
  	<div class="col-sm-4">
	  	<form method="post" action="<?php echo Yii::app()->baseUrl;?>/admin/">
	  		<?php
	  			$organisations = \application\models\db\Organisation::model()->findAll();
	  			$orgCount = count($organisations);
	  		?>
		  	<select name="selectOrg" onchange="form.submit()" class="form-control">
		  	<?php foreach($organisations as $org): ?>
		  		<option value="<?php echo$org->id;?>"><?php echo$org->name;?></option>
		  	<?php endforeach; ?>
		  	</select>
	  	</form>
	</div>
</div>
<?php
	if (isset($formOrgEdit)):
	$formOrgEdit->attributes = array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data');
	echo $formOrgEdit->renderBegin();
	$widgetOrgEdit = $formOrgEdit->activeFormWidget;
?>
<br>
	<?php if(Yii::app()->user->hasFlash('succes')): ?>
		<div class="alert alert-success">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	        <?php echo Yii::app()->user->getFlash('succes'); ?>
    	</div>
    <?php endif; ?>
	<h1>Editting <?php echo$formOrgEdit->model->name; ?></h1>
	<div class="row">
		<div class="control-label col-sm-3">Upload your new prizeImg here.</div>
		<div class="col-sm-3">
			<input type="file" name="prizeImg">
		</div>
		<div class="control-label col-sm-3">Enter desc for you image here.</div>
			<div class="col-sm-3">
			<input type="text" name="desc" class="form-control">
			</div>
	</div>
	<br>
	<div class="row">
		<div class="control-label col-sm-3">Terms & conditions.</div>
		<div class="col-sm-4">
			<?php echo $widgetOrgEdit->input($formOrgEdit, 'terms', array('class' => 'form-control') ); ?>
			 <?php echo $widgetOrgEdit->input($formOrgEdit, 'id', array('class' => '') ); ?>
		</div>
	</div>
	<br>
	<div class="row">
	<div class="control-label col-sm-3"></div>
		<div class="col-sm-4">
			<?php echo $widgetOrgEdit->button($formOrgEdit, 'submit', array('class' => 'btn btn-sm btn-success') ); ?>
  		</div>
</div>
<?php 
	$formOrgEdit->renderEnd();
	endif;
?>
</div>

<script>

	var mySelect = document.getElementById('mySelect');
	var tbody = document.getElementsByTagName('tbody');
	var body = document.getElementsByTagName('body');
	var tabContent = document.getElementsByClassName('tab-content');

	mySelect.onchange = function(){

		var xmlhttp = createXMLHttpObj();
	        do {
	            xmlhttp.open('POST','<?php echo Yii::app()->baseUrl;?>/admin/default/sendarray',false);
	            xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	            xmlhttp.send('send='+mySelect.value);
	        }while(xmlhttp.readyState!=4 && xmlhttp.status!=200);
			
			if(xmlhttp.readyState==4 && xmlhttp.status==200){
					// products=JSON.parse(xmlhttp.responseText);
                   var products= [];
                   tr = [];
                   td = [];
                   txt = [];
                   a = [];
                   input = [];

                    products=JSON.parse(xmlhttp.responseText);
                    var productsLength = products.length;
                    console.log(productsLength);
                    tbody[0].innerHTML = '';

                    for (var i=0; i<productsLength; i++){ //Loop that rotates overall number of products.
                    	
                        for (var j=0; j<products[i].length; j++){ // Loop for creating table rows
                            tr[j] = document.createElement('TR');
							
							for (var k=0; k<products[i][j].length; k++){ // Loop for creating table columns ( tds ) and adding info to them.
                                
                                td[k] = document.createElement('TD');
                            	tbody[0].appendChild(tr[j]);
	                            tr[j].appendChild(td[k]);

                            	if (k==1){
                            		
                            		input[k] = document.createElement('input');
                            		input[k].setAttribute('type','checkbox');
                            		input[k].setAttribute('value',products[i][j][k]['id']);
                            		input[k].setAttribute('name','checkboxes[]');
                        			if (products[i][j][k]['active']==1)
                        				input[k].setAttribute('checked', true);
                            		td[k].appendChild(input[k]);
                            		
                            	}
                            	else{
	                            	txt[k] = document.createTextNode(products[i][j][k]);
	                            	td[k].appendChild(txt[k]);
                            	}
                            }

                        }
                    }

                }
	        return false;
	}

	tbody[0].onchange = function(e){
		//var e = event;
		//console.log(e);
		var checkboxes = document.getElementsByName('checkboxes[]');
		var checkboxLength = checkboxes.length;

		for (var h=0; h<checkboxLength; h++)
			checkboxes[h].checked = false;
		//e.preventDefault;

		if (e.explicitOriginalTarget)
			e.explicitOriginalTarget.checked = true;
		else
			e.srcElement.checked = true;
		// (e.)?e.explicitOriginalTarget.checked = true;
	}

	tabContent.onchange = function(){
		tabs = {};
		tabs.push(document.getElementById('organisation'));
		tabs.push(document.getElementById('branch'));
		tabs.push(document.getElementById('survey'));
		tabs.push(document.getElementById('survey'));
		tabs.push(document.getElementById('orgEdit'));

		console.log(tabs);

	}

	function createXMLHttpObj(){
        return (window.XMLHttpRequest)?(new XMLHttpRequest()):(new ActiveXObject('Microsoft.XMLHTTP'));
    }

</script>
