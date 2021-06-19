<?php
use yii\helpers\Html;
?>
<div class="col-md-12">
  <ul class="nav nav-pills">
    <li class="<?php if($active === 'titles') echo 'active'?>"><?=Html::a('Update Article', ['/Xthehiddenphiloclstadminurlx/articles/update', 'id' => $id]);?></li>
    <li class="<?php if($active === 'text') echo 'active'?>"><?=Html::a('Update Article Text', ['/Xthehiddenphiloclstadminurlx/articles/text', 'id' => $id]);?></li>
    <li class="<?php if($active === 'photo') echo 'active'?>"><?=Html::a('Photo', ['/Xthehiddenphiloclstadminurlx/articles/photo', 'id' => $id]);?></li>
  </ul>
</div>
