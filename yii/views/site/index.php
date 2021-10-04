<?php
use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<!-- Start Logo -->
<div class="main-photo-wrapper" data-src="<?=Url::base(true)?>/images/main_photo.jpg" style="background-image: url('<?=Url::base(true)?>/images/main_photo.jpg');"></div>
<div class="clearfix"></div>
<div class="spacer-100"></div>
<div class="clearfix"></div>
<!-- End Logo -->

<!-- Start Main Article Carousel -->
<p class="carousel-title">FEATURED ARTICLES</p>
<div class="owl-carousel owl-theme owl-carousel-featured"> 
<?php foreach($featured_articles as $article):?>
  <div> <?php $this->beginContent('@app/views/site/partials/_main-article.php' , ['model' => $article]); ?><?php $this->endContent(); ?></div>
<?php endforeach;?>
</div>
<div class="clearfix"></div>
<div class="spacer-50"></div>
<!-- End Main Article Carousel -->

<!-- Start Philocalist Banner -->
<div class="clearfix"></div>
<?php $this->beginContent('@app/views/site/partials/_philocalist-banner.php'); ?><?php $this->endContent(); ?>
<!-- End Philocalist Banner -->

<!-- Start - Category - Articles -->
<div class="columns medium-12 small-12" data-equalizer>
  <?php foreach($categories as $category): ?>
    <h3 class="category-title"><a href="<?=Url::base(true)?>/category/<?=$category->slug?>" class="c-black"> <?=strtoupper($category->title);?></a></h3>
    <div class="clearfix"></div>
    <?php $this->beginContent('@app/views/site/partials/_category.php', ['category' =>$category, 'model' => $category->articles[0]]); ?><?php $this->endContent(); ?>
    <div class="clearfix"></div>
    <div class="owl-carousel owl-theme owl-carousel-category">
      <?php foreach($category->articles as $article):?>
      <div> <?php $this->beginContent('@app/views/site/partials/_medium-article-new.php' , ['model' => $article->article]); ?><?php $this->endContent(); ?></div>
      <?php endforeach;?>
    </div>
<div class="clearfix"></div>
<div class="spacer-10"></div>
<div class="clearfix"></div>
<div class="spacer-10"></div>
<div class="clearfix"></div>
<br><a href="<?=Url::base(true)?>/category/<?=$category->slug?>" class="load_more">Περισσότερα άρθρα&nbsp;&nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
  <?php endforeach;?>
</div>
<!-- End - Category - Articles -->

<div class="clearfix"></div>
<div class="spacer-100"></div>