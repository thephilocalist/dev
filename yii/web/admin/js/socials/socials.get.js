var app = angular.module("App", ['ngSanitize']);
app.controller('controller', ["$http", "$scope", "$sce", function($http, $scope) {
    $scope.id = $("meta[name=offer]").attr("content");

    $scope.htmlEncode = function(text) {
      return $sce.trustAsHtml(text);
    };

    callBck = function() {
      return $scope.reInit();
    }

    $scope.reInit = function() {
      $http({
        url: '/Xthehiddenphiloclstadminurlx/socials/rest-sort',
        method: "GET",
        headers: {
          'Cache-Control': 'no-cache'
        },
        params: {
          id: $scope.id
        },
      }).success(function(data) {
        $scope.socials = data.socials;
      });
    }
    $scope.reInit();


    $scope.update = function(id) {
      var senddata = {
        id: id,
        _csrf: yii.getCsrfToken()
      };
      $http({
        url: '/Xthehiddenphiloclstadminurlx/socials/update',
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

}]);