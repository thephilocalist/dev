<?php
use yii\helpers\Html;
use yii\jui\JuiAsset;

$this->registerJsFile('@web/libs/angular/angular.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/libs/angular/angular-sanitize.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerCssFile('@web/libs/dropzone/dropzone.css', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/libs/dropzone/dropzone.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/admin/js/socials/socials.get.js', ['depends' => [app\assets\admin\Assets::className()]]);
JuiAsset::register($this);

$this->title = 'Social';
?>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Social List</h3>
          <div class="box-tools pull-right">
            <div class="btn-group">
              <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-plus"></i>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><?=Html::a('Add Social', ['create']); ?></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="content" ng-app="App" ng-controller="controller">
          <div class=" box-primary" ng-cloak ng-show="socials.length">
              <ul class="products-list product-list-in-box" id="">
                <li class="item" ng-repeat="social in socials" id="{{social.id}}">
                  <div class="product-info">
                    <p><a style="color:black;" class="" href="/Xthehiddenphiloclstadminurlx/socials/update?id={{social.id}}">{{social.name}}</a></p>
                  </div>
                  <div class="product-info">
                      <a class="btn btn-success pull-right margin" role="button" href="/Xthehiddenphiloclstadminurlx/socials/update?id={{social.id}}">Update</a>
                  </div>
                  <div class="product-info">
                      <a class="btn btn-danger pull-right margin" role="button" href="/Xthehiddenphiloclstadminurlx/socials/delete?id={{social.id}}">Delete</a>
                  </div>
                </li>
              </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>