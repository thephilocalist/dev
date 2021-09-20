<?php
use yii\helpers\Html;
$this->title = 'Create Tag';
?>
<div class="content">
  <div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <?php $this->beginContent('@app/views/admin/tags/_create.php', ['model' => $model, 'buttonText' => 'Create']); ?>
      <?php $this->endContent(); ?>
    </div>
  </div>
  </div>
</div>
