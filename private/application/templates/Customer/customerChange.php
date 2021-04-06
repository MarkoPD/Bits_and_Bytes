<?php require_once '../private/application/templates/_shared/header.php'; ?>
    <h1>Change your password</h1>

    <?php if(isset($DATA['message'])) : ?>
    <div class="alert alert-primary" role="alert">
        <?php ee($DATA['message'])?></p>
    </div>
    <?php endif; ?>

    <form method="post" class="col-lg-4 col-md-12">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" class="form-control" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="old-password">Old Password:</label>
            <input type="password" name="old-password" class="form-control" placeholder="Enter current password">
        </div>
        <div class="form-group">
            <label for="password">New Password:</label>
            <input type="password" name="password" class="form-control" placeholder="Enter new password">
        </div>
        <button type="submit" class="btn btn-primary">Change</button>
    </form>
<?php require_once '../private/application/templates/_shared/header.php'; ?>