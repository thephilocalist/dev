<?php
use yii\helpers\Html;
?>
<div class="col-md-12">
  <ul class="nav nav-pills">
    <li class="<?php if($active === 'titles') echo 'active'?>"><?=Html::a('Update Category Title', ['/Xthehiddenphiloclstadminurlx/categories/update', 'id' => $id]);?></li>
    <li class="<?php if($active === 'photo') echo 'active'?>"><?=Html::a('Photo', ['/Xthehiddenphiloclstadminurlx/categories/photo', 'id' => $id]);?></li>
    <li class="<?php if($active === 'Subcategories') echo 'active'?>"><?=Html::a('Subcategories', ['/Xthehiddenphiloclstadminurlx/subcategories/index', 'category_id' => $id]);?></li>
  </ul>
</div>
