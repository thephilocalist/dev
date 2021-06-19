$('#ajax-submit-form').on('beforeSubmit', function() {
  return false;
})
$('#ajax-submit-form').on('submit', function() {
  return false;
})

var app = angular.module("App", ['ngSanitize']);
app.controller('controller', ["$http", "$scope", "$sce", function($http, $scope) {
  $scope.id = $("meta[name=article]").attr("content");
  $scope.addtag = {
    id: ''
  };

  $scope.htmlEncode = function(text) {
    return $sce.trustAsHtml(text);
  };

  $scope.reInit = function() {
    $http({
      url: $("meta[name=path]").attr("content") + '/blog/article-get-tags',
      method: "GET",
      headers: {
        'Cache-Control': 'no-cache'
      },
      params: {
        id: $scope.id
      },
    }).success(function(data) {
      $scope.article = data.article;
      $scope.tags = data.tags;
      $scope.articletags = data.articletags;
    });
  }
  $scope.reInit();

  $scope.createTag = function() {
    var $yiiform = $('#ajax-submit-form-with-angular');
    $.ajax({
        type: $yiiform.attr('method'),
        url: $yiiform.attr('action'),
        data: $yiiform.serializeArray(),
      })
      .done(function(data) {
        $('.errors').hide();
        $('.success-msg').hide();
        if (data.success) {
          $yiiform[0].reset();
          $('#createTag').modal('toggle');
          $scope.addtag.id = data.tag;
          $scope.add(data.tag);
        } else if (data.validation) {
          $yiiform.yiiActiveForm('updateMessages', data.validation, true);
        } else {}
      })
      .fail(function() {})
    return false;
  }

  $scope.isTag = function(id) {
    if (_.findIndex($scope.articletags, function(o) {
        return o.tag_id == id;
      }) > -1) {
      return 0;
    } else {
      return 1;
    }
  };

  $scope.add = function() {
    var senddata = {
      tag: $scope.addtag.id,
      article: $scope.id,
      _csrf: yii.getCsrfToken()
    };
    $http({
        url: $("meta[name=path]").attr("content") + '/blog/article-add-tag',
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
        $scope.addtag.id = '';
      });
  };

  $scope.delete = function(id) {
    var senddata = {
      id: id,
      _csrf: yii.getCsrfToken()
    };
    $http({
        url: $("meta[name=path]").attr("content") + '/blog/article-delete-tag',
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
