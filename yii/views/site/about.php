<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);

/*META*/
$metaTitle = $about->meta_title;
$metaDescription = $about->meta_description;
$metaKeywords = $about->meta_keywords;
$metaPhoto = Url::base(true).'/images/'.$about->photo.'.jpg';
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
<div class="category-photo-wrapper" data-src="<?=Url::base(true)?>/images/about/<?=$about->photo?>.jpg" style="background-image: url('<?=Url::base(true)?>/images/about/<?=$about->photo?>.jpg');">
  <img class="main-logo" src="<?=Url::base(true)?>/images/the_philocalist_logo_white.png">
    <h1><?=strtoupper($about->title);?></h1>
</div>
<div class="clearfix"></div>
<div class="spacer-600"></div>
<div class="clearfix"></div>
<!-- End Logo -->

<!-- Start Text -->
<div class="row">
    <div class="columns large-offset-2 large-8 medium-6 medium-offset-3 small-10 small-offset-1">
        <div class="spacer-100"></div>
        <?=$about->text;?>
    </div>
</div>
<!-- End Text -->

<!-- Start Promoted Articles -->
<div class="latest-articles-container">
    <div class="column">
      <div class="spacer-50"></div>
      <div class="divider">
        <h3 class="text-center"><span> FAVOURITE ARTICLES </span></h3>
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
