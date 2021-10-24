<?php

use yii\helpers\Url;
?>

<div class="main-article">
    <?php if($model->featured_photo):?>
    <a href="<?=Url::base(true)?>/article/<?=$model->slug;?>" class="h_442 main-article-box" data-src="<?=Url::base(true)?>/images/articles/<?=$model->featured_photo?>.jpg" style="background-image: url('<?=Url::base(true)?>/images/articles/<?=$model->featured_photo?>.jpg');">
        <div class="overlay">
        </div>
    </a>
    <?php elseif($model->photo):?>
    <a href="<?=Url::base(true)?>/article/<?=$model->slug;?>" class="h_442 main-article-box" data-src="<?=Url::base(true)?>/images/articles/<?=$model->photo?>.jpg" style="background-image: url('<?=Url::base(true)?>/images/articles/<?=$model->photo?>.jpg');">
        <div class="overlay">
        </div>
    </a>
    <?php endif;?>  
    <div class="text-wrapper">
        <div class="clearfix"></div>
        <div class="category">
            <a href="<?=Url::base(true)?>/category/<?=$model->categories[0]->category->slug?>" class="category"><?=strtoupper($model->categories[0]->category->title)?></a> | <a href="<?=Url::base(true)?>/tag/<?$model->tags[0]->tag->slug?>"><?=strtoupper($model->tags[0]->tag->title)?></a>
        </div>
        <h2 class="title"><?=$model->title?></h2>
        <?php if($model->published):?>
        <p class="date"><i><?=date('M d, Y', $model->published_at)?> / by <?=$model->author->name?></i></p><br>
        <?php endif;?>
    </div>
    <div class="clearfix"></div>
</div>