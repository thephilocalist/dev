<?php

use yii\helpers\Html;
use app\models\db\Authors;
use app\models\db\Categories;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$authors = Authors::find()->asArray()->all();
$categories = Categories::find()->asArray()->all();

?>
<div class="box-body">
  <?php $form = ActiveForm::begin(); ?>
  <div class="col-md-6">
  <?= $form->field($model, 'title')->textInput()->label('Title');?>
  </div>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
    <?= $form->field($model, 'author_id')->dropDownList(ArrayHelper::map($authors, 'id', 'name'), ['prompt'=>'Eπιλέξτε τον author']) ?>
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
