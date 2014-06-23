var app = angular.module('sys',['ngRoute']);

app.service('helpers',function(){
	this.formAction = {
		eMessages : {
			typeError : {
				onlyNumber : 'Este campo solo puede poseer caracteres numericos',
				onlyLetters: 'Este campo solo puede poseer caracteres alfabeticos',
				invalidChar: 'Caracter especial no admitido'
			},
			bdError : {
				repeated	: 'Este valor ya existe en la base de datos, seleccione uno nuevo por favor'
			}
		}
	};
});

app.service('dataSource',function(){
});

app.controller('mainCTRL', function($scope,helpers){
});

app.controller('matCTRL', function($scope,helpers,$routeParams){
	if($routeParams.idMaterial){
		console.log('hay materieal');
	}else{
		console.log('no hay matereial');
	};
});

app.controller('nourlCTRL', function($scope,helpers){
});

app.config(function($routeProvider){
	$routeProvider.when('/',{
		templateUrl	:	'templates/mainTemplate.php',
		controller	:	'mainCTRL',
	})
	.when('/materiales',{
		templateUrl : 'templates/materials.php',
		controller	:	'matCTRL'
	})
	.otherwise({
		templateUrl : 'templates/noturl.php',
		controller	: 'nourlCTRL'
	})	
	.when('/materiales/_material_edit',{
		templateUrl : 'templates/materialsEdit.php',
		controller	:	'matCTRL'
	})	
	.when('/materiales/_material_edit/:idMaterial',{
		templateUrl : 'templates/materialsEdit.php',
		controller	:	'matCTRL'
	})

});
