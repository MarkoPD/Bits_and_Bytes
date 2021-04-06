<?php require_once '../private/application/templates/_shared/header.php'; ?>

	<?php if(isset($DATA['message'])) : ?>
		<div class="alert alert-primary" role="alert">
			<?php ee($DATA['message'])?></p>
		</div>
	<?php else : ?>
		<div class="row main-content">
			<div class="col-3">
				<!-- <div class="form-group">
				<form method="post">
					<label for="category">Category:</label>
                	<input list="category" class="form-control" name="category">
                	<datalist id="category">
                    	<?php foreach($DATA['category'] as $category) : ?>
                        	<option value="<?php ee($category->name)?>">
                    	<?php endforeach; ?>
                	</datalist>
					<button type="submit" class="btn btn-primary">Search Category</button>
					</form>
           		</div> -->


			
				<ul class="list-group">
					<?php foreach($DATA['category'] as $category) : ?>
						<li class="list-group-item">
							<a href="?action=Global.viewByCategory&id=<?php ee($category->category_id);?>"><?php ee($category->name)?></a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>


			<div class="products row col-9">
				<?php foreach($DATA['product'] as $product) : ?>
					<div class="product col-4">
						<div class="image">
							<img src="<?php uploadedImage($product->image);?>">
						</div>
						<p><strong><?php ee($product->name);?></strong></p>
						<p><?php ee($product->price);?> &euro;</p>
						<p><?php ee($product->quantity);?></p>

						<!-- 
						The following piece of code is used in case we want to hide the product id from the URL
						In this case, we have to make it into a form with a hidden input that contains the id and
						a submit open
						
						<form method="post" action="?action=Admin.editProduct">
							<input type="hidden" name="id" value="<?php ee($product->product_id);?>">
							<button type="submit">Edit</button>
						</form>
						-->
					</div>
				<?php endforeach;?>
			</div>
		



		</div>
	<?php endif; ?>

<?php require_once '../private/application/templates/_shared/footer.php';