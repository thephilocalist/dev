google.load('visualization', '1', {
    packages: ["geochart"]
});
var app = angular.module("App", ['ngSanitize']);
app.controller('controller', ["$http", "$scope", "$sce", function($http, $scope) {

  $scope.htmlEncode = function(text) {
    return $sce.trustAsHtml(text);
  };

  $scope.reInit = function() {
    $http({
      url: $("meta[name=path]").attr("content") + '/account/get-statistics',
      method: "GET",
      headers: {
        'Cache-Control': 'no-cache'
      },
      params: {
        id: $scope.id
      },
    }).success(function(data) {
      $scope.countries = data.countries;
      google.setOnLoadCallback(map($scope.countries));
      $('.overlay').hide();
    });
  }
  $scope.reInit();

}]);

function map(countries) {
    var countriesarray = [];
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Country');
    for (var i = 0; i < countries.length; i++) {
        var array = [countries[i].country];
        countriesarray.push(array);
    }
    data.addRows(countriesarray);
    var options = {
        backgroundColor: '#fff'
    };
    var chart = new google.visualization.GeoChart(document.getElementById('countries-map'));
    chart.draw(data, options);
}
