<?php require_once '../private/application/templates/_shared/header.php'; ?>
    <h2>Select a Product</h2>
    <?php if(isset($DATA['message'])) : ?>
        <div class="alert alert-primary" role="alert">
			<p><?php ee($DATA['message']); ?>
		</div>
    <?php else: ?>    
        <form method="post" class="col-lg-4 col-md-12">
            <div class="form-group">
                <label for="product-name">Product name:</label>
                <input type="text" name="product-name" class="form-control" placeholder="Enter product name">
            </div>
            <button type="submit" class="btn btn-primary">Search for Product</button>
        </form>
    <?php endif; ?>
<?php require_once '../private/application/templates/_shared/footer.php';?>