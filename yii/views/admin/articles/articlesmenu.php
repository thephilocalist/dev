<?php
use yii\helpers\Html;
?>
<div class="col-md-12">
  <ul class="nav nav-pills">
    <li class="<?php if($active === 'titles') echo 'active'?>"><?=Html::a('Update Article', ['/Xthehiddenphiloclstadminurlx/articles/update', 'id' => $id]);?></li>
    <li class="<?php if($active === 'text') echo 'active'?>"><?=Html::a('Update Article Text', ['/Xthehiddenphiloclstadminurlx/articles/text', 'id' => $id]);?></li>
    <li class="<?php if($active === 'main-photo') echo 'active'?>"><?=Html::a('Main Photo', ['/Xthehiddenphiloclstadminurlx/articles/main-photo', 'id' => $id]);?></li>
    <li class="<?php if($active === 'featured-photo') echo 'active'?>"><?=Html::a('Featured Photo', ['/Xthehiddenphiloclstadminurlx/articles/featured-photo', 'id' => $id]);?></li>
    <li class="<?php if($active === 'category-photo') echo 'active'?>"><?=Html::a('Category Photo', ['/Xthehiddenphiloclstadminurlx/articles/category-photo', 'id' => $id]);?></li>
  </ul>
</div>
