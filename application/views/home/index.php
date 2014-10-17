<?php
    /**
     * @var HomeController $this
     */
    $this->pageTitle = false;
    $assetMgr = Yii::app()->assetPublisher;
    // Yii::app()->theme->basePath . '/assets';
    // $assetUrl = $assetMgr->publish();
?>

<div class="row" align="center">
    <?php $path = Yii::getPathOfAlias('application.views.Uploads.images');
        
        echo CHtml::image(
            // The asset publisher requires that a filepath, not a URL, is supplied. It will then take that file and put
            // it in a folder that's accessible to website visitors (it returns the URL of the newly created, web-accessible file).
            // For example, you could specify the application path of where the file is and pass it to the asset publisher:
            // Yii::app()->assetPublisher->publish(Yii::getPathOfAlias('application.views.Uploads.images') . '/image.png');
            //
            // If the file is already inside the webroot (public_html), then you don't need to use the asset publisher
            // as it is already accessible to website visitors, just pass the URL directly to CHtml::image().
            Yii::app()->assetPublisher->publish( $path . '/'. $logoImg->url),

            // Alternative text, required for accessibility-valid HTML.
            'Alternative Text',

            // HTML Options.
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
    <div class="tab-content row col-sm-8">
        <?php for ($i=0; $i<$questlength; $i++):?>
        <div class="tab-pane fade <?php echo($i==0)?('active in'):('');?>" id="<?php echo$i; ?>">
            <p><?php echo $question[$i]['questTxt'] ; ?></p>
            <?php for ($l=0; $l<3; $l++): ?>
                <div class="col-sm-4">
                    <a value="<?php echo ($l==0)?('negative'):(($l==1)?('neutral'):('positive'));?>" href="#<?php echo($i+1); ?>" role="tab" data-toggle="tab">
                        <img class="img-responsive" src="<?php echo $assetMgr->publish( $pathSmileys . '/' . ($l == 0 ? 'negative.png' : ($l == 1 ? 'neutral.png' : 'positive.png')) );?>" >
                    </a>
                </div>
                
            <?php endfor; ?>
    </div>
    <?php endfor; ?>
</div>

