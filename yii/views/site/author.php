<?php

use yii\helpers\Url;

/*META*/
$metaTitle = $author->meta_title;
$metaDescription = $author->meta_description;
$metaKeywords = $author->meta_keywords;
$metaPhoto = Url::base(true).'/images/'.$author->photo.'.jpg';
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
<div class="category-photo-wrapper" data-src="<?=Url::base(true)?>/images/<?=$author->photo?>.jpg" style="background-image: url('<?=Url::base(true)?>/images/main_photo.jpg');">
    <div class="spacer-200"></div>
    <h1><?=strtoupper($author->name);?></h1>
</div>
<div class="clearfix"></div>
<div class="spacer-600"></div>
<div class="clearfix"></div>
<!-- End Logo -->

<!-- Start Text -->
<div class="row">
    <div class="columns large-offset-2 large-8 medium-6 medium-offset-3 small-10 small-offset-1">
        <div class="spacer-50"></div>
        <?=$author->bio;?>
    </div>
</div>
<!-- End Text -->

<!-- Start - Category - Articles -->
<div class="spacer-50"></div>
<div class="columns medium-10 medium-offset-1 small-12" data-equalizer>
  <div class="small-up-1 medium-up-2 large-up-3">
    <?php foreach($articles as $article):?>
      <div class="column category-load-1">
        <?php $this->beginContent('@app/views/site/partials/_medium-article.php', ['model' => $article]); ?><?php $this->endContent(); ?>
        <div class="clearfix"></div>
        <div class="spacer-50"></div>
      </div>
    <?php endforeach;?>
  </div>
  <div class="clearfix"></div>
  <div class="spacer-10"></div>
  <a class="load_more" id="load-1">LOAD MORE</a>
  <div class="clearfix"></div>
  <div class="spacer-100"></div>
</div>
<!-- End - Category - Articles -->