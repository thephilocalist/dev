var app = angular.module("App", ['ngSanitize']);
app.controller('controller', ["$http", "$scope", "$sce", function($http, $scope) {
  $scope.id = $("meta[name=article]").attr("content");
  $scope.addsubcategory = {
    id: ''
  };

  $scope.htmlEncode = function(text) {
    return $sce.trustAsHtml(text);
  };

  $scope.reInit = function() {
    $http({
      url: $("meta[name=path]").attr("content") + '/blog/article-get-subcategories',
      method: "GET",
      headers: {
        'Cache-Control': 'no-cache'
      },
      params: {
        id: $scope.id
      },
    }).success(function(data) {
      $scope.article = data.article;
      $scope.article._csrf = yii.getCsrfToken();
      $scope.categories = data.categories;
      $scope.subcategories = data.subcategories;
      $scope.articlesubcategories = data.articlesubcategories;
    });
  }
  $scope.reInit();

  $scope.isSubCategory = function(id) {
    if (_.findIndex($scope.articlesubcategories, function(o) {
        return o.subcategory_id == id;
      }) > -1) {
      return 0;
    } else {
      return 1;
    }
  };

  $scope.changeCategory = function() {
    $scope.update();
    $scope.reInit();
  };

  $scope.update = function(type) {
    $http({
        url: $("meta[name=path]").attr("content") + '/blog/update-article-rest',
        method: "POST",
        headers: {
          'Cache-Control': 'no-cache',
          'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8'
        },
        transformRequest: function(obj) {
          var str = [];
          for (var p in obj) str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
          return str.join("&");
        },
        data: $scope.article
      })
      .success(function(data) {});
  };

  $scope.add = function(id) {
    var senddata = {
      subcategory: $scope.addsubcategory.id,
      article: $scope.id,
      _csrf: yii.getCsrfToken()
    };
    $http({
        url: $("meta[name=path]").attr("content") + '/blog/article-add-subcategory',
        method: "POST",
        headers: {
          'Cache-Control': 'no-cache',
          'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8'
        },
        transformRequest: function(obj) {
          var str = [];
          for (var p in obj) str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
          return str.join("&");
        },
        data: senddata
      })
      .success(function(data) {
        $scope.addsubcategory.id = '';
        $scope.reInit();
      });
  };

  $scope.delete = function(id) {
    var senddata = {
      id: id,
      _csrf: yii.getCsrfToken()
    };
    $http({
        url: $("meta[name=path]").attr("content") + '/blog/article-delete-subcategory',
        method: "POST",
        headers: {
          'Cache-Control': 'no-cache',
          'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8'
        },
        transformRequest: function(obj) {
          var str = [];
          for (var p in obj) str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
          return str.join("&");
        },
        data: senddata
      })
      .success(function(data) {
        $scope.reInit();
      });
  };

}]);
