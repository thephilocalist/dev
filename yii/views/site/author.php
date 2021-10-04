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

<!-- Start Name -->
<div class="columns medium-12 small-12" data-equalizer>
  <div class="column">
    <h1 class="about-title"><a href="<?=Url::base(true)?>/author/<?=$author->slug?>"><?=$author->name?></a></h1>
  </div>
</div>
<!-- End Name -->
<!-- Start author-image -->
<div class="row">
  <div class="columns">
    <img class="article-image" src="<?=Url::base(true)?>/images/authors/<?=$author->photo?>.jpg">
  </div>
</div>
<!-- End author-image -->
<!-- Start Text -->
<div class="row"> 
    <div class="columns large-offset-2 large-8 medium-10 medium-offset-1 small-10 small-offset-1">
        <p class="about-text"><?=$author->bio;?></p>
    </div>
</div>
<div class="spacer-100"></div>
<!-- End Text -->

<!-- Start - Author - Articles -->
<div class="spacer-50"></div>
<div class="columns medium-10 medium-offset-1 small-12" data-equalizer>
  <div class="small-up-1 medium-up-2 large-up-3">
    <?php foreach($articles as $article):?>
      <div class="column load-6">
        <?php $this->beginContent('@app/views/site/partials/_medium-category-article.php', ['model' => $article]); ?><?php $this->endContent(); ?>
        <div class="clearfix"></div>
        <div class="spacer-50"></div>
      </div>
    <?php endforeach;?>
  </div>
  <div class="clearfix"></div>
  <div class="spacer-10"></div>
    <a class="load_more" id="load-3">Περισσότερα άρθρα&nbsp;&nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
  <div class="clearfix"></div>
  <div class="spacer-100"></div>
</div>
<!-- End - Author - Articles -->
<a href="<?=Url::base(true)?>"><img class="about-logo" src="<?=Url::base(true)?>/images/Logo_Icon.png"></a>
<div class="spacer-100"></div>