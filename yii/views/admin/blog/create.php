<?php
use yii\helpers\Html;
$this->title = 'Create New Article';
?>
<div class="content">
  <div class="row">

  <div class="col-md-12">
    <?=Html::a('<i class="fa fa-caret-left" aria-hidden="true"></i> Back to all Articles', ['/Xthehiddenphiloclstadminurlx/blog/index'], ['class' => 'btn btn-primary'])?>
  </div>

  <div class="spacer-30"></div>
  <div class="col-md-12">
    <div class="box box-primary">
      <?php $this->beginContent('@app/views/admin/blog/_create.php', ['model' => $model, 'buttonText' => 'Create']); ?>
      <?php $this->endContent(); ?>
    </div>
  </div>
  </div>
</div>
