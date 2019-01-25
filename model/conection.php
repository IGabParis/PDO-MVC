<?php 

	class Conection {
		
		public function conect(){
			$link = new PDO('mysql:host=localhost;dbname=pdo', 'root', '');	
			return $link;	
		}
	}

?>