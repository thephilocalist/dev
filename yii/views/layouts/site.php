<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <base href="<?=Url::base(true)?>">
    <link rel="stylesheet" href="<?=Url::base(true)?>/css/app.css">
    <script src="https://kit.fontawesome.com/deecf005d3.js" crossorigin="anonymous"></script>
    <link rel="canonical" href="<?=Url::base(true)?>" />
</head>
<body>
<?php $this->beginBody() ?>
    <!-- Start Navigation Menu -->
    <div class="navigation-bar">
      <div class="column large-8 medium-6">
        <ul class="menu dropdown" data-accordion-menu>
          <li class="nav-btn"><i class="fa fa-bars" data-toggle="offCanvasMenu" aria-hidden="true"></i></li>
          <li class="show-for-medium"><a href="<?=Url::base(true)?>" class="nav-logo"><img src="<?=Url::base(true)?>/images/the_philocalist.png" ></a></li>
        </ul>
      </div>
      <div class="column large-4 medium-6 show-for-medium">
        <ul class="menu float-right">
          <?php foreach($this->params['socials'] as $social):?>
          <?php if($social->name == 'facebook'):?>
            <li><a href="<?=$social->link;?>"><i class="fab fa-facebook-f"></i></a></li>
          <?php elseif($social->name == 'instagram'):?>
            <li><a href="<?=$social->link;?>"><i class="fab fa-instagram"></i></a></li>
          <?php elseif($social->name == 'twitter'):?>
            <li><a href="<?=$social->link;?>"><i class="fab fa-twitter"></i></a></li>
          <?php else:?>
            <li><a href="<?=$social->link;?>"><i class="fab fa-pinterest"></i></a></li>
          <?php endif;?>
          <?php endforeach;?>
          <li><a href="mailto:contact@thephilocalist.gr?subject='Website Contact'"><i class="fas fa-envelope"></i></a></li>
          <li>
            <form class="d-flex" action="<?=Url::base(true)?>/search" method="get">
              <button class="button search-button" type="button" data-toggle="example-dropdown-bottom-right1"><i class="fas fa-search"></i></button>
              <div class="dropdown-pane bottom" data-alignment="right" id="example-dropdown-bottom-right1" data-dropdown>
                <input type="search" name="q" placeholder="Search Article..." data-auto-focus="true">
              </div>
            </form>
          </li>
        </ul>
      </div>
      <!-- Start OffCanvas Menu -->
      <div class="grid-x grid-margin-x">
        <div class="off-canvas position-left" id="offCanvasMenu" data-off-canvas>
          <ul class="vertical dropdown menu accordion-menu" data-accordion-menu>
            <li><span data-toggle="offCanvasMenu" aria-hidden="true">×</span></li>
            <li class="m-b-10"><a href="index.html"><img class="offcanva-logo" src="<?=Url::base(true)?>/images/logo_black.png"></a></li>
            <li><a href="<?=Url::base(true)?>">HOME</a></li>
            <?php foreach($this->params['categories'] as $category):?>
            <li><a href="<?=Url::base(true)?>/category/<?=$category->slug?>"><?=strtoupper($category->title);?></a></li>
            <?php endforeach;?>
            <li class="padding-a find"><p class="m-0 p-l-10">FIND US</u></p></li>
          <?php foreach($this->params['socials'] as $social):?>
          <?php if($social->name == 'facebook'):?>
            <li><a href="<?=$social->link;?>"><i class="fab fa-facebook-f"></i>&nbsp;&nbsp;<?=strtoupper($social->name);?></a></li>
          <?php elseif($social->name == 'instagram'):?>
            <li><a href="<?=$social->link;?>"><i class="fab fa-instagram"></i>&nbsp;&nbsp;<?=strtoupper($social->name);?></a></li>
          <?php elseif($social->name == 'twitter'):?>
            <li><a href="<?=$social->link;?>"><i class="fab fa-twitter"></i>&nbsp;&nbsp;<?=strtoupper($social->name);?></a></li>
          <?php else:?>
            <li><a href="<?=$social->link;?>"><i class="fab fa-pinterest"></i>&nbsp;&nbsp;<?=strtoupper($social->name);?></a></li>
          <?php endif;?>
          <?php endforeach;?>
            <li><a href="mailto:contact@thephilocalist.gr?subject='Website Contact'"><i class="fas fa-envelope"></i>&nbsp;&nbsp;EMAIL</a></li>
            <li class="padding-a d-flex">
              <form class="d-flex" action="<?=Url::base(true)?>/search" method="get">
                <button class="button search-button" type="button"><i class="fas fa-search"></i></button>
                <input type="search" name="q" placeholder="Search Article..." data-auto-focus="true">
              </form>
            </li>
          </ul>
        </div>
      </div>
      <!-- End OffCanvas Menu -->
    </div>
    <!-- End Navigation Menu -->

    <!-- Start Sticky Navigation Menu -->
    <div class="sticky-navigation-bar show-for-medium">
      <ul class="menu">
        <li class=""><a><i class="fa fa-bars f-s-16" data-toggle="offCanvasMenu" aria-hidden="true"></i></a></li>
        <li class="show-for-medium"><a href="<?=Url::base(true)?>" class="nav-logo"><img class="" src="<?=Url::base(true)?>/images/the_philocalist.png" ></a>
        <?php $i=0; foreach($this->params['categories'] as $category):?>
          <?php $i=$i+1; if($i==1):?>
          <li class="m-l-auto"><a href="<?=Url::base(true)?>/category/<?=$category->slug?>"><?=strtoupper($category->title);?></a></li>
          <?php elseif($i== count($this->params['categories'])):?>
          <li class="m-r-auto"><a href="<?=Url::base(true)?>/category/<?=$category->slug?>"><?=strtoupper($category->title);?></a></li>
          <?php else:?>
          <li><a href="<?=Url::base(true)?>/category/<?=$category->slug?>"><?=strtoupper($category->title);?></a></li>
          <?php endif;?>
        <?php endforeach;?>
        <li class="m-l-auto">
          <button class="button search-button" type="button" data-toggle="example-dropdown-bottom-right3"><i class="fas fa-search"></i></button>
          <div class="dropdown-pane bottom" data-alignment="right" id="example-dropdown-bottom-right3" data-dropdown>
            <input type="search" placeholder="Search Article..." data-auto-focus="true">
          </div>
        </li>
      </ul>
    </div>
    <!-- End Sticky Navigation Menu -->

    <!-- Start ToTop -->
    <div class="totop"> 
      <a id="top" href="#top"><i class="fas fa-arrow-alt-circle-up"></i></a> 
    </div>
    <!-- End ToTop -->

    <?= $content ?>

    <!-- Start Footer -->
    <div class="clearfix"></div>
    <footer>
    <div class="row">
        <div class="column large-4 medium-4 small-12">
        <a href="<?=Url::base(true)?>"><img class="footer-logo" src="<?=Url::base(true)?>/images/logo_full.png"></a>
        </div>
        <div class="column large-4 medium-4 small-12">
        <ul class="vertical dropdown menu accordion-menu p-inherit" data-accordion-menu>
          <li><a href="<?=Url::base(true)?>">HOME</a></li>
          <?php foreach($this->params['categories'] as $category):?>
          <li><a href="<?=Url::base(true)?>/category/<?=$category->slug?>"><?=strtoupper($category->title);?></a></li>
          <?php endforeach;?>
        </ul>
        </div>
        <div class="column large-4 medium-4 small-12">
        <div class="spacer-90"></div>
        <ul class="vertical dropdown menu accordion-menu p-inherit" data-accordion-menu>
            <li>FIND US</li>
        </ul>
        <ul class="horizontal menu footer-social">
          <?php foreach($this->params['socials'] as $social):?>
          <?php if($social->name == 'facebook'):?>
            <li><a href="<?=$social->link;?>"><i class="fab fa-facebook-f"></i></a></li>
          <?php elseif($social->name == 'instagram'):?>
            <li><a href="<?=$social->link;?>"><i class="fab fa-instagram"></i></a></li>
          <?php elseif($social->name == 'twitter'):?>
            <li><a href="<?=$social->link;?>"><i class="fab fa-twitter"></i></a></li>
          <?php else:?>
            <li><a href="<?=$social->link;?>"><i class="fab fa-pinterest"></i></a></li>
          <?php endif;?>
          <?php endforeach;?>
            <li><a href="mailto:contact@thephilocalist.gr?subject='Website Contact'"><i class="fas fa-envelope"></i></a></li>
        </ul>  
        </div>
    </div>
    <div class="spacer-30"></div>
    <p class="text-center">© 2021 The Philocalist All rights are reserved</p>
    <div class="clearfix"></div>      
    </footer>
    <!-- End Footer -->

    <?php $this->endBody() ?>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.boomcdn.com/libs/owl-carousel/2.3.4/owl.carousel.min.js"></script>
    <script src="<?=Url::base(true)?>/js/app.js"></script>
    <script src="<?=Url::base(true)?>/js/site.js"></script>
</body>
</html>
<?php $this->endPage(); ?>