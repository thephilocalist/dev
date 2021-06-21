<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);
?>

<!-- Start Logo -->
<div class="category-photo-wrapper" data-src="<?=Url::base(true)?>/images/about/<?=$about->photo?>.jpg" style="background-image: url('<?=Url::base(true)?>/images/about/<?=$about->photo?>.jpg');">
    <div class="spacer-200"></div>
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
