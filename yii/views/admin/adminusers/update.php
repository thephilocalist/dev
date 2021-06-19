<?php
use yii\helpers\Html;
$this->title = 'Update Admin User';
?>
<div class="content">
  <div class="row">

  <div class="col-md-12">
    <?=Html::a('<i class="fa fa-caret-left" aria-hidden="true"></i> Back to all Users', ['/Xthehiddenphiloclstadminurlx/adminusers/index'], ['class' => 'btn btn-primary'])?>
  </div>

  <div class="spacer-30"></div>

  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Update User</h3>
      </div>
      <?php $this->beginContent('@app/views/admin/adminusers/_update.php', ['model' => $model, 'redirect' => 0, 'buttonText' => 'Update']); ?>
      <?php $this->endContent(); ?>
    </div>
  </div>
  </div>
</div>
