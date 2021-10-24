<?php

use yii\helpers\Html;
use app\models\db\Articles;
use app\models\db\Authors;
use app\models\db\Categories;
use app\models\db\Tags;
use app\models\db\ArticleCategories;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\switchinput\SwitchInput;
use kartik\datetime\DateTimePicker;

$authors = Authors::find()->asArray()->all();
$categories = Categories::find()->asArray()->all();
$categorieslist = Categories::find()->select(['title', 'id'])->indexBy('id')->column();
$article_categories = $model->getCategory()->all();
$artcl_categories = [];
$tags = Tags::find()->asArray()->all();
$article_tags = $model->getTag()->all();
$artcl_tags = [];
if($model->publish_at){
    $model->publish_at = date('M d, Y H:i:s', $model->publish_at);
}

foreach ($article_categories as $article_category) {
    array_push($artcl_categories, $article_category['category_id']);
}
foreach ($article_tags as $article_tag) {
    array_push($artcl_tags, $article_tag['tag_id']);
}
?>

<div class="box-body">
  <?php $form = ActiveForm::begin(); ?>
  <?= $form->field($model, 'id')->label(false)->textInput(['class' => 'hide']);?>
  <!-- 
  <div class="col-md-6">
  <= $form->field($model, 'title')->textInput()->label('Title');?>
  </div> -->
  <div class="row">
    <div class=col-lg-3>
            <?= $form->field($model, 'published')->widget(SwitchInput::classname(),[
                'type' => SwitchInput::CHECKBOX
            ])->label('Published');?>
    </div>
    <div class=col-lg-3>
            <?= $form->field($model, 'featured')->widget(SwitchInput::classname(),[
                'type' => SwitchInput::CHECKBOX
            ])->label('Featured');?>
    </div>
    <div class=col-lg-4>
            <?= $form->field($model, 'publish_at')->widget(DateTimePicker::className(),[
                'pluginOptions' => [
                    'name' => 'datetime_10',
                    'options' => ['placeholder' => 'Select operating time ...'],
                    'convertFormat' => true,
                    'format' => 'M d, yyyy H:i:s',
                    'startDate' => time(),
                    ]
            ])->label('Publish at');?>
    </div>
  </div>
  <div class="row"><br>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <p><b>Choose Categories:</b></p>
        </div>
    <?php foreach($categories as $category):?>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <?php if(in_array($category['id'], $artcl_categories)):?>
                <?= $form->field($model, 'Categories')->checkbox(['name' => $category['title'], 'checked' => true])->label($category['title']); ?>
            <?php else:?>
                <?= $form->field($model, 'Categories')->checkbox([ 'name' => $category['title'], 'checked' => false])->label($category['title']); ?>
            <?php endif;?>
        </div>
    <?php endforeach;?>
    </div>
  </div>
  <div class="row"><br>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <p><b>Choose Tags:</b></p>
        </div>
    <?php foreach($tags as $tag):?>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <?php if(in_array($tag['id'], $artcl_tags)):?>
                <?= $form->field($model, 'Tags')->checkbox(['name' => $tag['title'], 'checked' => true])->label($tag['title']); ?>
            <?php else:?>
                <?= $form->field($model, 'Tags')->checkbox([ 'name' => $tag['title'], 'checked' => false])->label($tag['title']); ?>
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
