<?php require_once '../private/application/templates/_shared/header.php';?>
    <h2>Add new Product</h2>
    <?php if(isset($DATA['message'])): ?>
        <div class="alert alert-primary" role="alert">
            <p><?php ee($DATA['message']); ?>
        </div>   
    <?php else: ?>
        <form method="post" class="col-lg-4 col-md-12" enctype="multipart/form-DATA">
            <div class="form-group">
                <label for="product-name">Product name:</label>
                <input type="text" name="product-name" class="form-control" placeholder="Enter product name">
            </div>
                <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" name="price" class="form-control" placeholder="Enter price">
            </div>
            <div class="form-group">    
                <label for="quantity">Quantity:</label>
                <input type = "text" name="quantity" class="form-control" placeholder="Enter quantity">
            </div>
          <!--  <div class="form-group">    
                <label for="adminUser">Username:</label>
                <input type = "text" name="adminUser" class="form-control" value = "<?php ee($_SESSION['ADMIN']->username); ?>" >
            </div>
          -->
            <div class="form-group"> 
                <label for="image">Image:</label>      
                <input type="file" name="image">
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <input list="categories" class="form-control" name="category">
                <datalist id="categories">
                    <?php foreach($DATA['categories'] as $category) : ?>
                        <option value="<?php ee($category->name)?>">
                    <?php endforeach; ?>
                </datalist>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
 
        
    <?php endif; ?>
<?php require_once '../private/application/templates/_shared/footer.php'?>