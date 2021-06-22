<?php
use yii\helpers\Html;
use yii\jui\JuiAsset;

$this->registerJsFile('@web/libs/angular/angular.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/libs/angular/angular-sanitize.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerCssFile('@web/libs/dropzone/dropzone.css', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/libs/dropzone/dropzone.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/admin/js/authors/authors.get.js', ['depends' => [app\assets\admin\Assets::className()]]);
JuiAsset::register($this);

$this->title = 'Authors';
?>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Authors List</h3>
          <div class="box-tools pull-right">
            <div class="btn-group">
              <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-plus"></i>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><?=Html::a('Create New Author', ['create']); ?></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="content" ng-app="App" ng-controller="controller">
          <div class=" box-primary" ng-cloak ng-show="authors.length">
              <ul class="products-list product-list-in-box" id="">
                <li class="item" ng-repeat="author in authors" id="{{author.id}}">
                  <div class="product-img">
                    <img ng-src="/images/authors/{{author.photo}}@100x100.jpg">
                  </div>
                  <div class="product-info">
                    <p><a style="color:black;" class="" href="/Xthehiddenphiloclstadminurlx/authors/update?id={{author.id}}">{{author.name}}</a></p>
                  </div><!-- 
                  <div class="product-info">
                      <button class="btn btn-danger pull-right margin" role="button" ng-click="update(product.id)">Delete</button>
                  </div> -->
                  <div class="product-info">
                      <a class="btn btn-success pull-right margin" role="button" href="/Xthehiddenphiloclstadminurlx/authors/update?id={{author.id}}">Update</a>
                      <a class="btn btn-primary pull-right margin" role="button" href="/Xthehiddenphiloclstadminurlx/articles/index?ArticlesSearch[author_id]={{author.id}}">Author Articles</a>
                  </div>
                </li>
              </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
