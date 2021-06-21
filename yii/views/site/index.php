<?php
use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<!-- Start Logo -->
<div class="main-photo-wrapper" data-src="<?=Url::base(true)?>/images/main_photo.jpg" style="background-image: url('<?=Url::base(true)?>/images/main_photo.jpg');">  
  <img class="main-logo" src="<?=Url::base(true)?>/images/the_philocalist_logo_white.png">
  <ul class="menu custom menu-logo">
  <?php foreach($categories as $category): ?>
    <li><a class="p-l-r-29" href="<?=Url::base(true)?>/category/<?=$category->slug?>"><upper><?=strtoupper($category->title)?></upper></a></li>
  <?php endforeach;?>
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
      <img class="about-logo" src="<?=Url::base(true)?>/images/logo_full.png">
    </div>
    <div class="columns small-12 medium-6">
      <h2><?=$welcome->title?></h2>
      <?=$welcome->text?>
      <br><a href="<?=Url::base(true)?>/about-us">LEARN MORE</a>
    </div>
  </div>
</div>
<div class="spacer-50"></div>
<!-- End About -->

<!-- Start Main Article Carousel -->
<div class="owl-carousel owl-theme">
<?php foreach($main_articles as $article):?>
  <div> <?php $this->beginContent('@app/views/site/partials/_main-article.php' , ['model' => $article]); ?><?php $this->endContent(); ?></div>
<?php endforeach;?>
</div>
<div class="spacer-100"></div>
<!-- End Main Article Carousel -->

<!-- Start - Category - Articles -->
<div class="columns medium-10 medium-offset-1 small-12" data-equalizer>
  <?php foreach($categories as $category): ?>
  <div class="column">
    <div class="divider">
      <h3 class="text-center"><a href="<?=Url::base(true)?>/category/<?=$category->slug?>"><span>| <?=strtoupper($category->title);?> |</span></a></h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="spacer-50"></div>
  <div class="clearfix"></div>
  <div class="small-up-1 medium-up-2 large-up-3">
    <?php foreach($category->articles as $article):?>
      <div style="" class="column category-load-<?=$article->category_id?>">
        <?php $this->beginContent('@app/views/site/partials/_medium-article.php', ['model' => $article->article]); ?><?php $this->endContent(); ?>
        <div class="clearfix"></div>
        <div class="spacer-50"></div>
      </div>
    <?php endforeach;?>
  </div>
  <div class="clearfix"></div>
  <div class="spacer-10"></div>
  <a class="load_more" id="load-<?=$category->id?>">LOAD MORE</a>
  <div class="clearfix"></div>
  <div class="spacer-100"></div>
  <?php endforeach;?>
</div>
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
  <?php foreach($favourite_articles as $article):?>
  <div class="columns large-4 large-offset-0 medium-offset-0 small-10 small-offset-1 medium-6">
    <?php $this->beginContent('@app/views/site/partials/_small-article.php', ['model' => $article]); ?><?php $this->endContent(); ?>
    <div class="clearfix"></div>
    <div class="spacer-50"></div>
  </div>
  <?php endforeach;?>
</div>
<!-- End Promoted Articles -->

<!-- Start Newsletter Form -->
<div class="clearfix"></div>
<div class="row">
  <?php $this->beginContent('@app/views/site/partials/_subscribe-banner.php', ['model' => $newsletter]); ?><?php $this->endContent(); ?>
</div>
<!-- End Newsletter Form -->