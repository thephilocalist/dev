<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

AppAsset::register($this);

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?=Url::base(true)?>">
    <link rel="shortcut icon" href="<?=Url::base(true)?>/images/favicon.ico" type="img/x-icon" />

    <!-- Start Meta -->
    <title><?= Html::encode($this->params['title'])?></title>
    <meta name="description" content="<?=$this->params['description']?>">
    <meta name="keywords" content="<?=$this->params['keywords']?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= Html::encode($this->params['title'])?>">
    <meta property="og:title" content="<?= Html::encode($this->params['title'])?>">
    <meta property="og:description" content="<?= Html::encode($this->params['description'])?>">
    <meta property="og:url" content="<?= Html::encode($this->params['url'])?>">
    <meta property="og:image" content="<?=Url::base(true)?>/images/<?=$this->params['image']?>.jpg">
    <meta itemprop="title" content="<?= Html::encode($this->params['title'])?>">
    <meta itemprop="description" content="<?= Html::encode($this->params['description'])?>">
    <meta itemprop="image" content="<?= Html::encode($this->params['image'])?>">
    <meta itemprop="url" content="<?=$this->params['url']?>">
    <!-- End Meta -->

    <link rel="stylesheet" href="<?=Url::base(true)?>/css/app.css">
    <script src="https://kit.fontawesome.com/deecf005d3.js" crossorigin="anonymous"></script>    
    <link rel="canonical" href="<?=Url::base(true)?>" />
