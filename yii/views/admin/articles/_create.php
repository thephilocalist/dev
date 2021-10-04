<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\db\Authors;
use app\models\db\Categories;

$authors = Authors::find()->asArray()->all();
$categories = Categories::find()->asArray()->all();
?>

<?php $form = ActiveForm::begin([
  'errorSummaryCssClass' => 'alert alert-danger',
]); ?>
<!-- 
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map($categories, 'id', 'title'), ['prompt'=>'Eπιλέξτε την κατηγορία']) ?>
</div> -->

<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
  <?= $form->field($model, 'author_id')->dropDownList(ArrayHelper::map($authors, 'id', 'name'), ['prompt'=>'Eπιλέξτε τον author']) ?>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>
</div>

<div class="col-xs-12">
  <?=$form->errorSummary($model, ['header' => '']); ?>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-lg btn-block']) ?>
</div>

<?php ActiveForm::end(); ?>
