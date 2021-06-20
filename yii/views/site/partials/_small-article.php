<div class="small-article-container">
    <a href="article/<?=$model->slug;?>" class="h_400 small-article-img" data-src="/images/articles/<?=$model->photo?>.jpg" style="background-image: url('/images/articles/<?=$model->photo?>.jpg');">
    <div class="spacer-10"></div>    
    <a href="article/<?=$model->slug;?>"><?=$model->title?></a><br>
    <a href="author/<?=$model->author->slug;?>" class="date"><?=date('M d, Y', $model->published_at)?> / by <?=$model->author->name?></a>
</div>