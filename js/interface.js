angular.module('App', []);

function notSorted(o){
		/*if(o){
			return Object.keys(o);
		}else{
			return {};
		}*/
		return o? Object.keys(o) : [];
	};


function contenido($scope,$compile) {

//-------- Funciones para manejo de vistas dinamicas en llenados --------

	$scope.show = function(pointer){
		$('#cnt').empty();
		$scope.fobject = {};
		if(pointer == "material"){
			var url = "contenidos/insMaterial.php";
		}
		$.post(
			url,
		function(data){
			//Making angular to work over this template.
			var scope = angular.element('#cnt').scope();
			$('#cnt').html($compile(data)(scope));
		}
		);
	}

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
//------------- Funciones para devolver consultas hechas a BD------

	//--- Funcion para construir objetos de base de datos-----
		$scope.filler = [];
		$scope.ftittle = {};
		$scope.fillerq = function(keyword, dataArray){
		var i=0;
			$scope.filler = dataArray;
			angular.forEach($scope.filler, function(v, k){
				
			});
			angular.forEach(dataArray, function(value, key){
				angular.forEach(value, function(nval, nkey){
					$scope.ftittle[nkey] = nkey;
				});
			});
		//	console.log(dataArray);
		//	console.log($scope.filler);
			$('#query').show();
			$scope.$apply();
		};

	//--- Funcion para mostrar y enviar parametros de consulta de llenado o eliminacion de registros esn BD

		$scope.shw = function(pointer){
			$('#cnt').empty();
			$.post(
				'phpdep/arequest.php',
			{
				varPage:pointer,
				show:"show"
			},
			function(data){
				$('#ajaxreq').html(data);
			}
		);
			$.post(
				'includes/jsQuery.php',
			{
				varPage:pointer,
				show:"show"
			},
			function(data){
				var scope = angular.element('#cnt').scope();
				$('#cnt').html($compile(data)(scope));
			}
		);

		}

//-----FUNCIONES PARA EDICION Y ELIMINACION DE REGISTROS----------

		$scope.editar = function(obje){
			$('#cnt').empty();
			$('#query').hide();
			var obje = JSON.stringify(obje);
			$.post(
				'contenidos/insMaterial.php',
			{
				varPage:obje,
				show:"show"
			},
			function(data){
				//Making angular to work over this template.
				var scope = angular.element('#cnt').scope();
				$('#cnt').html($compile(data)(scope));
				$('#clasM').show();
			}
			);
		}

//------------- Funcion para realizar transaccion--------------

	//--Function writ() retuns an object ready to be sent to json for database manipulation--
	$scope.oja = {};
	//fn is variable that is going to carry the edit or insert instruction
	$scope.assocA = function(fobject,fn){
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

	$scope.accPrev = function (obj,fn){
		var obj = $scope.nonAssocA(obj);
		var dta = JSON.stringify(obj);
		$.post(
				'phpdep/arequest.php',
			{
				varPage:dta,
				fnc:fn
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

	$scope.test = function(){
		alert("hola");
	};

	//-------------- Llenadores de selects -insMaterial-------------

		//-Llenador de unidades

	$scope.s0 = [{value:"0:Kilogramos - Kgs",id:"1"},{value:"1:Litros - Lts",id:"2"}];

		//-Llenador de proposito del material

	$scope.s1 = [{value:"0:Fabricacion alambre",id:"1"},{value:"1:Fabricacion electrodos",id:"2"},{value:"2:Ambos",id:"3"}];
		//-Llenador de clasificación del material


	$scope.s2 = [{value:"0:A - Cobrizantes",id:"1"},{value:"1:E - Revestimiento seco",id:"2"},{value:"2:E - Aglutinantes",id:"3"},{value:"3:Alambre",id:"4"}];

		//-Funcion que se basa en s1 (campo proposito de producto) para llenarcampo de clasiicación s2

	$scope.fs2 = function(prS){
		$scope.s2 = {};
		$('#clasM').show();
		if(prS=='0:Fabricacion alambre'){
			$scope.s2 = [{
					value:"0:A - Cobrizantes",
					id:"1"
				}];
		}else if(prS=='1:Fabricacion electrodos'){
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
