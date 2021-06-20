<?php

use yii\helpers\Html;
use app\models\db\Articles;
use app\models\db\Authors;
use app\models\db\Categories;
use app\models\db\ArticleCategories;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\switchinput\SwitchInput;


$authors = Authors::find()->asArray()->all();
$categories = Categories::find()->asArray()->all();
$article_categories = $model->getCategory()->all();
$artcl_categories = [];

foreach ($article_categories as $article_category) {
    array_push($artcl_categories, $article_category['category_id']);
}/* 
print_r($categories);
print_r($artcl_categories); die; */
?>
<div class="box-body">
  <?php $form = ActiveForm::begin(); ?>
  <?= $form->field($model, 'id')->label(false)->textInput(['class' => 'hide']);?>
  <!-- 
  <div class="col-md-6">
  <= $form->field($model, 'title')->textInput()->label('Title');?>
  </div> -->
  <div class="row">
    <div class=col-lg-2>
            <?= $form->field($model, 'published')->widget(SwitchInput::classname(),[
                'type' => SwitchInput::CHECKBOX
            ])->label('Published');?>
    </div>
    <div class=col-lg-2>
            <?= $form->field($model, 'main')->widget(SwitchInput::classname(),[
                'type' => SwitchInput::CHECKBOX
            ])->label('Main');?>
    </div>
    <div class=col-lg-2>
            <?= $form->field($model, 'favourite')->widget(SwitchInput::classname(),[
                'type' => SwitchInput::CHECKBOX
            ])->label('Favourite');?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
    <?php foreach($categories as $category):?>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <?php if(in_array($category['id'], $artcl_categories)):?>
                <?= $form->field($model, 'Categories')->checkbox(['name' => $category['id'], 'checked' => true])->label($category['title']); ?>
            <?php else:?>
                <?= $form->field($model, 'Categories')->checkbox([ 'name' => $category['id'], 'checked' => false])->label($category['title']); ?>
            <?php endif;?>
        </div>
    <?php endforeach;?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3">
        <?= $form->field($model, 'meta_title')->textInput()->label('Meta Title');?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'meta_description')->textInput()->label('Meta Description');?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'meta_keywords')->textInput()->label('Meta Keywords');?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'author_id')->dropDownList(ArrayHelper::map($authors, 'id', 'name'), ['prompt'=>'Eπιλέξτε τον author']) ?>
    </div>
  </div>
  <?= $form->errorSummary($model, ['header' => '']); ?>
</div>
<div class="box-footer">
  <div class="col-md-12">
  <?= Html::submitButton('Submit', ['class' => 'ui fluid large teal submit button btn btn-primary btn-lg btn-block btn-flat mb-15']) ?>
  </div>
</div>
<?php ActiveForm::end(); ?>
