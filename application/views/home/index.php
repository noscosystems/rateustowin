<?php
    /**
     * @var HomeController $this
     */
    $this->pageTitle = false;
    $assetMgr = Yii::app()->assetPublisher;
?>
<style>
#header {
    background-color:lightgray;
    color:white;
    // text-align:center;
     padding:1px;
}
#myDiv img
{
    width:100%;
//max-width:100%; 
//max-height:auto;
//margin:auto;
//display:block;
}
#smiley img
{
    width:20px;
//max-width:100%; 
//max-height:auto;
//margin:auto;
//display:block;
}
</style>

<?php if(empty($question)):?>
    <div align="center">
        <h3>No surveys available currently</h3>
    </div>
<?php else: ?>
<div class="row" align="center">
    <div id="myDiv" class="col-md-12">
    <?php $path = Yii::getPathOfAlias('application.views.Uploads.images');
        
        echo CHtml::image(
            Yii::app()->assetPublisher->publish( $path . '/'. $logoImg->url),
            'Alternative Text',
            array('class' => 'img-responsive')
        );
    ?>
    </div>
    <div class="col-md-offset-4 col-md-8">
        <h1 style="font-weight: bold; text-decoration: underline;">RATE US TO WIN !</h1>
    </div>
    <div class="col-md-4 text-center">
        <?php 
        echo CHtml::image(
            Yii::app()->assetPublisher->publish( $path . '/'. $prizeImg->url),
            'Alternative Text',
            array('class' => 'img-responsive')
        );
        ?>


                    <button
                        type="button"
                        id="pop"
                        class="btn btn-default"
                        data-container="body"
                        data-toggle="popover"
                        data-placement="bottom"
                        data-content="<?php echo$terms;?>">
                      Terms & conditions
                    </button>



    </div>
    <?php $questlength = count($question); ?>
    <div class="col-sm-8">
        <div class="progress">
          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo 100/$questlength;?>%;">
            <span class="sr-only">60% Complete</span>
          </div>
        </div>
    </div>
    
        <?php $pathSmileys = Yii::getPathOfAlias('application.views.Uploads.images.smileys'); ?>
    
    <!-- Tab panes -->
    <div class="tab-content col-sm-8">
        <div class="alert alert-danger" id="fail" style="display:none;">
            <button type="button" class="close" aria-hidden="true">&times;</button>
            
        </div>
        <div class="alert alert-success" id="success" style="display:none;">
            <button type="button" class="close" aria-hidden="true">&times;</button>
            
        </div>
        <?php for ($i=0; $i<$questlength; $i++):?>
        <div class="tab-pane fade <?php echo($i==0)?('active in'):('');?> clicked" id="<?php echo$i; ?>">
            <p><?php echo $question[$i]['questTxt'] ; ?></p>
            <?php if($question[$i]['type'] == 'freetext'): ?>
                <div class="col-sm-12">
                    <input type="text"
                    alt="<?php echo $question[$i]['id'];?>"
                    onchange="javascript:fillAnswers(this);"
                    class="form-control">
                    <a href="#<?php echo($i+1==$questlength)?('Credentials'):($i+1); ?>" role="tab" data-toggle="tab" >Next
                    </a>
                </div>
            <?php else: ?>
                <?php for ($l=0; $l<3; $l++): ?>
                    <div id="smiley" class="col-sm-4">
                        <a href="#<?php echo($i+1==$questlength)?('Credentials'):($i+1); ?>" role="tab" data-toggle="tab" >
                            <input class="img-responsive"
                            value="<?php echo($l==0)?('negative'):(($l==1)?('neutral'):('positive'));?>"
                            type="image"
                            src="<?php echo $assetMgr->publish( $pathSmileys . '/' . ($l == 0 ? 'negative.png' : ($l == 1 ? 'neutral.png' : 'positive.png')) );?>"
                            alt="<?php echo $question[$i]['id'];?>"
                            onclick ="javascript:fillAnswers(this);">
                        </a>
                    </div>
                <?php endfor; ?>
            <?php endif; ?>
        </div>
    <?php endfor; ?>
    <div class="tab-pane fade" id="Credentials">
        <h3>Thank you for completing this survey.</h3>
        <h4>Please enter the following information so we can inform you if you win</h4>
        <div class="row">
        <div class="col-sm-2 col-sm-offset-2 control-label">First Name:</div>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="firstName" >
            </div>
        </div>
        <br>
        <div class="row">
        <div class="col-sm-2 col-sm-offset-2 control-label">Sex:</div>
            <div class="col-sm-6">
                <select type="text" class="form-control" id="sex">
                    <?php foreach($sex as $s): ?>
                        <option value="<?php echo$s->id; ?>"><?php echo$s->name; ?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
        <div class="col-sm-2 col-sm-offset-2 control-label">Age group:</div>
            <div class="col-sm-6">
                <select type="text" class="form-control" id="ageGroup">
                    <?php foreach ($ageGroup as $age): ?>
                        <option value="<?php echo$age->id;?>"><?php echo$age->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
        <div class="col-sm-2 col-sm-offset-2 control-label">Email address:</div>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="email">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-2 col-sm-offset-2">
                <input type="checkbox" id="optIn" checked>
            </div>
            <div class="col-sm-6 control-label" >
                <p>
                    Please  thick this checkbox so we can keep you informed of offers.
                    We will not pass your information to other parties.
                </p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4" style="margin-left:507px;">
                <input type="hidden" value="<?php echo$question[0]['surveyId']; ?>" id="surveyId">
                <button class="btn btn-primary btn-md" onclick="javascript:save();"id="saveButt">Save</button>
            </div>
        </div>
    </div>
