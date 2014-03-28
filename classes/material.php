<?

include 'SQL.php';
include 'bdConex.php';

class material{

	private $Nombre_del_material;
	protected $Codigo_del_material;
	protected $Unidad;
	protected $Proposito_del_material;
	protected $Clasificacion_del_material;

	public function createMaterial($obj){
		$v0 = "0";
		$v1 = "1";
		$v2 = "2";
		$v3 = "3";
		$v4 = "4";
		$this->Nombre_del_material = $obj->$v0;
		$this->Codigo_del_material = $obj->$v1;
		$this->Unidad = $obj->$v2;
		$this->Proposito_del_material = $obj->$v3;
		$this->Clasificacion_del_material = $obj->$v4;
	}

	public function insertMaterial() {
		$q = new SQL;
		$s = $q->sqlInsert('material',[
						Nombre_del_material,
						Codigo_del_material,
						Unidad,
						Proposito_del_material,
						Clasificacion_del_material
					],
					[
						"'".$this->Nombre_del_material."'",
						"'".$this->Codigo_del_material."'",
						"'".$this->Unidad."'",
						"'".$this->Proposito_del_material."'",
						"'".$this->Clasificacion_del_material."'"
					]);*/
		@mysqlOdriver::query($s);
	}

	public function updateMaterial(){
		$q = new SQL;
		$s = $q->sqlUpdate('material',[
						"'".Nombre_del_material.' = "'.$this->Nombre_del_material.'"',
						"'".Codigo_del_material.' = "'.$this->Codigo_del_material.'"',
						"'".Unidad.' = "'.$this->Unidad.'"',
						"'".Proposito_del_material.' = "'.$this->Proposito_del_material.'"',
						"'".Clasificacion_del_material.' = "'.$this->Clasificacion_del_material.'"'],	
						"'".Nombre_del_material.' = "'.$this->Nombre_del_material.'"',
						);
		var_dump($s);
		//@mysqlOdriver::query($s);
	}

	public function selectMaterial($table,$params){
		if($params=="n"){
			$select = "*";
		}else{

		}
		$q = new SQL;
		$s = $q->sqlSelect($select,'material','');
		$s = @mysqlOdriver::query($s);
		//var_dump($s);
		return $s;
	}

}

?>
