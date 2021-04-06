<?php
    require_once '../private/application/datasets/category.php';
    require_once '../private/application/datasets/admin.php';
    require_once '../private/application/modules/Admin/selectProduct.php';

    /*
    NOTE: AFTER EVERY ERROR MESSAGE, STOP THE PROGRAM BY RETURNING THE DATA STORED IN THE $data ARRAY
    */

    #A data array where all messages and data for displaying will be stored to access them in the rtemplate
    $data = [];

    $categories = category_get_all($database);
    if(isset($categories)){
        $data['categories'] = $categories;
    }

    $admins = admin_get_all($database);
    if(isset($admins)){
        $data['admins'] = $admins;
    }

    if ($_POST) {
        #Get the input values from the $_POST array and filter them from special characters
        $name           = filter_input(INPUT_POST, 'product-name', FILTER_SANITIZE_STRING);
        $productId      = filter_input(INPUT_POST, 'product-id', FILTER_SANITIZE_STRING);
        $price          = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
        $quantity       = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);
        $category       = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
     //   $adminUser      = filter_input(INPUT_POST, 'adminUser', FILTER_SANITIZE_STRING);
     //   $image          = $_FILES['image'];

        require_once '../private/application/datasets/product.php';

        $product = admin_get_all($database);
        if(isset($products)){
            $data['product'] = $product;
        }


        /*
        #Check if the image was uploaded succefully, the 0 means that there are no errors
        if ($image['error'] != 0) {
            $data['message'] = 'Error uploading the file!';
            return $data;
        }

        #Extract the image extension from the image name
        $fileNameParts = explode('.', $image['name']);  //Seperate the image name and extension
        $ext = $fileNameParts[count($fileNameParts)-1]; //Get the image extension from the array $fileNameParts

        $folder = date('Y/m');  //folder name where the image is supposed to be stored, year/month

        #Check if the target folder exists, if not, then create it using the mkdir() function
        #We create a new directoris because one directory is limited to 10000 files
        if (!is_dir(UPLOAD_DIR_PRIVATE . $folder)) {
            mkdir(UPLOAD_DIR_PRIVATE . $folder, 0755, true);    //0755 is a permission that the only owner can read, write and execute on this folder
        }

        #Generate a file name: year/month/dateRandomNumber.extension
        $generateFileName = $folder . '/' . date('dHis') . rand(1000, 9999) . '.' . $ext;

        #Move the uploaded file to the created directory
        $res = move_uploaded_file($image['tmp_name'], UPLOAD_DIR_PRIVATE . $generateFileName);

        #Check whether the uploaded file was mmoved succefully
        if (!$res) {
            $data['message'] = 'Error storing the file on server!';
            return $data;
        }
*/
        #Check whether all fields were filled
        if ($name == '') {
            $data['message'] = 'Name needed!';
            return $data;
        }else if ($productId == '') {
            $data['message'] = 'Product_Id needed!';
            return $data;
        }else if ($price == '') {
            $data['message'] = 'Price needed!';
            return $data;
        }else if ($quantity == '') {
            $data['message'] = 'Quantity needed!';
            return $data;
        }if ($category == '') {
            $data['message'] = 'Category needed!';
            return $data;
        }

        $categoryId = category_get_by_name($database, $category)->category_id;
        $adminId = admin_get_by_username($database, $_SESSION['ADMIN']->username)->admin_id;

        $editProduct = product_edit_by_id($database, $productId, $name, $price, $quantity, $categoryId, $adminId);
        var_dump($editProduct);
        if ($editProduct) {
            $data['message'] = 'Product was edited successfully!';
            return $data;
        }else{
            $data['message'] = 'Product was not edited successfully :(';

        }
    }

    return $data;