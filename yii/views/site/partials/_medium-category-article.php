<?php

use yii\helpers\Url;
?>

<div class="medium-category-article">
    <a href="<?=Url::base(true)?>/article/<?=$model->slug;?>" class="h_340 main-article-box" data-src="<?=Url::base(true)?>/images/articles/<?=$model->photo?>@1024.jpg" style="background-image: url('<?=Url::base(true)?>/images/articles/<?=$model->photo ?>@1024.jpg');">
        <div class="overlay">
        </div>
    </a>
    <div class="text-wrapper">
        <div class="clearfix"></div>
        <div class="category">
            <a href="<?=Url::base(true)?>/category/<?=$model->categories[0]->category->slug?>" class="category"><?=strtoupper($model->categories[0]->category->title)?></a> | <a href="<?=Url::base(true)?>/tag/<?$model->tags[0]->tag->slug?>"><?=strtoupper($model->tags[0]->tag->title)?></a>
        </div>
        <h2 class="title"><?=$model->title?></h2>
        <p class="date"><i><?=date('M d, Y', $model->published_at)?> / by <?=$model->author->name?></i></p><br> 
    </div>
    <div class="clearfix"></div>
</div>