</div>

<script>

$(function(){
    $("#pop").popover('hide'); 
});

    var answers = {};
    var answersJSON;
    var myClickable = document.getElementById('myClickable');
    var panes       = document.getElementsByClassName('tab-pane');
    var progBar     = document.getElementsByClassName('progress-bar');
    var progBarThick = 100/(panes.length - 1);
    
    function fillAnswers (elem){
        answers[elem.alt] = elem.value;
        // var key = ;
        // var val = elem.value;
        // answers.push({elem.alt:elem.value});
        var currProgBarVal = progBar[0].style.width;
        currProgBarVal = parseFloat(currProgBarVal.substring(0, currProgBarVal.length - 1));
        currProgBarVal = currProgBarVal+progBarThick;
        progBar[0].style.width = currProgBarVal += '%';
        console.log(answers) ;
    }

    function save(){
        
        var surveyId = document.getElementById('surveyId');
        var firstName = document.getElementById('firstName');
        var sex = document.getElementById('sex');
        var ageGroup= document.getElementById('ageGroup');
        var email = document.getElementById('email');
        var optIn = document.getElementById('optIn');
        var saveButt = document.getElementById('saveButt');
        var success = document.getElementById('success');
        var fail = document.getElementById('fail');
        var myAlertDiv = document.getElementById('myAlertDiv');
        var closeButt = document.createElement('BUTTON');
            closeButt.innerHTML ='&times;';
            closeButt.setAttribute('class','close');
            closeButt.setAttribute('aria-hidden','true');
            closeButt.setAttribute('onclick',"parentNode.style.display='none';parentNode.innerHTML = '';");

       answers['customer']={
            surveyId:surveyId.value,
            firstName:firstName.value,
            sex:sex.value,
            ageGroup:ageGroup.value,
            email:email.value,
            optIn:optIn.checked
        };

        answersJSON = JSON.stringify(answers);
        console.log(answersJSON);

        var xmlhttp = xmlHttpReq();

        do{
            xmlhttp.open("POST","<?php echo Yii::app()->baseURL; ?>/home/fillanswersheet",false);
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlhttp.send("answers="+answersJSON);
        }while (xmlhttp.readyState!=4 && xmlhttp.status!=200);

        if (xmlhttp.readyState==4 && xmlhttp.status==200){

            if (xmlhttp.responseText){
                var errors = JSON.parse(xmlhttp.responseText);
                if (typeof(errors) == 'object'){
                    console.log(typeof (errors));
                    fail.innerHTML = '';
                    var loopEnd = errors.length;
                    for (var i=0; i<loopEnd; i++){
                        fail.appendChild(closeButt);
                        fail.innerHTML+=errors[i];
                        fail.style.display = 'block';
                    }
                }
                else{
                    success.innerHTML = '';
                    success.innerHTML = errors;
                    success.appendChild(closeButt);
                    success.style.display = 'block';
                }
            }
        }
    }

    function xmlHttpReq(){
        return (window.XMLHttpRequest)?(new XMLHttpRequest()):(new ActiveXObject("Microsoft.XMLHTTP"));
    }




</script>
<?php endif; ?>
