<?php require_once '../private/application/templates/_shared/header.php';?>
    <h2>Edit a Product</h2>
    <?php if(isset($DATA['message'])): ?>
        <div class="alert alert-primary" role="alert">
            <p><?php ee($DATA['message']); ?>
        </div>   
    <?php else: ?>
        <form method="post" class="col-lg-4 col-md-12" enctype="multipart/form-DATA">
            <div class="form-group">
            <div class="form-group">    
                <label for="product-name">Product Name:</label>
                <input type = "text" name="product-name" class="form-control" placeholder="name">
            </div>
            <div class="form-group">
                <label for="product-id">Product Id:</label>
                <input type = "text" name="product-id" class="form-control" placeholder="product-id">
                
                
                
                <!--<input list="product" name="product-id" class="form-control">
                <datalist id="product">
                    <?php foreach($DATA['product'] as $product) : ?>
                        <option value = "<?php ee($product->productId)?>">
                    <?php endforeach; ?>
                </datalist>-->
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type = "text" name="price" class="form-control" placeholder="price">
              
              
              
               <!-- <input list="product" name="price" class="form-control">
                <datalist id="product">
                    <?php foreach($DATA['product'] as $product) : ?>
                        <option value = "<?php ee($product->price)?>">
                    <?php endforeach; ?>
                </datalist>-->
            </div>
            <div class="form-group">    
                <label for="quantity">Quantity:</label>
                <input type = "text" name="quantity" class="form-control" placeholder="quantity">
            </div>
           <!-- <div class="form-group">    
                <label for="adminUser">Username:</label>
                <input type = "text" name="adminUser" class="form-control" placeholder="Enter your username">
            </div>-->
            <!-- <div class="form-group">
                <label for="image">Image:</label>      
                <input type="file" name="image">
            </div>-->
            <div class="form-group"> 
                <label for="category">Category:</label>
                <input list="categories" class="form-control" name="category">
                <datalist id="categories">
                    <?php foreach($DATA['categories'] as $category) : ?>
                        <option value="<?php ee($category->name)?>">
                    <?php endforeach; ?>
                </datalist>
            </div>
            <button type="submit" class="btn btn-primary">Edit Product</button>
        </form>
 
        
    <?php endif; ?>
<?php require_once '../private/application/templates/_shared/footer.php'?>