</head>
<body>
<?php $this->beginBody() ?>
    <!-- Start Navigation Menu -->
    <div class="navigation-bar">
      <div class="column large-3 medium-2 small-2">
        <i class="fa fa-bars" data-toggle="offCanvasMenu" aria-hidden="true"></i>
      </div>
      <div class="column large-6 medium-8 show-for-medium">
        <a href="<?=Url::base(true)?>"><img class="header-logo" src="<?=Url::base(true)?>/images/FINAL_Title.png"></a>
        <ul class="menu max-width">
          <li><a href="<?=Url::base(true)?>">Home</a></li>
          <?php foreach($this->params['categories'] as $category):?>
          <li><a href="<?=Url::base(true)?>/category/<?=$category->slug?>"><?=$category->title?></a></li>
          <?php endforeach;?>
          <li><a href="<?=Url::base(true)?>/about">About</a></li>
        </ul>
      </div>
      <div class="column small-8 show-for-small-only">
        <a href="<?=Url::base(true)?>"><img class="header-logo" src="<?=Url::base(true)?>/images/FINAL_Title.png"></a>
      </div>
      <div class="column large-3 medium-2 small-2"> 
        <a href="<?=Url::base(true)?>/search" class="button search-button float-right" type="button" data-toggle="example-dropdown-bottom-right1"><i class="fas fa-search"></i></a>
      </div>
      <!-- Start OffCanvas Menu -->
      <div class="off-canvas position-top" id="offCanvasMenu" data-off-canvas>
        <div class="show-for-medium">
          <span data-toggle="offCanvasMenu" aria-hidden="true">×</span>
          <div class="clearfix"></div>
          <div class="row">
            <div class="offCanvasMenu-wrapper">
              <div class="columns large-up-2 medium-up-2 small-up-1">
                <div class="column">
                  <ul class="vertical dropdown menu accordion-menu align-left" data-accordion-menu><br>
                    <?php foreach($this->params['categories'] as $category):?>
                    <li><a class="f-s-48" href="<?=Url::base(true)?>/category/<?=$category->slug?>"><?=$category->title?></a></li>
                    <?php endforeach;?>
                  </ul>
                </div>
                <div class="column">
                  <ul class="vertical dropdown menu accordion-menu align-right" data-accordion-menu>
                    <li><a class="f-s-36" href="<?=Url::base(true)?>">Home</a></li>
                    <li><a class="f-s-36 f-m-ubuntu">Επικοινωνία</a><br></li>
                    <li><a class="f-s-36" href="<?=Url::base(true)?>"><img class="offcanvas-logo" src="<?=Url::base(true)?>/images/Logo_Icon.png"></a><br></li> 
                    <li><p class="f-s-36 m-b-0">Follow Us</p></li>
                    <li class="d-flex">
                    <?php foreach($this->params['socials'] as $social):?>
                      <?php if($social->name == 'facebook'):?>
                      <a href="<?=$social->link;?>"><i class="fab fa-facebook"></i></a>
                      <?php elseif($social->name == 'pinterest'):?>
                      <a href="<?=$social->link;?>"><i class="fab fa-pinterest"></i></a>
                      <?php elseif($social->name == 'instagram'):?>
                      <a href="<?=$social->link;?>"><i class="fab fa-instagram"></i></a>
                      <?php elseif($social->name == 'twitter'):?>
                      <a href="<?=$social->link;?>"><i class="fas fa-twitter"></i></a>
                      <?php endif;?>
                    <?php endforeach;?>
                      <a href="mailto:contact@thephilocalist.gr?subject='Website Contact'"><i class="fas fa-envelope"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="show-for-small-only">
        <span data-toggle="offCanvasMenu" aria-hidden="true">×</span>
        <div class="clearfix"></div>
        <img class="mobile-offcanvas-logo" src="<?=Url::base(true)?>/images/Logo_Icon.png">
        <div class="columns large-up-2 medium-up-2 small-up-2">
          <div class="column">
            <ul class="vertical dropdown menu accordion-menu align-left f-s-30" data-accordion-menu><br>
              <?php foreach($this->params['categories'] as $category):?>
              <li><a href="<?=Url::base(true)?>/category/<?=$category->slug?>"><?=$category->title?></a></li>
              <?php endforeach;?>
            </ul>
          </div>
          <div class="column">
            <ul class="vertical dropdown menu accordion-menu align-right f-s-22" data-accordion-menu>
              <li><br><a href="<?=Url::base(true)?>">Home</a></li>
              <li><a href="mailto:contact@thephilocalist.gr?subject='Website Contact'" class="f-f-ubuntu">Επικοινωνία</a><br></li>
            </ul>
          </div>
          <div class="column">
            <ul class="vertical dropdown menu accordion-menu align-left f-s-22" data-accordion-menu>
              <li><br><br><br><p class="f-s-20 m-b-0 p-b-0">Follow Us</p></li>
              <li class="d-flex">
              <?php foreach($this->params['socials'] as $social):?>
                <?php if($social->name == 'facebook'):?>
                <a href="<?=$social->link;?>"><i class="fab fa-facebook"></i></a>
                <?php elseif($social->name == 'pinterest'):?>
                <a href="<?=$social->link;?>"><i class="fab fa-pinterest"></i></a>
                <?php elseif($social->name == 'instagram'):?>
                <a href="<?=$social->link;?>"><i class="fab fa-instagram"></i></a>
                <?php elseif($social->name == 'twitter'):?>
                <a href="<?=$social->link;?>"><i class="fas fa-twitter"></i></a>
                <?php endif;?>
              <?php endforeach;?>
                <a href="mailto:contact@thephilocalist.gr?subject='Website Contact'"><i class="fas fa-envelope"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- End OffCanvas Menu -->
    </div>
    <!-- End Navigation Menu -->

    <!-- Start Sticky Navigation Menu -->
    <div class="sticky-navigation-bar show-for-large">
      <ul class="menu">
        <li class=""><a><i class="fa fa-bars f-s-16" data-toggle="offCanvasMenu" aria-hidden="true"></i></a></li>
        <li class="show-for-large"><a href="<?=Url::base(true)?>" class="nav-logo"><img class="sticky-header-logo" src="<?=Url::base(true)?>/images/FINAL_Title.png"></a>
        <li><a class="m-t-5" href="<?=Url::base(true)?>">Home</a></li>
        <?php foreach($this->params['categories'] as $category):?>
        <li><a class="m-t-5" href="<?=Url::base(true)?>/category/<?=$category->slug?>"><?=$category->title?></a></li>
        <?php endforeach;?>
        <li><a class="m-t-5"href="<?=Url::base(true)?>/about">About</a></li>
        <li class="m-l-auto">
          <a href="<?=Url::base(true)?>/search" class="button search-button" type="button" data-toggle="example-dropdown-bottom-right3"><i class="fas fa-search"></i></a>
        </li>
      </ul>
    </div>
    <div class="sticky-navigation-bar show-for-medium-only">
      <ul class="menu">
        <li class=""><a><i class="fa fa-bars f-s-16" data-toggle="offCanvasMenu" aria-hidden="true"></i></a></li>
        <li class="show-for-medium m-l-auto"><a href="<?=Url::base(true)?>" class="nav-logo"><img class="sticky-header-logo" src="<?=Url::base(true)?>/images/FINAL_Title.png"></a>
        <li class="m-l-auto">
          <a href="<?=Url::base(true)?>/search" class="button search-button" type="button" data-toggle="example-dropdown-bottom-right3"><i class="fas fa-search"></i></a>
        </li>
      </ul>
    </div>
    <!-- End Sticky Navigation Menu -->

    <?= $content ?>

    <!-- Start Footer -->
    <div class="clearfix"></div>
    <footer>
      <div class="row">
        <div class="column large-3 medium-3 small-12 show-for-medium">
          <a href="index.html"><img class="footer-logo" src="<?=Url::base(true)?>/images/FINAL_Logo_w_Title.png"></a><br><br><br><br><br>
        </div>
        <div class="column large-6 medium-6 small-12">
          <div class="subscribe-banner-container">
            <h6>Become a Philocalist</h6>
            <p>If you want to become part of The Philocalist culture, sign up for the private newsletter. Your email is never shared.</p>
            <?php $form = ActiveForm::begin([
            ]);?>
              <div class="form-group field-newsletterform-email required">
                <?= $form->field($this->params['newsletter'], 'email')->textInput(['type' => 'text', 'class'=> 'form-placeholder f-s-20', 'placeholder' => 'Enter your email..', 'autofocus' => false])->label(false);?>
              </div>
              <?= Html::submitInput('SIGN UP', ['type' => 'submit', 'class' => 'button newsletter-button']) ?>
            <?php ActiveForm::end(); ?><!-- 
            <form>
                <input type="text" class="form-placeholder f-s-20" placeholder="Enter your email..">
                <input type="submit" class="button newsletter-button" value="SIGN UP">
            </form> -->
          </div>
        </div>
        <div class="column large-3 medium-3 small-12">
          <div class="spacer-100 show-for-medium"></div>
          <ul class="horizontal menu footer-social show-for-medium">
            <?php foreach($this->params['socials'] as $social):?>
              <?php if($social->name == 'facebook'):?>
              <a href="<?=$social->link;?>"><i class="fab fa-facebook"></i></a>
              <?php elseif($social->name == 'pinterest'):?>
              <a href="<?=$social->link;?>"><i class="fab fa-pinterest"></i></a>
              <?php elseif($social->name == 'instagram'):?>
              <a href="<?=$social->link;?>"><i class="fab fa-instagram"></i></a>
              <?php elseif($social->name == 'twitter'):?>
              <a href="<?=$social->link;?>"><i class="fas fa-twitter"></i></a>
              <?php endif;?>
            <?php endforeach;?>
            <li><a href="mailto:contact@thephilocalist.gr?subject='Website Contact'"><i class="fas fa-envelope"></i></a></li>
          </ul>
          <div class="spacer-10"></div>
          <ul class="horizontal menu center-content policy show-for-large">
            <li><a href="<?=Url::base(true)?>/pravicy-policy">ΟΡΟΙ ΧΡΗΣΗΣ</a></li> 
            <li><a class="p-l-0 p-r-0"> |</a></li> 
            <li><a href="mailto:contact@thephilocalist.gr?subject='Website Contact'">ΕΠΙΚΟΙΝΩΝΙΑ</a></li>
          </ul> 
          <ul class="horizontal menu policy show-for-medium-only">
            <li><a href="<?=Url::base(true)?>/pravicy-policy">ΟΡΟΙ ΧΡΗΣΗΣ</a></li> 
            <li><a class="p-l-0 p-r-0"> |</a></li> 
            <li><a href="mailto:contact@thephilocalist.gr?subject='Website Contact'">ΕΠΙΚΟΙΝΩΝΙΑ</a></li>
          </ul>
          <ul class="horizontal menu footer-social center-content show-for-small-only">
            <?php foreach($this->params['socials'] as $social):?>
              <?php if($social->name == 'facebook'):?>
              <a href="<?=$social->link;?>"><i class="fab fa-facebook"></i></a>
              <?php elseif($social->name == 'pinterest'):?>
              <a href="<?=$social->link;?>"><i class="fab fa-pinterest"></i></a>
              <?php elseif($social->name == 'instagram'):?>
              <a href="<?=$social->link;?>"><i class="fab fa-instagram"></i></a>
              <?php elseif($social->name == 'twitter'):?>
              <a href="<?=$social->link;?>"><i class="fas fa-twitter"></i></a>
              <?php endif;?>
            <?php endforeach;?>
            <li><a href="mailto:contact@thephilocalist.gr?subject='Website Contact'"><i class="fas fa-envelope"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="spacer-30"></div>
      <p class="text-center rights">© 2021 The Philocalist <br>All rights are reserved.</p>
      <div class="clearfix"></div>   
  </footer>
  <!-- End Footer -->

  <?php $this->endBody() ?>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.boomcdn.com/libs/owl-carousel/2.3.4/owl.carousel.min.js"></script>
  <script src="<?=Url::base(true)?>/js/site.js"></script>
  <script src="<?=Url::base(true)?>/js/app.js"></script>
</body>
</html>
<?php $this->endPage(); ?>