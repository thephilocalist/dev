<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use kartik\file\FileInput;
use yii\jui\JuiAsset;
use yii\widgets\ActiveForm;

Yii::$app->view->registerMetaTag(['name' => 'category', 'content' => $model->id]);
$this->registerJsFile('@web/libs/angular/angular.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/libs/angular/angular-sanitize.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerCssFile('@web/libs/dropzone/dropzone.css', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/libs/dropzone/dropzone.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/admin/js/offers/offer.photos.js', ['depends' => [app\assets\admin\Assets::className()]]);
JuiAsset::register($this);
/* 
$this->title = ucfirst($type); */
?>


<div class="content" ng-app="App" ng-controller="controller">
<div class="box">
<div class="clearfix"></div>
  <div class="box-header">
    Upload Image
  </div>
  <div class="box-body">
    <?=
    FileInput::widget([
        'name' => 'imageFile',
        'options'=> [
            'multiple'=> true
        ],
        'pluginOptions' => [
            'uploadUrl' => Url::to(['/Xthehiddenphiloclstadminurlx/offers/upload-photo', 'id' => $model->id]),
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
                <img ng-src="/img/categories/<?=$model->id?>/{{photo.photo}}@100x100.jpg">
              </div>
              <div class="product-info">
                  <button class="btn btn-danger pull-right" role="button" ng-click="delete(photo.id)">Delete</button>
              </div>
            </li>
          </ul>
        </div>
      </div><!-- 
  <div class="ui cards">
    <php foreach ($photos as $photo):?>
      <div class="card property-card" style="width:200px;">
        <div class="content" style="background:url(/img/offers/<=$photo->offer_id?>/<=$photo->photo?>@200x200.jpg); height:200px; background-position:center !important; background-size:cover !important;
    background-repeat:no-repeat !important; "> </div>
        <php echo Html::a(
                            '<button type="button" class="btn btn-danger btn-block add-hotel">Delete</button>',
                            '/Axassderweruser/offers/delete-photo?id='.$photo->id,
                            [
                                'title' => 'Delete',
                                'data-pjax' => '0',
                                'data-photo' => $photo->id,
                                'data-method' => 'post',
                            ]
                        );
          ?>
      </div>
      <php endforeach;?>
  </div> -->
</div>
</div>