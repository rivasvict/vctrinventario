var app = angular.module('sys');

app.controller('matCtrl', function ($scope,helpers,dataSource,$routeParams) {
	$scope.material_t = dataSource.materiales;

	$scope.validate = function(validationType){
		if(validationType === 'not_repeat'){
			helpers.validators.not_repeat(dataSource.materiales,'Codigo_del_material',$scope.f.cm,helpers.formAction.eMessages.bdError.repeated);
		}
	};

	$scope.sendData = function(){
	}
});
