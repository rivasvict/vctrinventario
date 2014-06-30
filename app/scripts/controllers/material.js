var app = angular.module('sys');

app.controller('matCtrl', function ($scope,helpers,dataSource,$routeParams) {
	$scope.material_t = dataSource.materiales;

	$scope.validate = function(validationType){
		if(validationType === 'not_repeat'){
			/*var repeated = json_query.select_value(dataSource.materiales,'Codigo_del_material',$scope.f.cm);
			if(repeated === true){
				helpers.
			}*/
			helpers.validators.not_repeat(dataSource.materiales,'Codigo_del_material',$scope.f.cm);
		}
	};

	$scope.sendData = function(){
	}
});
