<?php

use yii\helpers\Url;
?>
<!-- Start article-image -->
<div class="article-image-wrapper" data-src="<?=Url::base(true)?>/images/articles/<?=$article->photo?>.jpg" style="background-image: url('<?=Url::base(true)?>/images/articles/<?=$article->photo?>.jpg');">
</div>
<!-- End article-image -->

<!-- Start Title -->
<div class="article-title-wrapper" >
    <h1><?=$article->title?></h1>
    <?php foreach($article->categories as $category):?>
        <h3><a href="<?=Url::base(true)?>/categories/<?=$category->category->slug?>"><?=strtoupper($category->category->title);?></a></h3>
    <?php endforeach;?>
    <a href="<?=Url::base(true)?>/authors/<?=$article->author->slug;?>" class="date"><?=date('M d, Y', $article->published_at)?> / by <?=$article->author->name?></a>
</div>
<!-- End Title -->

<div class="spacer-15"></div>

<!-- Start article-text -->
<div class="row">
    <div class="columns large-offset-2 large-8 medium-6 medium-offset-3 small-10 small-offset-1">
        <?=$article->text;?>
    </div>
</div>
<div class="spacer-100"></div>
<!-- End article-text -->

<!-- Start Promoted Articles -->
<div class="latest-articles-container">
    <div class="column">
      <div class="spacer-100"></div>
      <div class="divider">
        <h3 class="text-center"><span>| RELATED ARTICLES |</span></h3>
        <div class="spacer-50"></div>
      </div>
    </div>
    <div class="clearfix"></div>
    <?php $i=0; foreach($reladed_articles as $article):?>
        <?php $i=$i+1; if($i<4): ?>
        <div class="columns large-4 large-offset-0 medium-offset-0 small-10 small-offset-1 medium-6">
            <?php $this->beginContent('@app/views/site/partials/_small-article.php', ['model' => $article->article]); ?><?php $this->endContent(); ?>
            <div class="clearfix"></div>
            <div class="spacer-50"></div>
        </div>
        <?php endif;?>
    <?php endforeach;?>
</div>
<!-- End Promoted Articles -->

<!-- Start Newsletter Form -->
<div class="clearfix"></div>
<div class="row">  
  <?php $this->beginContent('@app/views/site/partials/_subscribe-banner.php'); ?><?php $this->endContent(); ?>
</div>
<!-- End Newsletter Form -->