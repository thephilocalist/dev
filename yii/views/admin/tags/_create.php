<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="box-body">
  <?php $form = ActiveForm::begin(); ?>
  <?= $form->field($model, 'id')->label(false)->textInput(['class' => 'hide']);?>
  <div class="col-md-12">
  <?= $form->field($model, 'title')->textInput()->label('Title');?>
  </div>
    <div class="col-md-4">
    <?= $form->field($model, 'meta_title')->textInput()->label('Meta Title');?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'meta_description')->textInput()->label('Meta Description');?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'meta_keywords')->textInput()->label('Meta Keywords');?>
    </div>
  <?= $form->errorSummary($model, ['header' => '']); ?>
</div>
<div class="box-footer">
  <div class="col-md-12">
  <?= Html::submitButton('Submit', ['class' => 'ui fluid large teal submit button btn btn-primary btn-lg btn-block btn-flat mb-15']) ?>
  </div>
</div>
<?php ActiveForm::end(); ?>
