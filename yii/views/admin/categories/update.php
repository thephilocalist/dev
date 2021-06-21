<?php
use yii\helpers\Html;
$this->title = 'Update Category';
?>
<div class="content">
  <div class="row">

  <div class="col-md-12">
    <?=Html::a('<i class="fa fa-caret-left" aria-hidden="true"></i> Back to all Categories', ['/Xthehiddenphiloclstadminurlx/categories/index'], ['class' => 'btn btn-primary'])?><br><br><br><br>
  </div>
  
  <div class="col-md-2">
  <?=Html::a('Create Article', ['/xthehiddenphiloclstadminurlx/articles/create'], ['class' => 'btn btn-success'])?>
  </div>
  <div class="col-md-2">
  <?=Html::a('Category Articles', ['/xthehiddenphiloclstadminurlx/categories/articles?id='.$model->id], ['class' => 'btn btn-success'])?>
  </div>

  <div class="spacer-30"></div>

  <?php $this->beginContent('@app/views/admin/categories/categoriesmenu.php', ['active' => 'titles', 'id' => $model->id]); ?>
  <?php $this->endContent(); ?>

  <div class="spacer-30"></div>

  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Update Category</h3>
      </div>
      <?php $this->beginContent('@app/views/admin/categories/_create.php', ['model' => $model, 'redirect' => 0, 'buttonText' => 'Update']); ?>
      <?php $this->endContent(); ?>
    </div>
  </div>
  </div>
</div>
