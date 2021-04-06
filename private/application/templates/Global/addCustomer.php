<?php require_once '../private/application/templates/_shared/header.php';?>
    <h2>Add new customer</h2>
    <?php if(isset($DATA['message'])): ?>
        <div class="alert alert-primary" role="alert">
            <p><?php ee($DATA['message']); ?>
        </div>
    <?php else: ?>
        <form method="post" class="col-lg-4 col-md-12" enctype="multipart/form-DATA">
            <div class="form-group">
                <label for="customer-name">Customer name:</label>
                <input type="text" name="customer-name" class="form-control" placeholder="Enter your name">
            </div>
                <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type = "text" name="password" class="form-control" placeholder="Choose a password">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea name="address" class="form-control" placeholder="Enter your address"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Customer</button>
        </form>

        
    <?php endif; ?>
<?php require_once '../private/application/templates/_shared/footer.php'?>