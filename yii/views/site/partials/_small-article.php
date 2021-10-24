<?php

use yii\helpers\Url;
?>

<div class="small-article-container">
    <?php if($model->photo):?>
    <a href="<?=Url::base(true)?>/article/<?=$model->slug;?>" class="h_400 small-article-img" data-src="<?=Url::base(true)?>/images/articles/<?=$model->photo?>@1024.jpg" style="background-image: url('<?=Url::base(true)?>/images/articles/<?=$model->photo?>@1024.jpg');">
    <?php endif;?>
    <div class="spacer-10"></div>    
    <a href="<?=Url::base(true)?>/article/<?=$model->slug;?>"><?=$model->title?></a><br>
    <?php if($model->published):?>
    <a href="<?=Url::base(true)?>/author/<?=$model->author->slug;?>" class="date"><?=date('M d, Y', $model->published_at)?> / by <?=$model->author->name?></a>
    <?php endif;?>
</div>