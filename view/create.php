				<form method="post" action="">
					<div class="form-group">
						<label>Name Product</label>
						<input type="text" name="name_product" id="name_product" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Category Product</label>
						<select name="cat_product" id="cat_product" class="form-control" required>
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="C">C</option>
						</select>
					</div>
					<div class="form-group">
						<label>Price Product (USD)</label>
						<input type="number" name="price" id="price" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Stock</label>
						<input type="number" name="quant" id="quant" class="form-control" required>
					</div>
					<div class="form-group">
						<input type="submit" name="submitInsert" id="submitInsert" value="Send" class="btn btn-info form-control">
					</div>
				</form>

<?php 

$create = new MainController();
$create->insertProductController();

?>