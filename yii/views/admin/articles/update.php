<?php
use yii\helpers\Html;
$this->title = 'Update Article';
?>
<div class="content">
  <div class="row">

  <div class="col-md-12">
    <?=Html::a('<i class="fa fa-caret-left" aria-hidden="true"></i> Back to all Articles', ['/Xthehiddenphiloclstadminurlx/articles/index'], ['class' => 'btn btn-primary'])?>
  </div>

  <div class="spacer-30"></div>

  <?php $this->beginContent('@app/views/admin/articles/articlesmenu.php', ['active' => 'titles', 'id' => $model->id]); ?>
  <?php $this->endContent(); ?>
  <div class="spacer-30"></div>

  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Update Article</h3>

        <div class="spacer-20"></div>

        <div class="col-md-12">
          <?=Html::a($model->published ? 'Unpublish' : 'Publish', [$model->published ? '/Xthehiddenphiloclstadminurlx/articles/disable' : '/Xthehiddenphiloclstadminurlx/articles/enable', 'id' => $model->id], ['class' => $model->published ? 'btn btn-danger' : 'btn btn-success'])?>
        </div>

        <?php $this->beginContent('@app/views/admin/articles/_update.php', ['model' => $model, 'redirect' => 0, 'buttonText' => 'Update']); ?>
        <?php $this->endContent(); ?>
      </div>
    </div>
  </div>
  </div>
</div>
