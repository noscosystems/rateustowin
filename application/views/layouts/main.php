<?php
    use CHtml as Html;
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf8" />
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Bootstrap CSS framework -->
        <?php $bootstrap = Yii::app()->assetPublisher->publish(Yii::getPathOfAlias('composer.twbs.bootstrap.dist')); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $bootstrap; ?>/css/bootstrap.min.css" media="all" />
        <script src="<?php echo $bootstrap; ?>/js/bootstrap.min.js"></script>
        <link href="<?php echo $bootstrap; ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />

        <title>Rate us to win!
        </title>

        <script>
            //<![CDATA[
                var baseUrl = '<?php echo Yii::app()->urlManager->baseUrl; ?>';
            //]]>
        </script>
        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>

    <body>
        <div id="wrapper">
            <div align="right">
                <?php echo CHtml::link('Admin', array('/admin'), array('style'=>'color:#CCC;')); ?>
            </div>
            <?php if(isset(Yii::app()->user->priv)): ?>
            <?php if(Yii::app()->user->priv>0): ?>
                <nav class="navbar navbar-default" role="navigation">
                  <div class="container-fluid">

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                        <li><a href="admin">Admin</a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Stats <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/stats/?choose=download">Download</a></li>
                            <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin/stats/?choose=view">View</a></li>
                          </ul>
                        </li>
                      </ul>
                      <ul class="nav navbar-nav navbar-right">
                        <li><a href="home">Home</a></li>
                        <li><a href="/logout">Logout</a></li>
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
            <?php endif; ?>
            <?php endif; ?>
            <!-- Navigation-- >
<?php /****************************************************************************************************************
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#rutw-navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><?php echo Html::encode(Yii::app()->name); ?></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="rutw-navbar-collapse">
                        <ul class="nav navbar-nav">
                            <?php
                                $this->widget('zii.widgets.CMenu', array(
                                    'items' => array(
                                        array('label' => 'Home', 'url' => array('/')),
                                        array('label' => 'Another Link', 'url' => '#'),
                                        array('label' => 'Dropdown', 'url' => '#', 'items' => array(
                                            array('label' => 'Link', 'url' => '#'),
                                            array('label' => 'Another Link', 'url' => '#'),
                                        )),
                                    ),
                                    'activateItems'         => true,
                                    'activateParents'       => true,
                                    'activeCssClass'        => 'active',
                                    'encodeLabel'           => false,
                                    'htmlOptions'           => array('class' => 'nav navbar-nav'),
                                    'submenuHtmlOptions'    => array('class' => 'dropdown-menu'),
                                ));
                            ?>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <?php if(Yii::app()->user->isGuest): ?>
                                <li><?php echo Html::link('Login', array('/login')); ?>
                            <?php else: ?>
                                <li class="dropdown">
                                    <?php
                                        echo Html::link(
                                            Html::encode(Yii::app()->user->model('fullName'))
                                                . ' <span class="caret"></span>',
                                            array('/profile', 'id' => Yii::app()->user->id)
                                        );
                                    ?>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Profile</a></li>
                                        <li><a href="#">Settings</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><?php echo Html::link('Logout', array('/logout')); ?></li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <li><a href="#">Link</a></li>

                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>


            <!-- Breadcrumbs -->
            <div class="container">
                <ol class="breadcrumb">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Library</a></li>
                    <li><a href="admin">Admin</a></li>
                </ol>
            </div>
****************************************************************************************************************/?>
            <!-- Main Content -->
            <div class="content container" role="main">
                <?php echo $content; ?>
            </div>

            
        </div>
        <!-- Footer -->
            <div class="container" align="center" style="left:0; bottom:0; position:relative;">
                        © Nosco Systems 2014
            </div>
        <!-- End of Footer -->
    </body>
</html>
