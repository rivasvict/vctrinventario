var app = angular.module('sys');

app.controller('matCtrl', function ($scope,helpers,dataSource,$location) {
	//Redirect to root when materials table is not loaded
	if(!dataSource.materiales){
		$location.path('/');
	}

	var $validate = helpers.validators;
	var $eMessage	=	helpers.formAction.eMessages;

	$scope.material_t = dataSource.materiales;

	$scope.validate = function(validationType){

		if(validationType === 'not_repeat'){
			var pointer = 'Codigo_del_material';
			$validate.not_repeat(dataSource.materiales,pointer,$scope.f.cm,$eMessage.bdError.repeated);
		}

		else if(validationType === 'only_letters'){
			$validate.only_letters($scope.f.pm,$eMessage.typeError.onlyNumbers);
		}

	};

	$scope.sendData = function(){
	}
});
