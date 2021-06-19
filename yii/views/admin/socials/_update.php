<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="box-body">
  <?php $form = ActiveForm::begin(); ?>
  <?= $form->field($model, 'id')->label(false)->textInput(['class' => 'hide']);?>
  <div class="col-md-6">
  <?= $form->field($model, 'name')->textInput()->label('Name');?>
  </div>
  <div class="col-md-6">
  <?= $form->field($model, 'link')->textInput()->label('Link');?><br> 
  <?= $form->errorSummary($model, ['header' => '']); ?><!-- 
  <div class="alert alert-success success-msg">
    <strong>Success!</strong> Your data saved succesfully!
  </div> -->
</div>
<div class="box-footer">
  <div class="col-md-12">
  <?= Html::submitButton('Submit', ['class' => 'ui fluid large teal submit button btn btn-primary btn-lg btn-block btn-flat mb-15']) ?>
  </div>
</div>
<?php ActiveForm::end(); ?>
