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

	protected function cadenaCondicion($condicion){
		if(gettype($condicion) == 'array'){
			$condicion = self::construcCadena($condicion,'verdadero');
			$condicion = self::definicion($condicion); 
		}else{
			$condicion = self::definicion($condicion); 	
		}
		return $condicion;
	}

	protected function construcCadena($array,$condicionM){
		if($condicionM == 'verdadero'){
			$cadena = implode(' and ', $array);
		}else if($condicionM == 'falso'){
			$cadena = implode(',', $array);
		}else{
			if(gettype($condicionM) == 'array'){
count($subarray);
				for($i=0;$i<(count($array)*2)-1;$i++){
					/*for($j=0;$j<count($condicionM)+2;$j++){
						$subCondicion[$j+1]=$condicionM[$j];
					}*/
					$j=$i+1;
					$subarray[$i]=$array[$i];
					$subarray[$j]=$condicionM[$i];
				}
				var_dump($subarray);
			}
			$cadena = implode(" $condicionM ", $array);
			$cadena = str_replace('select','(select',$cadena);
		}
		return $cadena;
	}

	//funcion construcCadena funcion que recibe un arreglo y devuelve una cadena separada por comas

	protected function definicion($cad){
		$definicion = ' where '.$cad;
		return $definicion;
	}

	public function sqlSelect($seleccion,$tablaTarget,$condicion){
	
		if(gettype($seleccion) == 'array'){
			$seleccion = self::construcCadena($seleccion,'falso'); 
		}
		if($condicion != ''){	
			$condicion = self::cadenaCondicion($condicion);
		}
		
		$query = "select $seleccion from $tablaTarget$condicion;";

		return $query;	

	}

	public function sqlInsert($tablaTarget,$campos,$valores){
		if(gettype($campos) == 'array'){
			$campos = self::construcCadena($campos,'falso'); 
		}
		if(gettype($valores) == 'array'){
			$valores = self::construcCadena($valores,'falso'); 
		}

		$query = "insert into $tablaTarget ($campos) values ($valores);";
		return $query;
	}

	public function sqlUpdate($tablaTarget,$campos,$condicion){
		if(gettype($campos) == 'array'){
			$campos = self::construcCadena($campos,'falso');
		}
		$condicion = self::cadenaCondicion($codicion);

		$query = "update $tablaTarget set $campos$condicion;";
		return $query;
	}

	public function sqlOperaciones($arrayValor,$operacion){
		$arrayValor = self::construcCadena($arrayValor,$operacion);
		$arrayValor = str_replace(';',')',$arrayValor);
		$query = "select $arrayValor;";
		return $query;
	}

}
//Test area
$q = new SQL;
echo $q->sqlSelect([idMaterial,Existencia,Nombre],'Material','').'<br>';
echo $q->sqlSelect('*','Material','').'<br>';
echo $q->sqlSelect('idMaterial','Material',['idMaterial = 1','Existencia = 10']).'<br>';
echo $q->sqlSelect('idMaterial','Material','idMaterial = 1').'<br>';
echo $q->sqlSelect('idMaterial','Material','idMaterial = 1').'<br>';
echo $q->sqlInsert('Material',[idMaterial,Existencia,Nombre],['null',5,'"E"']).'<br>';
echo $q->sqlInsert('Material',[Existencia,Nombre],[15,D]).'<br>';
echo $q->sqlUpdate('Material',['Existencia = 20','Nombre = "F"'],'idMaterial = 5').'<br>';
echo $q->sqlOperaciones([20,1,3,7],'+').'<br>';
echo $q->sqlOperaciones([$q->sqlSelect('Existencia','Material',['idMaterial = 1']),7,$q->sqlSelect('Existencia','Material','idMaterial = 1')],'+').'<br>';
echo $q->sqlOperaciones([20,1,3,7],['+','-']).'<br>';
?>
