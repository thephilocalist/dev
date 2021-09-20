<?php
use yii\helpers\Html;
use yii\jui\JuiAsset;

$this->registerJsFile('@web/libs/angular/angular.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/libs/angular/angular-sanitize.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerCssFile('@web/libs/dropzone/dropzone.css', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/libs/dropzone/dropzone.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/admin/js/tags/tags.get.js', ['depends' => [app\assets\admin\Assets::className()]]);
JuiAsset::register($this);

$this->title = 'Tags';
?>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tags List</h3>
          <div class="box-tools pull-right">
            <div class="btn-group">
              <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-plus"></i>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><?=Html::a('Add Tag', ['create']); ?></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="content" ng-app="App" ng-controller="controller">
          <div class=" box-primary" ng-cloak ng-show="tags.length">
              <ul class="products-list product-list-in-box" id="">
                <li class="item" ng-repeat="tag in tags" id="{{tag.id}}">
                  <div class="product-info">
                    <p><a style="color:black;" class="" href="/Xthehiddenphiloclstadminurlx/tags/update?id={{tags.id}}">{{tag.title}}</a></p>
                  </div>
                  <div class="product-info">
                      <a class="btn btn-success pull-right margin" role="button" href="/Xthehiddenphiloclstadminurlx/tags/update?id={{tag.id}}">Update</a>
                  </div>
                  <div class="product-info">
                      <button class="btn btn-danger pull-right margin" role="button" ng-click="delete(tag.id)">Delete</button>
                  </div>
                </li>
              </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>