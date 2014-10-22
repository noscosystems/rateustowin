<?php
    /**
     * @var LoginController $this
     * @var CForm           $form
     */
    $this->pageTitle = Yii::t('application', 'Login');
    $this->breadcrumbs = array(
        $this->pageTitle,
    );
?>

<?php
    $form->attributes = array('class' => 'form-horizontal');
    echo $form->renderBegin();
    $widget = $form->activeFormWidget;
?>
<fieldset>

    <br /><br />

    <div class="row">
        <div class="col-sm-offset-2 col-sm-6">
            <span style="font-size:48px;">Rate us to win!</span>
        </div>
    </div>

    <br />

    <div class="form-group <?php echo $widget->error($form, 'username') ? 'has-error' : ''; ?>">
        <?php echo $widget->labelEx($form, 'username', array('class' => 'col-xs-12 col-sm-2 control-label')); ?>
        <div class="col-xs-12 col-sm-4">
            <?php echo $widget->input($form, 'username', array('class' => 'form-control', 'autofocus' => 'true')); ?>
            <?php echo $widget->error($form, 'username', array('class' => 'help-block')) ?: ''; ?>
        </div>
    </div>

    <div class="form-group <?php echo $widget->error($form, 'password') ? 'has-error' : ''; ?>">
        <?php echo $widget->labelEx($form, 'password', array('class' => 'col-xs-12 col-sm-2 control-label')); ?>
        <div class="col-xs-12 col-sm-4">
            <?php echo $widget->input($form, 'password', array('class' => 'form-control')); ?>
            <?php echo $widget->error($form, 'password', array('class' => 'help-block')) ?: ''; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-2">
            <div class="col-sm-2">
                <?php echo $widget->button($form, 'submit', array('class' => 'btn btn-primary form-control')); ?>
            </div>
            <div class="col-sm-2">
                <?php echo CHtml::link('Forgot Password', array('/forgot/index'), array('class' => 'btn btn-link')); ?>
            </div>
        </div>
    </div>

</fieldset>
<?php echo $form->renderEnd(); ?>
