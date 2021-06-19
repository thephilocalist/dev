<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use kartik\file\FileInput;
use yii\jui\JuiAsset;
/* 
Yii::$app->view->registerMetaTag(['name' => 'category', 'content' => $category->id]); */
$this->registerJsFile('@web/libs/angular/angular.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/libs/angular/angular-sanitize.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerCssFile('@web/libs/dropzone/dropzone.css', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/libs/dropzone/dropzone.js', ['depends' => [app\assets\admin\Assets::className()]]);/* 
$this->registerJsFile('@web/admin/js/offers/offer.photos.js', ['depends' => [app\assets\admin\Assets::className()]]); */
JuiAsset::register($this);
/* 
$this->title = ucfirst($type); */
?>


<div class="content" ng-app="App" ng-controller="controller">
<div class="box">
<div class="col-md-12">
    <div class="spacer-10"></div>
    <?=Html::a('<i class="fa fa-caret-left" aria-hidden="true"></i> Back to all articles', ['/Xthehiddenphiloclstadminurlx/articles/index'], ['class' => 'btn btn-primary'])?>
</div>
<div class="spacer-30"></div>

<?php $this->beginContent('@app/views/admin/articles/articlesmenu.php', ['active' => 'photo', 'id' => $article->id]); ?>
<?php $this->endContent(); ?>
<div class="spacer-30"></div>
<div class="clearfix"></div>
  <div class="box-header">
    Upload Image
  </div>
  <div class="box-body">
    <?=
    FileInput::widget([
        'name' => 'imageFile',
        'options'=> [
          'multiple'=> false
        ],
        'pluginOptions' => [
            'uploadUrl' => Url::to(['/Xthehiddenphiloclstadminurlx/articles/upload-photo', 'id' => $article->id]),
            'showPreview' => true,
            'showCaption' => true,
            'showRemove' => false,
            'showUpload' => true
        ]
    ]);
    ?>
  </div>
      <div class="box box-primary" ng-cloak ng-show="photos.length">
        <div class="box-header with-border"><h3 class="box-title">All Photos</h3></div>
        <div class="box-body">
          <ul class="products-list product-list-in-box" id="orderedlist">
            <li class="item" ng-repeat="photo in photos" id="photo-{{photo.id}}">
              <div class="product-img">
                <img ng-src="/img/offers/<?=$article->id?>/{{photo.photo}}@100x100.jpg">
              </div>
              <div class="product-info">
                  <button class="btn btn-danger pull-right" role="button" ng-click="delete(photo.id)">Delete</button>
              </div>
            </li>
          </ul>
        </div>
      </div>
</div>
</div>