<?php
use yii\helpers\Html;
use yii\jui\JuiAsset;
/* 
Yii::$app->view->registerMetaTag(['name' => 'offer', 'content' => $offer->id]); */
$this->registerJsFile('@web/libs/angular/angular.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/libs/angular/angular-sanitize.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerCssFile('@web/libs/dropzone/dropzone.css', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/libs/dropzone/dropzone.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/admin/js/users/user.get.js', ['depends' => [app\assets\admin\Assets::className()]]);
JuiAsset::register($this);

$this->title = 'Admin Users';
?>
<div class="content">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Users List</h3>
          <div class="box-tools pull-right">
            <div class="btn-group">
              <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-plus"></i>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><?=Html::a('Create New User', ['create']); ?></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="content" ng-app="App" ng-controller="controller">
          <div class=" box-primary" ng-cloak ng-show="users.length">
              <ul class="products-list product-list-in-box" id="">
                <li class="item" ng-repeat="user in users" id="user-{{user.id}}">
                  <div class="product-info">
                    <p>{{user.username}}</p>
                  </div>
                  <div class="product-info">
                      <button class="btn btn-danger pull-right margin" role="button" ng-click="delete(user.id)">Delete</button>
                  </div>
                  <div class="product-info">
                      <a class="btn btn-success pull-right margin" role="button" href="/Xthehiddenphiloclstadminurlx/adminusers/update?id={{user.id}}">Update</a>
                  </div>
                </li>
              </ul>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
