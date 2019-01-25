<?php

class MainController{

	#Calling Home
	#-------------------------------------

	public function mainPage(){	
		
		include "view/head.php";
		include "view/home.php";
		include "view/footer.php";
	
	}

	#Lnks
	#-------------------------------------

	public function linkPageController(){

		if(isset( $_GET['action'])){
			
			$links = $_GET['action'];
		
		}

		else{

			$links = "table";
		}

		$answer = Pages::linkPageModel($links);

		include_once $answer;

	}

	#Insert Product
	public function insertProductController(){

		if (isset($_POST['name_product'])) {

			if (preg_match('/^[a-zA-Z0-9]*$/', $_POST['name_product']) &&
				preg_match('/^[.0-9,]*$/', $_POST['price']) && preg_match('/^[.0-9,]*$/', $_POST['quant'])
				) {

				$dataInf = array(
				'code' => time(),
				'name_product' => $_POST['name_product'],
				'cat_product' => $_POST['cat_product'],
				'price' => $_POST['price'],
				'quant' => $_POST['quant']
				);

				$answer = Data::insertProduct($dataInf, 'products');

				if($answer == "success"){
					header("location:index.php");
				} else {
					header("location:index.php?action=create");
				}
				
			}
			
		}
			
	}

	#List Products
	public function getProducts(){
		$answer = Data::getProducts('products');

		foreach ($answer as $product => $item) {
			echo '<tr>
				<td>'.$item["code"].'</td>
				<td>'.$item["name_product"].'</td>
				<td>'.$item["cat_product"].'</td>
				<td>'.$item["price"].'</td>
				<td>'.$item["quant"].'</td>
				<td><a href="index.php?action=update&code='.$item["code"].'" class="btn btn-warning">Edit</a></td>
				<td><a href="index.php?action=table&code='.$item["code"].'" class="btn btn-danger">Delete</a></td>
			</tr>';
		}		
	}

	public function getProduct(){

		if (isset($_GET['code'])) {
			$code = $_GET['code'];
			$answer = Data::getProduct($code, 'products');

			echo '
				<div class="form-group">
					<label>Code Product</label>
					<input type="text" class="form-control" name="code" value="'.$answer["code"].'" readonly>
				</div>
				<div class="form-group">
					<label>Name Product</label>
					<input type="text" class="form-control" value="'.$answer["name_product"].'" name="name_product" readonly>
				</div>
				<div class="form-group">
					<label>Price (USD)</label>
					<input type="number" class="form-control" value="'.$answer["price"].'" name="price" required>
				</div>
				<div class="form-group">
					<label>In Stock</label>
					<input type="number" class="form-control" value="'.$answer["quant"].'" name="quant" required>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Update">
				</div>';
		}

		
	}

	public function updateProductController(){

		if (isset($_POST['code'])) {

			$dataInf = array(
				'code' => $_POST['code'],
				'price' => $_POST['price'],
				'quant' => $_POST['quant']
			);

			$change = Data::updateProduct($dataInf, 'products');

			if($change == "success"){
				header("location:index.php");
			} else {
				echo 'location:index.php?action=update&code='.$_POST["code"].'"';
			}
		}
			
	}

	public function deleteProduct(){
		if (isset($_GET['code'])) {
			$answer = Data::deleteProduct($_GET['code'], 'products');

			if($answer == "success"){
				header("location:index.php");
			} else {
				echo 'location:index.php';
			}
		}
	}

	

}

?>