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
<!-- Start Category -->
<div class="row">
  <div class="columns medium-12 small-12" data-equalizer>
    <h3 class="category-title"><a href="<?=Url::base(true)?>/category/<?=$category->slug?>" class="c-black"><?=$category->title?></a></h3>
    <p class="category-p">CATEGORY</p>
    <div class="clearfix"></div>
      <?php $this->beginContent('@app/views/site/partials/_category.php', ['category' =>$category, 'model' => $articles[0]]); ?><?php $this->endContent(); ?>
    <div class="clearfix"></div>
  </div>
</div>
<!-- End Category -->
<div class="show-for-small-only">
<div class="clearfix"></div>
<div class="spacer-10"></div>
<div class="clearfix"></div>
<div class="spacer-10"></div>
<div class="clearfix"></div>
<div class="spacer-10"></div>
<div class="clearfix"></div>
</div>

<!-- Start - Category - Articles -->
<div class="row">
  <div class="columns large-offset-1 large-10 medium-10 medium-offset-1 small-12">
    <div class="small-up-1 medium-up-2 large-up-3">
    <?php foreach($articles as $article):?>
      <div class="column load-6">
        <?php $this->beginContent('@app/views/site/partials/_medium-category-article.php', ['model' => $article->article]); ?><?php $this->endContent(); ?>
        <div class="clearfix"></div>
        <div class="spacer-50"></div>
      </div>
    <?php endforeach;?>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<div class="spacer-10"></div>
<a class="load_more" id="load-3">Περισσότερα άρθρα&nbsp;&nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
<!-- End - Category - Articles -->
<div class="clearfix"></div>
<div class="spacer-200"></div>