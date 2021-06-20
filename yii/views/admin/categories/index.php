<?php
use yii\helpers\Html;
use yii\jui\JuiAsset;
/* 
Yii::$app->view->registerMetaTag(['name' => 'offer', 'content' => $offer->id]); */
$this->registerJsFile('@web/libs/angular/angular.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/libs/angular/angular-sanitize.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerCssFile('@web/libs/dropzone/dropzone.css', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/libs/dropzone/dropzone.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/admin/js/categories/categories.sort.js', ['depends' => [app\assets\admin\Assets::className()]]);
JuiAsset::register($this);

$this->title = 'Categories';
?>
<div class="content">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Categories List</h3>
          <div class="box-tools pull-right">
            <div class="btn-group">
              <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-plus"></i>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><?=Html::a('Create New Category', ['create']); ?></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="content" ng-app="App" ng-controller="controller">
          <div class=" box-primary" ng-cloak ng-show="categories.length">
              <ul class="products-list product-list-in-box" id="orderedlist">
                <li class="item" ng-repeat="category in categories" id="category-{{category.id}}">
                  <div class="product-img">
                    <img ng-src="/images/categories/{{category.photo}}@100x100.jpg">
                  </div>
                  <div class="product-info">
                    <p><a style="color:black;" class="" href="/Xthehiddenphiloclstadminurlx/categories/update?id={{category.id}}">{{category.title}}</a></p>
                  </div>
                  <div class="product-info">
                      <button class="btn btn-danger pull-right margin" role="button" ng-click="delete(category.id)">Delete</button>
                  </div>
                  <div class="product-info">
                      <a class="btn btn-success pull-right margin" role="button" href="/Xthehiddenphiloclstadminurlx/categories/update?id={{category.id}}">Update</a>
                  </div>
                </li>
              </ul>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
