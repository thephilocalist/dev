<?php

use yii\helpers\Url;

/*META*/
$metaTitle = $article->meta_title;
$metaDescription = $article->meta_description;
$metaKeywords = $article->meta_keywords;
$metaPhoto = Url::base(true).'/images/'.$article->photo.'.jpg';
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

?><!-- Start Title -->
<div class="row">
  <div class="article-title-wrapper" >
      <h1><?=$article->title?></h1>
      <div class="spacer-20"></div>
      <p><?=$article->subtitle?></p>
  </div>
</div>
<!-- End Title -->

<!-- Start article-image -->
<div class="row">
  <div class="columns">
    <img class="article-image" src="<?=Url::base(true)?>/images/articles/<?=$article->photo?>.jpg">
  </div>
</div>
<!-- End article-image -->

<div class="spacer-100"></div>

<!-- Start article-text -->
<div class="row p-20-for-medium">
  <div class="share show-for-medium">
    <a href="https://www.facebook.com/sharer/sharer.php?u=http://<?=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>" class="button article-share-btn"><i class="fab fa-facebook"></i></a><br>
    <a href="https://twitter.com/share?url=http://<?=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>" class="button article-share-btn"><i class="fab fa-twitter"></i></a><br>
    <a href="mailto:contact@thephilocalist.gr?subject='Website Contact'" class="button article-share-btn"><i class="fas fa-envelope"></i></a>
  </div>
  <div class="article-wrapper">
    <div class="columns large-10 medium-10 small-12">
      <div class="author-wrapper">
        <div class="divider"></div>
        <div class="clearfix"></div>
        <div class="spacer-30"></div>
        <div class="author">
          <a href="<?=Url::base(true)?>/author/<?=$article->author->slug?>" class="author-image" data-src="<?=Url::base(true)?>/images/authors/<?=$article->author->photo?>.jpg" style="background-image: url('<?=Url::base(true)?>/images/authors/<?=$article->author->photo?>.jpg');"></a>
          <p><span><?=strtoupper($article->author->name)?></span> <br>
          <?=date('M d, Y', $article->published_at)?> <span>&#8226;</span> <?=$estimateTime?> read</p>
        </div>
        <div class="share show-for-small-only">
          <a href="https://www.facebook.com/sharer/sharer.php?u=http://<?=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>" class="button article-share-btn"><i class="fab fa-facebook"></i></a><br>
          <a href="https://twitter.com/share?url=http://<?=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>" class="button article-share-btn"><i class="fab fa-twitter"></i></a><br>
          <a href="mailto:contact@thephilocalist.gr?subject='Website Contact'" class="button article-share-btn"><i class="fas fa-envelope"></i></a>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="spacer-50"></div>
      <div class="article-main-text">
        <p><?=$article->text;?></p>
        <div class="spacer-100"></div>
        <p class="article-tags">Tags: 
            <?php foreach($article_tags as $article_tag):?>
                <u><a href="<?=Url::base(true)?>/tag/<?=$article_tag->tag->slug?>"><?=$article_tag->tag->title?></u></a>, 
            <?php endforeach;?>
        <div class="divider-dotted"></div>
      </div>
      <div class="author-wrapper">
        <div class="author">
          <a href="<?=Url::base(true)?>/author/<?=$article->author->slug?>" class="author-image h_70 w_70" data-src="<?=Url::base(true)?>/images/authors/<?=$article->author->photo?>.jpg" style="background-image: url('<?=Url::base(true)?>/images/authors/<?=$article->author->photo?>.jpg');"></a>
          <?=substr($article->author->bio, 0, 250)?>...
        </div>
      </div>
    </div>
  </div>
</div>
<div class="spacer-100"></div>
<!-- End article-text -->

<!-- Start Promoted Articles -->
<div class="latest-articles-container">
  <div class="column">
    <h3 class="text-center">Διάβασε περισσότερα</h3>
    <p class="text-center">Σχετικά άρθρα</p>
    <div class="spacer-50"></div>
    </div>
  </div>

  <div class="clearfix"></div>
  <div class="columns large-offset-1 large-10 medium-10 medium-offset-1 small-12">
    <div class="small-up-1 medium-up-2 large-up-3">
    <?php foreach($reladed_articles as $article):?>
      <div class="column load-6">
        <?php $this->beginContent('@app/views/site/partials/_medium-category-article.php', ['model' => $article->article]); ?><?php $this->endContent(); ?>
        <div class="clearfix"></div>
        <div class="spacer-50"></div>
      </div>
    <?php endforeach;?>
    </div>
  </div>
    <div class="clearfix"></div>
    <div class="spacer-10"></div>
    <a class="load_more" id="load-3">Περισσότερα άρθρα&nbsp;&nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
  <div class="clearfix"></div>
  <div class="spacer-50"></div>
</div>
<!-- End Promoted Articles -->