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

	//--Function writ() retuns an object ready to be sent to json for database manipulation--

	$scope.writ = function(fobject){
		var obj = {};
		var j = 1;
		var ja = 0;
			for(i=1;i<=(Object.keys(fobject).length);i++){
				if((i % 2) != 0){
					ja = j + 1;
					obj[fobject[i]] = fobject[ja];
				}
				if(j==8){
					j = j + 81;
				}
				j += 1;
			}

		var k = 1;
		var ka = 1;
		var obj2 = {};
		var n = 0;
		for(c=1;c<=(Object.keys(fobject).length);c++){
			if((c % 2) != 0){
				ka = k + 1;
				obj2[n] = fobject[ka];
				n += 1;
			}
			if(k==8){
				k = k + 81;
			}
			k += 1;
		}
		console.log(obj2);

		var dta = JSON.stringify(obj);
		$.post(
				'phpdep/arequest.php',
			{
				varPage:dta
			},
			function(data){
				$('#ajaxreq').html(data);
			}
		);
	};

//-------------- Llenadores de selects -insMaterial-------------

//-Llenador de unidades

	$scope.uSelect = [{value:"Kilogramos - Kgs",id:"1"},{value:"Litros - Lts",id:"2"}];

//-Llenador de proposito del material


	$scope.prSelect = [{value:"Fabricación alambre",id:"1"},{value:"Fabricación electrodos",id:"2"},{value:"Ambos",id:"3"}];

//-Llenador de clasificación del material


	$scope.clSelect = [{value:"A - Cobrizantes",id:"1"},{value:"E - Revestimiento seco",id:"2"},{value:"E - Aglutinantes",id:"3"},{value:"Alambre",id:"4"}];

//-Funcion que se basa en prSelect (campo proposito de producto) para llenarcampo de clasiicación

	$scope.fclSelect = function(prS){
		$scope.clSelect = {};
		$('#clasM').show();
		if(prS=='Fabricación alambre'){
			$scope.clSelect = [{
					value:"A - Cobrizantes",
					id:"1"
				}];
		}else if(prS=='Fabricación electrodos'){
			$scope.clSelect = [{
					value:"E - Revestimiento seco",
					id:"2"
				},{
					value:"E - Aglutinantes",
					id:"3"
				}];
		}else{
			$scope.clSelect = [{
					value:"Alambre",
					id:"4"
				}];
		}
	}

}
