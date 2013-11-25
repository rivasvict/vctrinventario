<?
/*
#########################################################
#							#
#	Esta es una clase interfaz para que php		#
#	maneje consultas SQL como codigo php		#
#							#
#########################################################
*/
class SQL{

	/*public $tipoOperacion 	= 'S'		;
	public $seleccion	= '*'		;
	public $tablaTarget	= 'Material'	;*/

	public function construcCadena($array){
		$cadena = implode(',', $array);
		return $cadena;
	}

	//funcion construcCadena funcion que recibe un arreglo y devuelve una cadena separada por comas

	public function definicion($cadena){
		$definicion = 'where'// terminar de crear condicion de selecion
	}

	public function sqlInterfaz($tipoOperacion,$seleccion,$tablaTarget,$campoTarget){
	
		if($tipoOperacion == 'S'){
			if(gettype($seleccion) == 'array'){
				$seleccion = self::construcCadena($seleccion); 
			}
		if($campoTarget != null){
			$condicion = self::construcCadena($campoTarget);
		}
			$query = "select $seleccion from $tablaTarget $condicion;";
		}

		

		return $query;	

	}
	

	}
	$q = new SQL;
	echo $q->sqlInterfaz('S',[idMaterial,Existencia,Nombre],'Material',null).'<br>';
	echo $q->sqlINterfaz('S','*','Material',null);
	echo $q->sqlINterfaz('S','','Material',['idMaterial = 1']);
?>
