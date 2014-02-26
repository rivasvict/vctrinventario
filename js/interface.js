angular.module('App', []);

function contenido($scope) {
	$scope.copia = {};

	$scope.reset = function(){
		$scope.fobject = angular.copy($scope.copia);	
	};

	$scope.procesar = function(fobject){
		$scope.copia = angular.copy(fobject);
	};

	$scope.sincambio = function(fobject){
		return angular.equals(fobject, $scope.copia);
	};

	$scope.reset();

	$scope.uSelect = [{value:'Kilogramos - Kgs'},{value:'Litros - Lts'}];

}
