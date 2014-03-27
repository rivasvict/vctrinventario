<?
	class tools{

		public function exploderSelect($string){
			$exploder = explode(":",$string);
			return $exploder[0];
		}

		public function selector($b,$e,$array){
			$a = 0;
			for($i=$b;$i<=$e;$i++){
				$se[$i] = $this->exploderSelect($array[$a]);
				$a++;
			}
			return $se;
		}
	}
?>
