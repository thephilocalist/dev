<?php

use yii\helpers\Url;
?>

<div class="small-article-container">
    <a href="<?=Url::base(true)?>/article/<?=$model->slug;?>" class="h_400 small-article-img" data-src="<?=Url::base(true)?>/images/articles/<?=$model->photo?>.jpg" style="background-image: url('<?=Url::base(true)?>/images/articles/<?=$model->photo?>.jpg');">
    <div class="spacer-10"></div>    
    <a href="<?=Url::base(true)?>/article/<?=$model->slug;?>"><?=$model->title?></a><br>
    <a href="<?=Url::base(true)?>/author/<?=$model->author->slug;?>" class="date"><?=date('M d, Y', $model->published_at)?> / by <?=$model->author->name?></a>
</div>