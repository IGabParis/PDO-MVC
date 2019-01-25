<?php 

require_once "conection.php";

class Data extends Conection{
	
	public function insertProduct($dataInf, $table){
		$stmt = Conection::conect()->prepare("INSERT INTO $table(code, name_product, cat_product, price, quant) VALUES (:code, :name_product, :cat_product, :price, :quant)");
		$stmt->bindParam(':code', $dataInf['code'], PDO::PARAM_STR);
		$stmt->bindParam(':name_product', $dataInf['name_product'], PDO::PARAM_STR);
		$stmt->bindParam(':cat_product', $dataInf['cat_product'], PDO::PARAM_STR);
		$stmt->bindParam(':price', $dataInf['price'], PDO::PARAM_STR);
		$stmt->bindParam(':quant', $dataInf['quant'], PDO::PARAM_STR);
		if ($stmt->execute()) {
			return 'success';
		} else {
			return 'error';
		}
		$stmt->close();
	}

	public function updateProduct($dataInf, $table){
		$stmt = Conection::conect()->prepare("UPDATE $table SET price = :price, quant = :quant WHERE code = :code");		
		$stmt->bindParam(':price', $dataInf['price'], PDO::PARAM_STR);
		$stmt->bindParam(':quant', $dataInf['quant'], PDO::PARAM_STR);
		$stmt->bindParam(':code', $dataInf['code'], PDO::PARAM_STR);
		if ($stmt->execute()) {
			return 'success';
		} else {
			return 'error';
		}
		$stmt->close();
	}

	public function getProducts($table){
		$stmt = Conection::conect()->prepare("SELECT * FROM $table");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	public function getProduct($code, $table){
		$stmt = Conection::conect()->prepare("SELECT * FROM $table where code = :code");
		$stmt->bindParam(':code', $code, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	public function deleteProduct($code, $table){
		$stmt = Conection::conect()->prepare("DELETE FROM $table where code = :code");
		$stmt->bindParam(':code', $code, PDO::PARAM_STR);
		$stmt->execute();
		if ($stmt->execute()) {
			return 'success';
		} else {
			return 'error';
		}
		$stmt->close();
	}

}

?>