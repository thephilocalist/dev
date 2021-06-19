var app = angular.module("App", ['ngSanitize']);
app.controller('controller', ["$http", "$scope", "$sce", function($http, $scope) {
  $scope.id = $(".category_id").attr("id");

  $scope.htmlEncode = function(text) {
    return $sce.trustAsHtml(text);
  };

  callBck = function() {
    return $scope.reInit();
  }

  $scope.reInit = function() {
    $http({
      url: '/Xthehiddenphiloclstadminurlx/subcategories/rest-sort',
      method: "GET",
      headers: {
        'Cache-Control': 'no-cache'
      },
      params: {
        category_id: $scope.id
      },
    }).success(function(data) {
      $scope.subcategories = data.subcategories;
    });
  }
  $scope.reInit();

  $scope.delete = function(id) {
    var senddata = {
      id: id,
      _csrf: yii.getCsrfToken(),
      category_id: $scope.id
    };
    $http({
      url: '/Xthehiddenphiloclstadminurlx/subcategories/delete',
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
  }

  $scope.update = function(id) {
      var senddata = {
          id: id,
          _crf: yii.getCsrfToken()
      };
      $http({
          url: '/Xthehiddenphiloclstadminurlx/subcategories/update',
          method : "GET",
          params: {
            redirect: id
          },
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
      })/* 
      .success(function(data) {
        $scope.reInit();
      }); */
  }

}]);
