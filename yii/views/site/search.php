<?php
use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

/*META*/
$metaTitle = $welcome->meta_title;
$metaDescription = $welcome->meta_description;
$metaKeywords = $welcome->meta_keywords;
$metaPhoto = Url::base(true).'/images/'.$welcome->photo.'.jpg';
Yii::$app->view->title = $metaTitle;
Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $metaDescription]);
Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $metaKeywords]);
Yii::$app->view->registerLinkTag(['rel' => 'canonical', 'href' => Url::base(true)]);
Yii::$app->view->registerMetaTag(['property' => 'og:type', 'content' => 'website']);
Yii::$app->view->registerMetaTag(['property' => 'og:site_name', 'content' => 'The Philocalist']);
Yii::$app->view->registerMetaTag(['property' => 'og:title', 'content' => $metaTitle]);
Yii::$app->view->registerMetaTag(['property' => 'og:description', 'content' => $metaDescription]);
Yii::$app->view->registerMetaTag(['property' => 'og:url', 'content' => Url::base(true)]);
Yii::$app->view->registerMetaTag(['property' => 'og:image', 'content' => $metaPhoto]);
Yii::$app->view->registerMetaTag(['itemprop' => 'title', 'content' => $metaTitle]);
Yii::$app->view->registerMetaTag(['itemprop' => 'description', 'content' => $metaDescription]);
Yii::$app->view->registerMetaTag(['itemprop' => 'url', 'content' => Url::base(true)]);
Yii::$app->view->registerMetaTag(['itemprop' => 'image', 'content' => $metaPhoto]);

?>

<!-- Start Logo -->
<div class="main-photo-wrapper" data-src="<?=Url::base(true)?>/images/main_photo.jpg" style="background-image: url('<?=Url::base(true)?>/images/main_photo.jpg');">
  
  <img class="main-logo" src="<?=Url::base(true)?>/images/logo_white.png">
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

<!-- Start - Search - Articles -->
<div class="spacer-50"></div>
<div class="columns medium-10 medium-offset-1 small-12" data-equalizer>
  <div class="column">
    <div class="divider">
      <h3 class="text-center"><span>| SEARCH RESULTS |</span></h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="spacer-50"></div>
  <div class="clearfix"></div>
  <div class="small-up-1 medium-up-2 large-up-3">
    <?php if($articles):?>
    <?php foreach($articles as $article):?>
      <div class="column category-load-99">
        <?php $this->beginContent('@app/views/site/partials/_medium-article.php', ['model' => $article]); ?><?php $this->endContent(); ?>
        <div class="clearfix"></div>
        <div class="spacer-50"></div>
      </div>
    <?php endforeach;?>
    <?php else:?>
    <div class="column category-load-99">
        <p>No results</p>
        <div class="clearfix"></div>
        <div class="spacer-50"></div>
    </div>
    <?php endif;?>
  </div>
  <div class="clearfix"></div>
  <div class="spacer-100"></div>
</div>
<!-- End - Search - Articles -->
