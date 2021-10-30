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
JS
);

?>
<div class="box-body">
  <?php $form = ActiveForm::begin(); ?>
  <?= $form->field($model, 'id')->label(false)->textInput(['class' => 'hide']);?>
  <div class="col-md-6">
  <?= $form->field($model, 'name')->textInput()->label('Name');?>
  </div>
  <div class="col-md-12">
  <?= $form->field($model, 'bio')->label('Bio')->textarea(['class' => 'rich', 'id' => 'description_text', 'rows' => 5]) ?><br> 
  </div>
  <?= $form->errorSummary($model, ['header' => '']); ?>
</div>
<div class="box-footer">
  <div class="col-md-12">
  <?= Html::submitButton('Submit', ['class' => 'ui fluid large teal submit button btn btn-primary btn-lg btn-block btn-flat mb-15']) ?>
  </div>
</div>
<?php ActiveForm::end(); ?>
