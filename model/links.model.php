<?php 

class Pages{
	
	public function linkPageModel($links){


		if($links == "table" || $links == "update" || $links == "create"){

			$module =  "view/".$links.".php";
		
		} else if($links == "index"){

			$module =  "view/home.php";
		
		} else if($links == "ok"){

			$module =  "view/home.php";
		
		} else if($links == "change"){

			$module =  "view/home.php";
		
		} else{

			$module =  "view/home.php";

		}
		
		return $module;

	}

}

?>