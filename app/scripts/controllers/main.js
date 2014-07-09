'use strict';

/**
 * @ngdoc function
 * @name sys.controller:mainCtrl
 * @description
 * # mainCtrl
 * Controller of the sys
 */
var app = angular.module('sys');

app.controller('mainCtrl', function ($scope,helpers,dataSource) {	
	dataSource.select_from_database('material');
	dataSource.select_from_database('ordenes_produccion');
	$scope.obj_construct = function(table,table_name){
		dataSource.build_table(table,table_name);
	}
});
