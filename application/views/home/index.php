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
    <?php echo CHtml::image(Yii::app()->baseUrl.$assetMgr->embed($logoImg->url), 'alt', array('class'=> 'img-responsive')); ?>
    <pre>
    </pre>
    
</div>