<?

class almacenes{
	public 		$nombreAl 		;//Nombre de almacen
	protected	$area			;//Area de trabajo de almcen
	public		$existencia		;//existencia en el almacen
					
	public function __construct(){
					
	}

	private function calcPM($consumosM){
		//calcPM funcion que calcula el CONSUMO PROMEDIO MENSUAL

		//$consumosM objeto resultado de la sumatoria de los ultimos seis meses del campo de consumo mensual 
		//con respecto a la fecha actual.

		$consumoPM = $consumosM / 6;
		return $consumoPM;

		//$consumoPM consumo promedio mensual
	}



	public function calAT($consumoPM, $saldo){
		//calAT funcion que calcula la proyeccion de duracion de materia prima en el tiempo

		$alcAT = $saldo / $consumoPM;
		return $alcAT;
		
		//$alcAT valor del alcance proyectado en el tiempo
	}

	public function calAP(){
		
	}

}
	//$almacen = new almacenes;
?>
