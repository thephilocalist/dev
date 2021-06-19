var app = angular.module("App", ['ngSanitize']);
app.controller('controller', ["$http", "$scope", "$sce", function($http, $scope) {
  $scope.id = $("meta[name=tour]").attr("content");
  $scope.addlanguage = {
    id: ''
  };

  $scope.htmlEncode = function(text) {
    return $sce.trustAsHtml(text);
  };

  $scope.reInit = function() {
    $http({
      url: $("meta[name=path]").attr("content") + '/tours/tour-languages?type=get',
      method: "GET",
      headers: {
        'Cache-Control': 'no-cache'
      },
      params: {
        id: $scope.id
      },
    }).success(function(data) {
      $scope.languages = data.languages;
      $scope.tourlanguages = data.tourlanguages;
    });
  }
  $scope.reInit();

  $scope.isLanguage = function(id) {
    if (_.findIndex($scope.tourlanguages, function(o) {
        return o.lang_id == id;
      }) > -1) {
      return 0;
    } else {
      return 1;
    }
  };

  $scope.add = function(id) {
    var senddata = {
      language: $scope.addlanguage.id,
      tour: $scope.id,
      _csrf: yii.getCsrfToken()
    };
    $http({
        url: $("meta[name=path]").attr("content") + '/tours/tour-languages?type=add',
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
        $scope.addlanguage.id = '';
        $scope.reInit();
      });
  };

  $scope.delete = function(id) {
    var senddata = {
      language: id,
      tour: $scope.id,
      _csrf: yii.getCsrfToken()
    };
    $http({
        url: $("meta[name=path]").attr("content") + '/tours/tour-languages?type=delete',
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
