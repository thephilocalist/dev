<?php
use yii\helpers\Html;

$this->registerJsFile('@web/libs/angular/angular.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/libs/angular/angular-sanitize.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/admin/js/blog/articles.js', ['depends' => [app\assets\admin\Assets::className()]]);

$this->title = 'Blog';

?>
<div class="content">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Articles List</h3>
          <div class="box-tools pull-right">
            <div class="btn-group">
              <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-plus"></i>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><?=Html::a('Create New Article', ['create']); ?></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="content" ng-app="App" ng-controller="controller">
            <div class=" box-primary" ng-cloak ng-show="articles.length">
                <ul class="products-list product-list-in-box" id="orderedlist">
                    <li class="item" ng-repeat="article in articles" id="article-{{article.id}}">
                  <div class="product-img">
                    <img ng-src="/images/articles/{{article.photo}}@100x100.jpg">
                  </div>
                    <div class="product-img">
                        <p>{{article.title}}</p>
                        <!-- <img ng-src="/img/offers/<=$offer->id?>/{{photo.photo}}@100x100.jpg"> -->
                    </div>
                    <div class="product-info">
                        <button class="btn btn-danger pull-right margin" role="button" ng-click="delete(article.id)">Delete</button>
                    </div>
                    <div class="product-info">
                        <a class="btn btn-success pull-right margin" role="button" href="/Xthehiddenphiloclstadminurlx/blog/update?id={{article.id}}">Update</a>
                    </div>
                    </li>
                </ul>
            </div>
        </div>
      </div>
    </div>

  </div>
</div>
