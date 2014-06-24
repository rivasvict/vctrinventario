var app = angular.module('sys');

app.controller('matCtrl', function ($scope,helpers,dataSource,$routeParams) {
	console.log(dataSource.materiales);
});
