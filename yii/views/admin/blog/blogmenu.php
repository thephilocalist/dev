<?php
use yii\helpers\Html;
?>
<div class="col-md-12">
  <ul class="nav nav-pills">
    <li class="<?php if($active === 'titles') echo 'active'?>"><?=Html::a('Update Article Texts', ['/Xthehiddenphiloclstadminurlx/blog/update', 'id' => $id]);?></li>
    <li class="<?php if($active === 'photo') echo 'active'?>"><?=Html::a('Photo', ['/Xthehiddenphiloclstadminurlx/blog/photo', 'id' => $id]);?></li>
  </ul>
</div>
