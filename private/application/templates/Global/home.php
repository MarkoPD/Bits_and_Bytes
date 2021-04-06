<?php require_once '../private/application/templates/_shared/header.php'; ?>
	<style>
		.product-img{
			border: 50px;
		}
	</style>
	<div class = "container.fluid justify-content-center">
	<h1>Our Products:</h1>
		<div class = "row justify-content-center mx-auto productrow">
			<div class="col-3 mr-2 border border-secondary rounded product1">
				<a href = "?action=Admin.editProduct"><img class="product-img w-100" src = "../public/assets/img/uploads/03/281550504684.jpg" alt = "Nike T-Shirt" usemap="#imgmap">
				</a>
			</div>
			<div class="col-3 mr-2 border border-danger rounded product2">
				<a href = "?action=Admin.editProduct"><img class="product-img w-100" src = "../public/assets/img/uploads/03/281550256632.jpg" alt = "Adidas Sweatpants" usemap ="imgmap">
				</a>
			</div>
			<div class="col-3 mr-2 border border-primary rounded product3">
				<a href = "?action=Admin.editProduct"><img class="product-img w-100" src = "../public/assets/img/uploads/03/281551354916.jpg" alt = "Rolex" usemap="#imgmap">
				</a>
			</div>
				
			
			
			
			
			<!--
					<img id="product-img2" src = "../public/assets/img/uploads/03/281550256632.jpg" alt = "Adidas Sweatpants">
					<img id="product-img3" src = "../public/assets/img/uploads/03/281551354916.jpg" alt = "Rolex">
				-->
		</div>
	</div>
<?php require_once '../private/application/templates/_shared/footer.php';