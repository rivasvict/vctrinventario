<?

include 'SQL.php';

class material{

	private $Nombre_del_material;
	protected $Codigo_del_material;
	protected $Unidad;
	protected $Proposito_del_material;
	protected $Clasificacion_del_material;

	public function insertMat($obj){
		$this->$Nombre_del_material = $obj['0'];
		$this->$Codigo_del_material = $obj['1'];
		$this->$Unidad = $obj['2'];
		$this->$Proposito_del_material = $obj['3'];
		$this->$Clasificacion_del_material = $obj['4'];
	}

}

?>
