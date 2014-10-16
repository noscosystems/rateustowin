<?php
    /**
     * @var HomeController $this
     */
    $this->pageTitle = false;
    $assetMgr = Yii::app()->assetPublisher;
?>

<div class="row">
    <?php
        $organisation = \application\models\db\Organisation::model()->findByPk(3);
        $logoImg = $organisation->LogoImg;
    ?>
    <?php
        echo CHtml::image(
            // The asset publisher requires that a filepath, not a URL, is supplied. It will then take that file and put
            // it in a folder that's accessible to website visitors (it returns the URL of the newly created, web-accessible file).
            // For example, you could specify the application path of where the file is and pass it to the asset publisher:
            // Yii::app()->assetPublisher->publish(Yii::getPathOfAlias('application.views.Uploads.images') . '/image.png');
            //
            // If the file is already inside the webroot (public_html), then you don't need to use the asset publisher
            // as it is already accessible to website visitors, just pass the URL directly to CHtml::image().
            Yii::app()->assetPublisher->publish('file/path/to/image.png'),

            // Alternative text, required for accessibility-valid HTML.
            'Alternative Text',

            // HTML Options.
            array('class' => 'img-responsive')
        );
    ?>
    <?php echo CHtml::image(Yii::app()->baseUrl.$assetMgr->embed($logoImg->url), 'alt', array('class'=> 'img-responsive')); ?>
    <pre>
    </pre>

</div>
