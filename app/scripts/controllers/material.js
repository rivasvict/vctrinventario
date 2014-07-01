var app = angular.module('sys');

app.controller('matCtrl', function ($scope,helpers,dataSource,$location) {
	//Redirect to root when materials table is not loaded
	if(!dataSource.materiales){
		$location.path('/');
	}

	$scope.material_t = dataSource.materiales;

	$scope.validate = function(validationType,model,db_pointer){
		helpers.validTrigger(validationType,model,db_pointer);
	};

	$scope.sendData = function(){
	}
});
