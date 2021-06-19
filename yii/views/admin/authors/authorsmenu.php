<?php
use yii\helpers\Html;
?>

<div class="col-md-12">
  <?=Html::a('<i class="fa fa-caret-left" aria-hidden="true"></i> Back to all Authors', ['/Xthehiddenphiloclstadminurlx/authors/index'], ['class' => 'btn btn-primary'])?>
</div>

<div class="spacer-30"></div>
<div class="col-md-12">
  <ul class="nav nav-pills">
    <li class="<?php if($active === 'titles') echo 'active'?>"><?=Html::a('Authors Texts', ['/Xthehiddenphiloclstadminurlx/authors/update', 'id' => $id]);?></li>
    <li class="<?php if($active === 'photo') echo 'active'?>"><?=Html::a('Photo', ['/Xthehiddenphiloclstadminurlx/authors/photo', 'id' => $id]);?></li>
  </ul>
</div>
