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
	$scope.oja = {};
	$scope.assocA = function(fobject){
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

		$scope.oja = obj;		
		return $scope.oja;
	};

	$scope.oja2 = {};
	$scope.nonAssocA = function(fobject){

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

		$scope.oja2 = obj2;
		console.log($scope.oja2);
		return $scope.oja2;

	}

	$scope.notSorted = function (o){
		/*if(o){
			return Object.keys(o);
		}else{
			return {};
		}*/
		return o? Object.keys(o) : [];
	};

	$scope.accPrev = function (obj){
		var obj = $scope.nonAssocA(obj);
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
	}


//------------------------SELECTS------------------------------

	//-Manejadores de seleccion

		//-INDICES PARA SELECTS POR PANTALLA-

$scope.range = {};
$scope.indexs = function(screen){
	// s = start range
	var s = 0;
	// e = end of range
	var e = 0;
	if(screen == 'material'){
		e = 2;
	}
	$scope.range = [{start:s,end:e}];
	var rangephp = JSON.stringify($scope.range);
	return rangephp;
}

	//-------------- Llenadores de selects -insMaterial-------------

		//-Llenador de unidades

	$scope.s0 = [{value:"0:Kilogramos - Kgs",id:"1"},{value:"1:Litros - Lts",id:"2"}];

		//-Llenador de proposito del material

	$scope.s1 = [{value:"0:Fabricación alambre",id:"1"},{value:"1:Fabricación electrodos",id:"2"},{value:"2:Ambos",id:"3"}];
		//-Llenador de clasificación del material


	$scope.s2 = [{value:"0:A - Cobrizantes",id:"1"},{value:"1:E - Revestimiento seco",id:"2"},{value:"2:E - Aglutinantes",id:"3"},{value:"3:Alambre",id:"4"}];

		//-Funcion que se basa en s1 (campo proposito de producto) para llenarcampo de clasiicación s2

	$scope.fs2 = function(prS){
		$scope.s2 = {};
		$('#clasM').show();
		if(prS=='0:Fabricación alambre'){
			$scope.s2 = [{
					value:"0:A - Cobrizantes",
					id:"1"
				}];
		}else if(prS=='1:Fabricación electrodos'){
			$scope.s2 = [{
					value:"1:E - Revestimiento seco",
					id:"2"
				},{
					value:"2:E - Aglutinantes",
					id:"3"
				}];
		}else{
			$scope.s2 = [{
					value:"3:Alambre",
					id:"4"
				}];
		}
	}

}
