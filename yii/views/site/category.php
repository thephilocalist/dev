<?php

use yii\helpers\Url;

/*META*/
$metaTitle = $category->meta_title;
$metaDescription = $category->meta_description;
$metaKeywords = $category->meta_keywords;
$metaPhoto = Url::base(true).'/images/'.$category->photo.'.jpg';
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
<div class="category-photo-wrapper" data-src="<?=Url::base(true)?>/images/categories/<?=$category->photo?>.jpg" style="background-image: url('<?=Url::base(true)?>/images/categories/<?=$category->photo?>.jpg');">
    <div class="spacer-200"></div>
    <h1><?=strtoupper($category->title);?></h1>
</div>
<div class="clearfix"></div>
<div class="spacer-600"></div>
<div class="clearfix"></div>
<!-- End Logo -->

<!-- Start - Category - Articles -->
<div class="spacer-50"></div>
<div class="columns medium-10 medium-offset-1 small-12" data-equalizer>
  <div class="small-up-1 medium-up-2 large-up-3">
    <?php foreach($articles as $article):?>
      <div class="column category-load-<?=$article->category_id?>">
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
  <?php $this->beginContent('@app/views/site/partials/_subscribe-banner.php'); ?><?php $this->endContent(); ?>
</div>
<!-- End Newsletter Form -->