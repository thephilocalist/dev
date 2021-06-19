<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJs(
<<<JS

(function($) {
  $('#description_text').redactor({
    plugins: ['source', 'video', 'alignment', 'fontcolor', 'bookingButton', 'hotelBar', 'fullscreen'],
    imageUpload: '/upload/redactor-photo',
    imageUploadParam: 'imageFile',
    imageUploadFields: {
      _csrf: yii.getCsrfToken(),
    },
    imageResizable: true,
    minHeight: 300,
    imagePosition: true,
    autosaveFields: {
      id: 3,
    },
  });
})(jQuery);
(function($) {
  $('#characteristics_text').redactor({
    plugins: ['source', 'video', 'alignment', 'fontcolor', 'bookingButton', 'hotelBar', 'fullscreen'],
    imageUpload: '/upload/redactor-photo',
    imageUploadParam: 'imageFile',
    imageUploadFields: {
      _csrf: yii.getCsrfToken(),
    },
    imageResizable: true,
    minHeight: 300,
    imagePosition: true,
    autosaveFields: {
      id: 3,
    },
  });
})(jQuery);
JS
);

?>
<div class="box-body">
  <?php $form = ActiveForm::begin(); ?>
  <div class="col-md-6">
  <?= $form->field($model, 'name')->textInput()->label('Name');?>
  </div>
  <?= $form->field($model, 'id')->label(false)->textInput(['class' => 'hide']);?>
  <div class="col-md-4">
  <?= $form->field($model, 'meta_title')->textInput()->label('Meta Title');?>
  </div>
  <div class="col-md-4">
  <?= $form->field($model, 'meta_description')->textInput()->label('Meta Description');?>
  </div>
  <div class="col-md-4">
  <?= $form->field($model, 'meta_keywords')->textInput()->label('Meta Keywords');?>
  </div>
  <div class="col-md-3">
  <?= $form->field($model, 'facebook')->textInput()->label('Facebook');?>
  </div>
  <div class="col-md-2">
  <?= $form->field($model, 'twitter')->textInput()->label('Twitter');?>
  </div>
  <div class="col-md-2">
  <?= $form->field($model, 'linkedin')->textInput()->label('Linked In');?>
  </div>
  <div class="col-md-2">
  <?= $form->field($model, 'google')->textInput()->label('Google');?>
  </div>
  <div class="col-md-2">
  <?= $form->field($model, 'instagram')->textInput()->label('Instagram');?>
  </div>
  <div class="col-md-2">
  <?= $form->field($model, 'pinterest')->textInput()->label('Pinterest');?>
  </div>
  <div class="col-md-12">
  <?= $form->field($model, 'bio')->label('Bio')->textarea(['class' => 'rich', 'id' => 'characteristics_text', 'rows' => 10]) ?><br> 
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
