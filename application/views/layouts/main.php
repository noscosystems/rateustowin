<?php
    // Check if the user has a mobile number or an email address, force them to update their details with one if they don't.
    $user = Yii::app()->user->model();
    if(    isset($user)
        && is_object($user)
        && (!$user->email || ($user->email && strpos($user->email, "@example")))
        && !$user->mobile
        && $this->id != "settings"
        && $this->action->id != "personal"){
        Yii::app()->user->setFlash('warning', 'Please update your contact details with a mobile phone number or an email address. This is required.');
        $this->redirect(array('/settings/personal', 'location' => 'login'));
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf8" />
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Bootstrap CSS framework -->
        <?php
            $bootstrap = Yii::app()->assetPublisher->publish(Yii::getPathOfAlias('composer.twbs.bootstrap.dist'));
        ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $bootstrap; ?>/css/bootstrap.min.css" media="all" />
        <!-- <link rel="stylesheet" type="text/css" href="<?php // echo Yii::app()->assetPublisher->publish(Yii::getPathOfAlias('themes.classic.assets') . '/css/styles.css'); ?>" media="all" /> -->
        <script src="https://code.jquery.com/jquery.js"></script>
        <script src="<?php echo $bootstrap; ?>/js/bootstrap.min.js"></script>
        <link href="<?php echo $bootstrap; ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />

        <title>
            <?php
                if(is_string($this->pageTitle) && $this->pageTitle) {
                    echo CHtml::encode($this->pageTitle) . ' &#8212; ';
                }
                echo CHtml::encode(Yii::app()->name);
            ?>
        </title>

        <script>
            var baseUrl = '<?php echo Yii::app()->urlManager->baseUrl; ?>';

            $(document).ready( function(){
                // Enable all elements with the class "pop" to enable twbs popovers
                $('.pop').popover('hide');

            })
        </script>

        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>

    <body>

        <!-- Left Navigation Bar Start -->

            <style type="text/css">
                .sidenav {
                    position: fixed;
                    min-height: 100%;
                    width: 80px;
                    top: 0;
                    left: 0;
                    z-index: 100;
                    background: #333;
                    color: #999;
                    text-align: center;
                    text-shadow: 0px 2px 2px #1a1a1a;
                }
                .sidenav .link {
                    text-align: center;
                    font-size: 2.7em;
                    min-height: 70px;
                    padding-top: 13px;
                }
                .sidenav .link:hover{
                    background: #555;
                }

                .sidenav a {
                    color: #999;
                }

                .sidenav a:hover {
                    color: #999;
                }

                .sidenav .link .label {
                    padding-top: 23px;
                    background: #555;
                    color: #bcbcbc;
                    min-height: 70px;
                    position: relative;
                    margin-top: -67px;
                    margin-left: 80px;
                    text-align: center;
                    font-size: 0.8em;
                    width: 300% !important;
                    display: none;
                    border-radius: 0px !important;
                }

                .sidenav .footer {
                    width: 80px;
                    text-align: center;
                    position: fixed;
                    bottom: 0;
                    left: 0;
                }

                .pop {
                    cursor: pointer;
                }
            </style>

            <?php if(!Yii::app()->user->isGuest): ?>

                <?php $this->renderPartial('//modals/pricelist'); ?>

                <div class="sidenav hidden-print">
                    <div class="link">
                        <?php echo CHtml::link('<span class="glyphicon glyphicon-home"></span>', Yii::app()->homeUrl, array()); ?>
                        <div class="label">Forecast</div>
                    </div>
                    <div class="link">
                        <?php echo CHtml::link('<span class="glyphicon glyphicon-calendar"></span>', array('/calendar'), array()); ?>
                        <div class="label">Calendar</div>
                    </div>
                    <div class="link">
                        <?php echo CHtml::link('<span class="glyphicon glyphicon-user"></span>', array('/enquiry/new'), array()); ?>
                        <div class="label">Enquiry</div>
                    </div>
                    <div class="link">
                        <?php echo CHtml::link('<span class="glyphicon glyphicon-book"></span>', '#pricelist', array('data-toggle' => 'modal')); ?>
                        <div class="label">Price List</div>
                    </div>
                    <?php if(Yii::app()->user->model('level') !== null && Yii::app()->user->model('level') >= 1): ?>
                        <div class="link">
                            <?php echo CHtml::link('<span class="glyphicon glyphicon-cog"></span>', array('/admin'), array()); ?>
                            <div class="label">Admin</div>
                        </div>
                        <div class="link">
                            <?php echo CHtml::link('<span class="glyphicon glyphicon-refresh"></span>', array('/admin/switch'), array()); ?>
                            <div class="label">Switch Branch</div>
                        </div>
                    <?php endif; ?>
                    <div class="link">
                        <?php echo CHtml::link('<span class="glyphicon glyphicon-th"></span>', array('/settings'), array()); ?>
                        <div class="label">My Settings</div>
                    </div>
                    <div class="link">
                        <?php echo CHtml::link('<span class="glyphicon glyphicon-off"></span>', array('/logout'), array()); ?>
                        <div class="label">Logout</div>
                    </div>

                    <div class="footer">
                        <div class="link" id="addNew">
                            <div class="btn-group dropup">
                                <button type="button" class="dropdown-toggle" data-toggle="dropdown" style="background: none; border: none;">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" style="text-shadow: none; text-align: right;">
                                    <li><?php echo CHtml::link('<span class="glyphicon glyphicon-user pull-left"></span> Customer', array(''), array()); ?></li>
                                    <li class="divider"></li>
                                    <li><a href="http://www.klariuswebcat.eu/webforms/frmWebCatHome.aspx?lang=English" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=800,height=800');return false;">Klarius</a></li>
                                    <li><a href="http://www.catalogue.bosal.com/pages/exh_cartype_search.php?ext_backurl=http%3A%2F%" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=800,height=800');return false;">Bosel</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="sidenav hidden-print">
                    <div class="link">
                        <?php echo CHtml::link('<span class="glyphicon glyphicon-home"></span>', Yii::app()->homeUrl, array()); ?>
                        <div class="label">Login</div>
                    </div>
                </div>
            <?php endif; ?>
            <script>
            $(document).ready( function(){
                // Main links
                $(".sidenav > .link").hover(
                function(){
                    // $(this).children(".label").animate({width:250px}, 100);
                    $(this).children(".label").show();
                    // $(this).children(".label").fadeIn('fast');
                }, function() {
                    // $(this).children(".label").animate({width:0px}, 100);
                    $(this).children(".label").hide();
                    // $(this).children(".label").fadeOut('fast');
                });
            });
            </script>

        <!-- Left Navigation Bar End -->

        <div class="container" id="page">
            <br />

            <div class="col-xs-11 col-xs-offset-1">
                <?php if(Yii::app()->user->hasFlash('success')): ?>
                    <div class="alert alert-success">
                        <?php echo Yii::app()->user->getFlash('success'); ?>
                    </div>
                <?php endif; ?>
                <?php if(Yii::app()->user->hasFlash('warning')): ?>
                    <div class="alert alert-warning">
                        <?php echo Yii::app()->user->getFlash('warning'); ?>
                    </div>
                <?php endif; ?>
                <?php if(Yii::app()->user->hasFlash('danger')): ?>
                    <div class="alert alert-danger">
                        <?php echo Yii::app()->user->getFlash('danger'); ?>
                    </div>
                <?php endif; ?>
                <?php echo $content; ?>
            </div>

            <br />

            <div class="clear"></div>
        </div>

    </body>
</html>
