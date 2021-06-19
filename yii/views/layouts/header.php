<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header style="background:#222d32;" class="main-header">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- <= Html::a('<span class="logo-mini" style="background-image: url(/iconblue2.ico);height:40px;width:40px;background-position:center;background-size:contain;"></span><span style="background:#222d32;text-align:left;" class="logo-lg"><img class="lazyload" src="/iconblue2.ico" style="height:40px;text-align:left;"></span>', Yii::$app->homeUrl, ['class' => 'logo', 'style' => 'background:#222d32;text-align:left;']) ?> -->

    <nav class="navbar navbar-static-top" style="background:#222d32;" role="navigation">

        <a  style="background:#222d32;" href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">


                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs"><i class="fas fa-circle text-success"></i>&nbsp;<?php print_r(Yii::$app->user->identity->username);?></span>&nbsp;<i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-footer">
                                <?= Html::a(
                                    'Log out',
                                    ['/Xthehiddenphiloclstadminurlx/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
