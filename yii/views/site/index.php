<?php
use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'The Philocalist';
?>

<!-- Start Logo -->
<div class="main-photo-wrapper" data-src="images/main_photo.jpg" style="background-image: url('images/main_photo.jpg');">
  
  <img class="main-logo" src="/images/logo_white.png">
  <ul class="menu custom menu-logo">
    <li><a class="p-l-r-29" href="category.html">FASHION</a></li>
    <li><a class="p-l-r-29" href="category.html">LIFESTYLE</a></li>
    <li><a class="p-l-r-29" href="category.html">TRAVEL</a></li>
    <li><a class="p-l-r-29" href="category.html">STORY</a></li>
  </ul>
</div>
<div class="clearfix"></div>
<div class="spacer-600"></div>
<div class="clearfix"></div>
<!-- End Logo -->

<!-- Start About -->
<div class="about-us-wrapper">
  <div class="row">
    <div class="columns small-12 medium-6">
      <div class="spacer-100 hide-for-medium"></div>
      <img class="about-logo" src="/images/logo_full.png">
    </div>
    <div class="columns small-12 medium-6">
      <h2>Welcome</h2>
      <p>Lorem ipsum eu usu assum liberavisse, ut munere praesent complectitur mea. Sit an option maiorum principes. Ne per probo magna idque.Lorem ipsum eu usu assum liberavisse, ut munere praesent complectitur mea. Sit an option maiorum principes. Ne per probo magna idque. Lorem ipsum eu usu assum liberavisse, ut munere praesent complectitur mea. Sit an option maiorum principes. Ne per probo magna idque. Lorem ipsum eu usu assum liberavisse, ut munere praesent complectitur mea. Sit an option maiorum principes. Ne per probo magna idque.</p>
      <br><a href="about.html">LEARN MORE</a>
    </div>
  </div>
</div>
<div class="spacer-50"></div>
<!-- End About -->

<!-- Start Main Article Carousel -->
<div class="owl-carousel owl-theme">
  <div> <?php $this->beginContent('@app/views/site/partials/_main-article.php'); ?><?php $this->endContent(); ?></div><!-- , ['model' => $value] -->
  <div> <?php $this->beginContent('@app/views/site/partials/_main-article.php'); ?><?php $this->endContent(); ?></div><!-- , ['model' => $value] -->
  <div> <?php $this->beginContent('@app/views/site/partials/_main-article.php'); ?><?php $this->endContent(); ?></div><!-- , ['model' => $value] -->
  <div> <?php $this->beginContent('@app/views/site/partials/_main-article.php'); ?><?php $this->endContent(); ?></div><!-- , ['model' => $value] -->
</div>
<div class="spacer-100"></div>
<!-- End Main Article Carousel -->

<!-- Start - Category - Articles -->
<div class="columns medium-10 medium-offset-1 small-12" data-equalizer>
  <div class="column">
    <div class="divider">
      <h3 class="text-center"><a href="category.html"><span>| CATEGORY |</span></a></h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="spacer-50"></div>
  <div class="clearfix"></div>
  <div class="small-up-1 medium-up-2 large-up-3">
    <div class="column category-load">
      <?php $this->beginContent('@app/views/site/partials/_medium-article.php'); ?><?php $this->endContent(); ?>
      <div class="clearfix"></div>
      <div class="spacer-50"></div>
    </div>
    <div class="column category-load">
      <?php $this->beginContent('@app/views/site/partials/_medium-article.php'); ?><?php $this->endContent(); ?>
      <div class="clearfix"></div>
      <div class="spacer-50"></div>
    </div>
    <div class="column category-load">
      <?php $this->beginContent('@app/views/site/partials/_medium-article.php'); ?><?php $this->endContent(); ?>
      <div class="clearfix"></div>
      <div class="spacer-50"></div>
    </div>
    <div class="column category-load">
      <?php $this->beginContent('@app/views/site/partials/_medium-article.php'); ?><?php $this->endContent(); ?>
      <div class="clearfix"></div>
      <div class="spacer-50"></div>
    </div>
    <div class="column category-load">
      <?php $this->beginContent('@app/views/site/partials/_medium-article.php'); ?><?php $this->endContent(); ?>
      <div class="clearfix"></div>
      <div class="spacer-50"></div>
    </div>
    <div class="column category-load">
      <?php $this->beginContent('@app/views/site/partials/_medium-article.php'); ?><?php $this->endContent(); ?>
      <div class="clearfix"></div>
      <div class="spacer-50"></div>
    </div>
    <div class="column category-load">
      <?php $this->beginContent('@app/views/site/partials/_medium-article.php'); ?><?php $this->endContent(); ?>
      <div class="clearfix"></div>
      <div class="spacer-50"></div>
    </div>
    <div class="column category-load">
      <?php $this->beginContent('@app/views/site/partials/_medium-article.php'); ?><?php $this->endContent(); ?>
      <div class="clearfix"></div>
      <div class="spacer-50"></div>
    </div>
    <div class="column category-load">
      <?php $this->beginContent('@app/views/site/partials/_medium-article.php'); ?><?php $this->endContent(); ?>
      <div class="clearfix"></div>
      <div class="spacer-50"></div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<div class="spacer-10"></div>
<a class="load_more" id="load">LOAD MORE</a>
<!-- End - Category - Articles -->

<!-- Start Promoted Articles -->
<div class="latest-articles-container">
  <div class="column">
    <div class="spacer-100"></div>
    <div class="divider">
      <h3 class="text-center"><span>| FAVOURITE ARTICLES |</span></h3>
      <div class="spacer-50"></div>
    </div>
  </div>

  <div class="clearfix"></div>
  <div class="columns large-4 large-offset-0 medium-offset-0 small-10 small-offset-1 medium-6">
    <?php $this->beginContent('@app/views/site/partials/_small-article.php'); ?><?php $this->endContent(); ?>
    <div class="clearfix"></div>
    <div class="spacer-50"></div>
  </div>
  <div class="columns large-4 large-offset-0 medium-offset-0 small-10 small-offset-1 medium-6">
    <?php $this->beginContent('@app/views/site/partials/_small-article.php'); ?><?php $this->endContent(); ?>
    <div class="clearfix"></div>
    <div class="spacer-50"></div>
  </div>
  <div class="columns large-4 large-offset-0 medium-offset-0 small-10 small-offset-1 medium-6">
    <?php $this->beginContent('@app/views/site/partials/_small-article.php'); ?><?php $this->endContent(); ?>
    <div class="clearfix"></div>
    <div class="spacer-50"></div>
  </div>
</div>
<!-- End Promoted Articles -->

<!-- Start Newsletter Form -->
<div class="clearfix"></div>
<div class="row">  
  <?php $this->beginContent('@app/views/site/partials/_subscribe-banner.php'); ?><?php $this->endContent(); ?>
</div>
<!-- End Newsletter Form -->