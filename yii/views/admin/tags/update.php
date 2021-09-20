<?php
use yii\helpers\Html;
$this->title = 'Update '.$model->title;
?>
<div class="content">
  <div class="row">
  <?php $this->beginContent('@app/views/admin/tags/tagsmenu.php', ['active' => 'titles', 'id' => $model->id]); ?>
  <?php $this->endContent(); ?>

  <div class="spacer-30"></div>

  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Update Tags</h3>
      </div>
      <?php $this->beginContent('@app/views/admin/tags/_update.php', ['model' => $model, 'redirect' => 0, 'buttonText' => 'Update']); ?>
      <?php $this->endContent(); ?>
    </div>
  </div>
  </div>
</div>
