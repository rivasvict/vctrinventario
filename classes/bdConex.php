<?
class mysqlOdriver{

	public static function query($query){

		$username = 'root';
		$password = 'enrivaromanza61639093';
		$hostname = 'localhost';
		$namedb = 'inventarioAlfa';
		$mysqli = new mysqli($hostname,$username,$password,$namedb);

		if($mysqli->connect_erno){
			printf("Connect failed: %s\n", $mysqli->connect_error);
			exit();
		}
		$exec = $mysqli->query($query) or die(mysqli_error());
		$rows = array();
		while($row = mysqli_fetch_assoc($exec)){
			$rows[] = $row;
		}
		if($rows){
			return $rows;
		}

	}
}
?>
