<?php
    /**
     * @var HomeController $this
     */
    $this->pageTitle = false;
    $assetMgr = Yii::app()->assetPublisher;
?>

<div class="row" align="center">
    <?php
        $organisation = \application\models\db\Organisation::model()->findByPk(3);
        $logoImg = $organisation->LogoImg;
        $prizeImg = $organisation->PrizeImg;

        echo CHtml::image(
            // The asset publisher requires that a filepath, not a URL, is supplied. It will then take that file and put
            // it in a folder that's accessible to website visitors (it returns the URL of the newly created, web-accessible file).
            // For example, you could specify the application path of where the file is and pass it to the asset publisher:
            // Yii::app()->assetPublisher->publish(Yii::getPathOfAlias('application.views.Uploads.images') . '/image.png');
            //
            // If the file is already inside the webroot (public_html), then you don't need to use the asset publisher
            // as it is already accessible to website visitors, just pass the URL directly to CHtml::image().
            Yii::app()->assetPublisher->publish(Yii::getPathOfAlias('application.views.Uploads.images') . '/'.$logoImg->url),

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
            Yii::app()->assetPublisher->publish(Yii::getPathOfAlias('application.views.Uploads.images') . '/'.$prizeImg->url),
            'Alternative Text',
            array('class' => 'img-responsive')
        );
        ?>
    </div>
    <div class="col-md-8">
        <div class="progress">
          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
            <span class="sr-only">60% Complete</span>
          </div>
        </div>
    </div>
    <?php $surveys = $organisation->Surveys;?>
    <pre>
        <?php var_dump($surveys); ?>
    </pre>
<?php for ($i=0; $i<3; $i++):?>
    <ul class="nav nav-tabs" role="tablist" style="display:none">
      <li class="active">
        <a href="#home" role="tab" data-toggle="tab">Home</a>
    </li>
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="home">A</div>
    </div>
<?php endfor; ?>
</div>

