var app = angular.module('sys');

app.controller('matCtrl', function ($scope,helpers,dataSource,$location) {
	//Redirect to root when materials table is not loaded
	if(!dataSource.materiales){
		$location.path('/');
	}
	$scope.material_t = dataSource.materiales;

	$scope.validate = function(validationType){
		if(validationType === 'not_repeat'){
			helpers.validators.not_repeat(dataSource.materiales,'Codigo_del_material',$scope.f.cm,helpers.formAction.eMessages.bdError.repeated);
		}else if(validationType === 'only_numbers'){
			helpers.validators.only_letters($scope.f.pm,helpers.formAction.eMessages.typeError.onlyNumbers);
		}
	};

	$scope.sendData = function(){
	}
});
