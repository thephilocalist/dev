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
  <div class="col-md-12">
  <?= $form->field($model, 'text')->label('Text')->textarea(['class' => 'rich', 'id' => 'description_text', 'rows' => 5]) ?><br> 
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
