<?php

use yii\helpers\Url;
?>
<div class="category-wrapper">
    <div class="photo-wrapper" data-src="<?=Url::base(true)?>/images/categories/<?=$category->photo?>.jpg" style="background-image: url('<?=Url::base(true)?>/images/categories/<?=$category->photo?>.jpg');"></div>
    <div class="category-text-wrapper">
        <p class="f-right tag"><?=strtoupper($model->article->categories[0]->category->title)?> | <?=strtoupper($model->article->tags[0]->tag->title)?></p>
        <div class="clearfix"></div>
        <h3><?=$model->article->title?></h3>
        <p class="category-text"><?=substr($model->article->text, 0, 300)?>...</p>
        <a href="<?=Url::base(true)?>/article/<?=$model->article->slug?>" class="button read-more">Διάβασέ το<br><i class="fas fa-long-arrow-alt-right"></i></a>
    </div>
</div>