<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>
<div class="box-body">
  <?php $form = ActiveForm::begin(); ?>
  <?= $form->field($model, 'id')->label(false)->textInput(['class' => 'hide']);?>
  <div class="col-md-6">
  <?= $form->field($model, 'username')->textInput()->label('Username');?>
  </div>
  <div class="col-md-6">
  <?= $form->field($model, 'password')->textInput()->label('Password');?>
  </div>
  
  <?= $form->errorSummary($model, ['header' => '']); ?>
</div>
<div class="box-footer">
  <div class="col-md-12">
  <?= Html::submitButton('Submit', ['class' => 'ui fluid large teal submit button btn btn-primary btn-lg btn-block btn-flat mb-15']) ?>
  </div>
</div>
<?php ActiveForm::end(); ?>
