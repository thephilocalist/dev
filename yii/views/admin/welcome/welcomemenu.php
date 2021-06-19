<?php
use yii\helpers\Html;
?>
<div class="col-md-12">
  <ul class="nav nav-pills">
    <li class="<?php if($active === 'titles') echo 'active'?>"><?=Html::a('Update Welcome Texts', ['/Xthehiddenphiloclstadminurlx/welcome/update', 'id' => $id]);?></li>
    <li class="<?php if($active === 'photo') echo 'active'?>"><?=Html::a('Main Photo', ['/Xthehiddenphiloclstadminurlx/welcome/photo', 'id' => $id]);?></li>
  </ul>
</div>
