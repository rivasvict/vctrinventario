angular.module('App', []);


function contenido($scope) {

//-------- Manejador de validacion de formularios------------

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

//------------- Funcion para realizar transaccion--------------

	$scope.writ = function(fobject){
		var obj = {};
		//console.log(Object.keys(fobject).length);
		//angular.foreach(fobject, function (value,key){
		var j = 1;
		var ja = 0;
			for(i=1;i<=(Object.keys(fobject).length);i++){
				//alert(j);
					//alert('entre');
				//alert(ja);
				if((i % 2) != 0){
					ja = j + 1;
					//alert(ja);
					//j = ''+j;
					//ja = ''+ja;
					//console.log(fobject[1]);
					var name = fobject[j];
					var ne = fobject[ja];
					//console.log(fobject[ja]);
					//obj.push(fobject.toString(j) + ":" + fobject.toString((j + 1)));
					obj[fobject[j]] = fobject[ja];
					//j = parseInt(j);
				}
				if(j==9){
					j = j + 80;
					//j = j - 1;
				}
				j += 1;
				//console.log(name,ne);
			}
		//});
		console.log(obj);
	};

//-------------- Llenadores de selects -insMaterial-------------

//-Llenador de unidades

	$scope.uSelect = [{value:"Kilogramos - Kgs",id:"1"},{value:"Litros - Lts",id:"2"}];

//-Llenador de proposito del material


	$scope.prSelect = [{value:"Fabricación alambre",id:"1"},{value:"Fabricación electrodos",id:"2"}];

//-Llenador de clasificación del material


	$scope.clSelect = [{value:"A - Cobrizantes",id:"1"},{value:"E - Revestimiento seco",id:"2"},{value:"E - Aglutinantes",id:"3"},{value:"Alambre",id:"4"}];

}
