<?php require_once '../private/application/templates/_shared/header.php'; ?>
    <h2>Select a Category</h2>
    <?php if(isset($DATA['message'])) : ?>
        <div class="alert alert-primary" role="alert">
			<p><?php ee($DATA['message']); ?>
		</div>
    <?php else: ?>    
        <form method="post" class="col-lg-4 col-md-12">
            <div class="form-group">
                <label for="category-name">Category name:</label>
                <input type="text" name="category-name" class="form-control" placeholder="Enter category name">
            </div>
            <button type="submit" class="btn btn-primary">Search Category</button>
        </form>
    <?php endif; ?>
<?php require_once '../private/application/templates/_shared/footer.php';?>