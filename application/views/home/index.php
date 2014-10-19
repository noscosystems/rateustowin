<?php
    /**
     * @var HomeController $this
     */
    $this->pageTitle = false;
    $assetMgr = Yii::app()->assetPublisher;
?>

<div class="row" align="center">
    <?php $path = Yii::getPathOfAlias('application.views.Uploads.images');
        
        echo CHtml::image(
            Yii::app()->assetPublisher->publish( $path . '/'. $logoImg->url),
            'Alternative Text',
            array('class' => 'img-responsive')
        );
    ?>
    <div class="col-md-offset-4 col-md-8">
        <h1 style="font-weight: bold; text-decoration: underline;">RATE US TO WIN !</h1>
    </div>
    <div class="col-md-4">
        <?php 
        echo CHtml::image(
            Yii::app()->assetPublisher->publish( $path . '/'. $prizeImg->url),
            'Alternative Text',
            array('class' => 'img-responsive')
        );
        ?>
    </div>
    <?php $questlength = count($question); ?>
    <div class="col-md-8">
        <div class="progress">
          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo 100/$questlength;?>%;">
            <span class="sr-only">60% Complete</span>
          </div>
        </div>
    </div>
    
        <?php $pathSmileys = Yii::getPathOfAlias('application.views.Uploads.images.smileys'); ?>
    <ul class="nav nav-tabs" role="tablist"> <!-- class for navbar: nav nav-tabs -->
        <?php for ($j=0; $j<$questlength; $j++):?>
            <!--<script>//console.log(<?php //echo $j;?>)</script> -->
            <li class="<?php echo($j==0)?('active'):('');?>">
            <!-- <a href="#<?php //echo$i; ?>" role="tab" data-toggle="tab">Home</a> -->
        <?php endfor; ?>
    </li>
    <!-- Tab panes -->
    <div class="tab-content row col-sm-8" id="myClickable">
        <?php for ($i=0; $i<$questlength; $i++):?>
        <div class="tab-pane fade <?php echo($i==0)?('active in'):('');?> clicked" value="<?php echo $question[$i]['id']; ?>" id="<?php echo$i; ?>">
            <p><?php echo $question[$i]['questTxt'] ; ?></p>
            <?php if($question[$i]['type'] == 'freetext'): ?>
                <div class="col-sm-12">
                    <input type="text"
                    alt="<?php echo $question[$i]['id'].',';?>"
                    class="form-control">
                    <a href="#<?php echo($i+1); ?>" role="tab" data-toggle="tab" >Next
                    </a>
                </div>
            <?php else: ?>
                <?php for ($l=0; $l<3; $l++): ?>
                    <div class="col-sm-4">
                        <a href="#<?php echo($i+1); ?>" role="tab" data-toggle="tab" >
                            <input class="img-responsive"
                            title="<?php echo $question[$i]['id'].',';echo($l==0)?('negative'):(($l==1)?('neutral'):('positive'));?>"
                            type="image"
                            src="<?php echo $assetMgr->publish( $pathSmileys . '/' . ($l == 0 ? 'negative.png' : ($l == 1 ? 'neutral.png' : 'positive.png')) );?>">
                        </a>
                    </div>
                <?php endfor; ?>
            <?php endif; ?>
    </div>
    <?php endfor; ?>
</div>

<script>
    var answers = [];
    var answersJSON;
    var myClickable = document.getElementById('myClickable');
    var ocurredEvent;

    myClickable.onclick = function(e){
        if (e){
            if (e.srcElement.alt!=''){
                if (e.explicitOriginalTarget)
                    var el = e.explicitOriginalTarget;
                else
                    var el = e.srcElement;

                // var str = el.value;
                // var el1 = str.split(',');
                // console.log(el1);
                // if (el1[1] == '')
                    answers[el.alt] = el.value;
                // answers[el1[0]] = el1[1];
                console.log(answers);
            }
            else {
               if (e.explicitOriginalTarget)
                    var el = e.explicitOriginalTarget;
                else
                    var el = e.srcElement;

                var str = el.title;
                var el1 = str.split(',');
                // console.log(el1);

                answers[el1[0]] = el1[1];
                console.log(answers); 
            }
        }
        
    }
        
    
    // myClickable.onchange = function(e){

    //         if (e.explicitOriginalTarget)
    //             var el = e.explicitOriginalTarget;
    //         else
    //             var el = e.srcElement;

    //         var str = el.title;
    //         var el1 = str.split(',');

    //         if (el1[1]=='')
    //             answers[el1[0]] = el.value;
    //         else
    //             answers[el1[0]] = el1[1];
    //         console.log(answers);
    //         ocurredEvent = '';
    // }

        
        
    




    function srcElem (e) {
        return (e.explicitOriginalTarget)?(e.explicitOriginalTarget):(e.srcElement);
    }

//     if (e.explicitOriginalTarget)
        //         var el = e.explicitOriginalTarget;
        //     else
        //         var el = e.srcElement;
        //     var str = el.title;
        //     var el1 = str.split(',');
        //     console.log(el1);

        //     answers[el1[0]] = el1[1];
        //     console.log(answers);

/****************************************************************
    function send(el){
        if (answers.push( el )){
            answersJSON = JSON.(answers);
            console.log(answersJSON);
            return true;
        }
        else
            return false;
    }
****************************************************************/

// srcElem1.onblur = function (event2){
//             var srcElem2 = srcElem(event2);
//             var str = srcElem2.title;
//             var el1 = str.split(',');
//             if (el1[1]=='')
//                 el1[1] = srcElem2.value;
//             answers[el1[0]] = el1[1];
//             console.log(answers);
//         }
</script>

