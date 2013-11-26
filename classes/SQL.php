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

	public function construcCadena($array,$condicionM){
		if($condicionM == true){
			$cadena = implode(' and ', $array);
		}else{
			$cadena = implode(',', $array);
		}
		return $cadena;
	}

	//funcion construcCadena funcion que recibe un arreglo y devuelve una cadena separada por comas

	public function definicion($cad){
		$definicion = 'where '.$cad;
		return $definicion;
	}

	public function sqlInterfaz($tipoOperacion,$seleccion,$tablaTarget,$campoTarget){
	
		if($tipoOperacion == 'S'){
			if(gettype($seleccion) == 'array'){
				$seleccion = self::construcCadena($seleccion,false); 
			}
			if($campoTarget != ''){
				if(gettype($campoTarget) == 'array'){
					$where = self::construcCadena($campoTarget,true);
					$condicion = self::definicion($where); 
				}else{
					$condicion = self::definicion($campoTarget); 	
				}
			}
			$query = "select $seleccion from $tablaTarget $condicion;";
		}

		return $query;	

	}
	

	}
	$q = new SQL;
	echo $q->sqlInterfaz('S',[idMaterial,Existencia,Nombre],'Material','').'<br>';
	echo $q->sqlINterfaz('S','*','Material','').'<br>';
	echo $q->sqlINterfaz('S','idMaterial','Material',['idMaterial = 1']).'<br>';
	echo $q->sqlINterfaz('S','idMaterial','Material','idMaterial = 1').'<br>';
	echo $q->sqlINterfaz('S','idMaterial','Material','idMaterial = 1').'<br>';


?>
