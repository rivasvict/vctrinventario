angular.module('App', []);

function contenido($scope) {
	$scope.copia = {};

	$scope.reset = function(){
		$scope.pro = angular.copy($scope.copia);	
	};

	$scope.procesar = function(pro){
		$scope.copia = angular.copy(pro);
	};

	$scope.sincambio = function(pro){
		return angular.equals(pro, $scope.copia);
	};

	$scope.reset();

}


