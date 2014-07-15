'use strict';

/**
 * @ngdoc overview
 * @name sys
 * @description
 * # sys
 *
 * Main module of the application.
 */
var app = angular
  .module('sys', [
    'ngAnimate',
    'ngCookies',
    'ngRoute',
    'ngSanitize',
		'pickadate'
  ]);

app.config(function ($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl	: 'templates/mainTemplate.php',
        controller	: 'mainCtrl'
      })
      .when('/materiales', {
        templateUrl	: 'templates/materials.php',
        controller	: 'matCtrl'
      })
			.when('/materiales/_material_edit',{
				templateUrl	:	'templates/materialsEdit.php',
				controller	:	'matCtrl'
			})
			.when('/materiales/_material_edit/:idMaterial',{
				templateUrl	:	'templates/materialsEdit.php',
				controller	:	'matCtrl'
			})

      .otherwise({
        /*redirectTo: '/'*/
				templateUrl	: '404.html'
      });
});
