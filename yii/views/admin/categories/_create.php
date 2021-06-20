<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\switchinput\SwitchInput;

?>
<div class="box-body">
  <?php $form = ActiveForm::begin(); ?>
  <?= $form->field($model, 'id')->label(false)->textInput(['class' => 'hide']);?>
  <div class="row">
    <div class=col-lg-2>
      <?= $form->field($model, 'enable')->widget(SwitchInput::classname(),[
          'type' => SwitchInput::CHECKBOX
      ])->label('Enable');?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
    <?= $form->field($model, 'title')->textInput()->label('Title');?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
    <?= $form->field($model, 'meta_title')->textInput()->label('Meta Title');?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'meta_description')->textInput()->label('Meta Description');?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'meta_keywords')->textInput()->label('Meta Keywords');?>
    </div>
  </div>
  
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
