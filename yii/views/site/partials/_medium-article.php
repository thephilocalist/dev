<div class="medium-article">
    <a href="article/<?=$model->slug;?>" class="h_500 medium-article-box" data-src="/images/articles/<?=$model->photo?>.jpg" style="background-image: url('/images/articles/<?=$model->photo ?>.jpg');">
        <div class="overlay">
        </div>
    </a>
    <div class="clearfix"></div>
    <div class="medium-article-texts">
        <h2 class=""><a href="article/<?=$model->slug?>"><b><?=$model->title?></b></a></h2>
        <div class="spacer-10"></div>
        <div class="article-text">
            <a href="article/<?=$model->slug?>"><?=substr($model->text, 4 ,240);?>...</a>
        </div>
        <div class="spacer-10"></div>
            <a href="authors/<?=$model->author->slug;?>" class="date"><?=date('M d, Y', $model->published_at)?> / by <?=$model->author->name?></a>
        <div class="spacer-10"></div>
        <ul class="menu">
            <li><p class="p-l-0">share&nbsp;&nbsp;<i class="fas fa-long-arrow-alt-right"></i></p></li>
            <li><a><i class="fab fa-facebook-f"></i> </a></li>
            <li><a><i class="fab fa-twitter"></i> </a></li>
            <li><a><i class="fab fa-instagram"></i> </a></li>
            <li><a><i class="fab fa-pinterest"></i> </a></li>
        </ul>
    </div>
</div>