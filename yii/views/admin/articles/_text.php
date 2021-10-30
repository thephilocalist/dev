<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJs(
<<<JS

(function($) {
  $('#description_text').redactor({
    plugins: ['source', 'video', 'alignment', 'fontcolor', 'bookingButton', 'hotelBar', 'fullscreen','bufferbuttons',],
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
    plugins: ['source', 'video', 'alignment', 'fontcolor', 'bookingButton', 'hotelBar', 'fullscreen','bufferbuttons',],
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
  <?= $form->field($model, 'title')->textInput()->label('Title');?>
  </div>
  <div class="col-md-6">
  <?= $form->field($model, 'subtitle')->textInput()->label('Subtitle');?>
  </div>
  <div class="col-md-12">
  <?= $form->field($model, 'text')->label('Text')->textarea(['class' => 'rich', 'id' => 'characteristics_text', 'rows' => 10]) ?><br> 
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
