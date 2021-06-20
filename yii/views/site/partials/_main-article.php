<div class="main-article">
    <a href="article/<?=$model->slug;?>" class="h_650 main-article-box" data-src="/images/articles/<?=$model->photo?>.jpg" style="background-image: url('/images/articles/<?=$model->photo?>.jpg');">
        <div class="text-wrapper">
            <?php foreach($model->categories as $category):?>
                <p class="category"><?=strtoupper($category->category->title);?></p>
            <?php endforeach;?>
            <h2 class="title"><b><?=$model->title?></b></h2>
            <p class="date"><?=date('M d, Y', $model->published_at)?> / by <?=$model->author->name?></p>
        </div>
        <div class="overlay">
        </div>
    </a>
    <div class="clearfix"></div>
</div>