<?php
use yii\helpers\Html;
$this->title = 'Create New Category';
?>
<div class="content">
  <div class="row">

  <div class="col-md-12">
    <?=Html::a('<i class="fa fa-caret-left" aria-hidden="true"></i> Back to all categories', ['/categories/index'], ['class' => 'btn btn-primary'])?>
  </div>

  <div class="spacer-30"></div>
  <div class="col-md-12">
    <div class="box box-primary"><!-- 
      <div class="box-header with-border">
        <h3 class="box-title">Create New Category</h3>
      </div> -->
      <?php $this->beginContent('@app/views/admin/categories/_create.php', ['model' => $model, 'buttonText' => 'Create']); ?>
      <?php $this->endContent(); ?>
    </div>
  </div>
  </div>
</div>
