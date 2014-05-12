var app = angular.module('App', ['ngSanitize'])
.controller('contenido', function($scope,$compile,$sce) {


$scope.forbject = [];
$scope.addFormula = function(){
/*	if($scope.forbject.length != 0){
		//alert($scope.forbject[$scope.forbject.length - 1].c);
		var n = $scope.forbject[$scope.forbject.length - 1].c + 2;
		if(n==10){
			n = 91;
		}
		if(n==990){
			n = 991;
		}
		//alert(n);
	}else{
		var n = 6;
	}
	if(n==91){
		var nm = 9;
	}else{
		var nm = n - 1;	
	}*/
	if($scope.forbject.length != 0){
		var n = $scope.forbject[$scope.forbject.length - 1].c + 1;
		n = $scope.ceros(n);
		n = n[0];
		var n1 = n + 1;
		n1 = $scope.ceros(n1);
		n1 = n1[0];
		var n2 = n1 + 1;
		n2 = $scope.ceros(n2);
		n2 = n2[0];
	}else{
		var n = 5;
		var n1 = n + 1;
		var n2 = n1 + 1;
	}
	var id = '<input type="hidden" ng-model="fobject.' + n + '" ng-init="fobject.' + n + ' = ' + "'" + 'Ingrediente #' + n + ': ' + "'" + '">';
	var name = 'Ingrediente: <input type="text" ng-model="fobject.' + n1 + '"><input type="button" value=" + " ng-click="addFormula()"><input type="button" value=" - " ng-click="deleteFormula(element)">{{fobject.' + n1 +'}}';
	var quantity = 'Ingrediente: <input type="text" ng-model="fobject.' + n2 + '"><input type="button" value=" + " ng-click="addFormula()"><input type="button" value=" - " ng-click="deleteFormula(element)">{{fobject.' + n2 +'}}';
	$scope.forbject.push({tag:id,htag:name,hhtag:quantity,c:n2});
}

$scope.deleteFormula = function(obj){
	var oldFor = $scope.forbject;
	$scope.forbject = [];
	var index=oldFor.indexOf(obj);
	oldFor.splice(index,1);
}

//-------- Funciones para manejo de vistas dinamicas en llenados --------

	$scope.show = function(pointer){
		$('#cnt').empty();
		$scope.fobject = {};
		$scope.forbject = [];
		if(pointer == "material"){
			var url = "contenidos/insMaterial.php";
		}else if(pointer == "formula"){
			var url = "contenidos/insFormula.php";
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

		$scope.drop = function(obj,target,fn){
			if(target == "material"){
				var element_name = obj.Codigo_del_material;
			}
			var answer = confirm("¿Realmente desea eliminar el elemento con codigo " + element_name + "?");
			if(answer){
				$.post(
					'phpdep/arequest.php',
				{
					varPage:element_name,
					fnc:fn,
					tgt:target
				},
				function(data){
					$('#ajaxreq').html(data);
				}
				);	
				var index=$scope.filler.indexOf(obj);
				$scope.filler.splice(index,1);
			}
		}

//------------- Funcion para realizar transaccion--------------

	//--Function writ() retuns an object ready to be sent to json for database manipulation--
	$scope.oja = {};
	//fn is variable that is going to carry the edit or insert instruction

	$scope.nueves = function(number,lengthNumber){
		var nu = "";
		var sum = "";
		var oldnumber = number;
		for(i = 0;i<=lengthNumber-1;i++){
			if(i < (lengthNumber - 2)){
				nu = nu + "9";
			}
		}
		sum = "8" + nu + "1";
		sum = parseInt(sum);
		number = number + parseInt(sum);
		return [number,oldnumber,sum];
	}

	$scope.ceros = function(number){
		var str = number.toString();
		var all = true;
		var nu = "";
		var nova = "";
		var sm = 0;
		var arrayNumber = [];
		if(str[str.length - 1] == "0"){
			arrayNumber = $scope.nueves(number,parseInt(str.length));
			alert(arrayNumber);
			return arrayNumber;
		}else{
			return [number,0,0];
		}
		//console.log(number + " : " + str.length);
	/*	for(o=0;o<=str.length - 1;o++){
			if(str[o]=="9"){
				if(o != (str.length - 1)){
					nu = nu + "9";
				}
			}else{
				all = false;
				o = str.length;
			}
		}
		if(all==true){
			nova = nu;
			sum = "8" + nova + "2";
			sm = parseInt(sum);*/
			/*for(i=0;i<=(o - 1);i++){
				if(i != 0){
					nu = nu + "9";
				}
			}*/
		/*}
		return [all,sm];
		//console.log([all,number]);*/
	}

	$scope.assocA = function(fobject,fn){
		var obj = {};
		if(fn=="any"){
		var j = 1;
		var ja = 0;
		var ia = 0;
			for(i=1;i<=(Object.keys(fobject).length);i++){
				if((i % 2) != 0){
					ja = j + 1;
					ia = j;
					if(j == 90){
						ia = 9;
					}
					obj[fobject[ia]] = fobject[ja];
				}
				if(j==8){
					j = j + 81;
				}
				j += 1;
			}
		console.log(obj);
		}else{
console.log($scope.fobject);
/*			var j = 1;
			var k = 0;
		//	var val = 0;
		//	console.log("initial " + p);
			for(i=1;i<=(Object.keys(fobject).length);i++){
				if(j < 5){
				}
//-----------------------CAMBIAR CON NUEVO ESQUEMA DE NUEVE Y CERO FUNCION--------------------
				if($scope.nueves(j)[0] == true){
					j = j + $scope.nueves(j)[1];
				}else{
					j++;
				}
			}
			console.log(fobject);*/
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
		//console.log($scope.oja2);
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
		//console.log(obj);
		var obj = $scope.nonAssocA(obj);
		//console.log(obj);
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
		alert("su transacción se ha realizado con exito");
		$('#cnt').empty();
	}

	$scope.cancel = function(){
		$('#cnt').empty();
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
					value:"0:E - Revestimiento seco",
					id:"2"
				},{
					value:"1:E - Aglutinantes",
					id:"3"
				}];
		}else{
			$scope.s2 = [{
					value:"3:Alambre",
					id:"4"
				}];
		}
	}


})
.directive('dynamic', function($compile) {
    return {
      restrict: 'A',
      replace: true,
      link: function(scope, element, attrs) {
        scope.$watch(attrs.dynamic, function(html) {
          element.html(html);
          $compile(element.contents())(scope);
        }, true);
      }
    }
  })

function notSorted(o){
		/*if(o){
			return Object.keys(o);
		}else{
			return {};
		}*/
		return o? Object.keys(o) : [];
	};
