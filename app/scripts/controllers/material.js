var app = angular.module('sys');

app.controller('matCtrl', function ($scope,helpers,dataSource,$routeParams) {
	$scope.material_t = dataSource.materiales;

	$scope.validate = function(validationType){
	};

	$scope.sendData = function(){
	}
});
