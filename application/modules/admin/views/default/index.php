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
  <li><a href="#selectedSurvey" role="tab" data-toggle="tab">Selected survey to make live</a></li>
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
    </div>
<?php echo $formSurvey->renderEnd(); ?>
</div>
  <div class="tab-pane" id="selectedSurvey" style="padding:7px;">
  	<form action="/rateustowin/public_html/admin" method="post">
  	<div class="row">
  		<div class="col-sm-1 control-label">Select organisation:</div>
  		<div class="col-sm-3">
	  		<select name="myOrganisation" class="form-control" id="mySelect">
	  			<option value="Please select" selected>Please select</option>
	  			<?php for ($i=0; $i<count($organisation); $i++):?>
	  			<option value="<?php echo$organisation[$i]->id;?>"> <?php echo$organisation[$i]->name;?></option>
	  			<?php endfor; ?>
	  		</select>
  		</div>
  	</div>
  	
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

</div>
<script src="https://code.jquery.com/jquery.js"></script>
<script>

	var mySelect = document.getElementById('mySelect');
	var tbody = document.getElementsByTagName('tbody');

	mySelect.onchange = function(){

		var xmlhttp = createXMLHttpObj();
	        do {
	            xmlhttp.open('POST','<?php echo Yii::app()->baseUrl;?>/admin/default/sendArray',false);
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
                    console.log(products);
                    tbody[0].innerHTML = '';

                    for (var i=0; i<products.length; i++){ //Loop that rotates overall number of products.
                    	console.log(products[i]);
                        for (var j=0; j<products[i].length; j++){ // Loop for creating table rows
                            tr[j] = document.createElement('TR');

                            console.log('Value of j is: '+j);
                     
                            for (var k=0; k<products[i][j].length; k++){ // Loop for creating table columns ( tds ) and adding info to them.
                                
                                console.log('VALUE OF K IS: '+k);
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

	var checkboxes = document.getElementsByName('checkboxes[]');

	tbody[0].onchange = function(e){
		//console.log(e);
		for (var h=0; h<checkboxes.length; h++)
			checkboxes[h].checked = false;
		e.srcElement.checked = true;
	}

	function createXMLHttpObj(){
        return (window.XMLHttpRequest)?(new XMLHttpRequest()):(new ActiveXObject('Microsoft.XMLHTTP'));
    }

</script>
