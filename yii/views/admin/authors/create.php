<?php
use yii\helpers\Html;
$this->title = 'Create New Author';
?>
<div class="content">
  <div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <?php $this->beginContent('@app/views/admin/authors/_create.php', ['model' => $model, 'buttonText' => 'Create']); ?>
      <?php $this->endContent(); ?>
    </div>
  </div>
  </div>
</div>
