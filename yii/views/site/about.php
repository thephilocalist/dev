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
<!-- Start Text -->
<div class="columns medium-12 small-12" data-equalizer>
  <div class="column">
    <h1 class="about-title"><a href="<?=Url::base(true)?>/about">ABOUT US</a></h1>
  </div>
</div>
<div class="row"> 
    <div class="columns large-offset-2 large-8 medium-10 medium-offset-1 small-10 small-offset-1">
        <div class="about-text"><?=$about->text;?></div>
    </div>
</div>
<div class="spacer-100"></div>
<!-- End Text -->
<a href="<?=Url::base(true)?>"><img class="about-logo" src="<?=Url::base(true)?>/images/Logo_Icon.png"></a>
<div class="spacer-100"></div>
