	<table class="table table-stripped table-responsive">
		<thead>
			<tr>
				<th>Code</th>
				<th>Product</th>
				<th>Category</th>
				<th>Price (USD)</th>
				<th>In Stock</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody id="tableResult">
			<?php 
				$table = new MainController();
				$table->getProducts();
				$table->deleteProduct();
			?>
		</tbody>
	</table>
