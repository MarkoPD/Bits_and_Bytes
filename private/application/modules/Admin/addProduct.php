<?php
    require_once '../private/application/datasets/category.php';
    require_once '../private/application/datasets/admin.php';

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
   // $adminUser = ee($_SESSION['ADMIN']->username);

    if ($_POST) {
        #Get the input values from the $_POST array and filter them from special characters
        $name           = filter_input(INPUT_POST, 'product-name', FILTER_SANITIZE_STRING);
        $price          = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
        $quantity       = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);
        $category       = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
        $image          = $_FILES['image'];

        
        require_once '../private/application/datasets/product.php';
        
        #Check if the image was uploaded succefully, the 0 means that there are no errors
        if ($image['error'] != 0) {
            $data['message'] = 'Error uploading the file!';
            return $data;
        }

        #Extract the image extension from the image name
        $fileNameParts = explode('.', $image['name']);  //Seperate the image name and extension
        $ext = $fileNameParts[count($fileNameParts)-1]; //Get the image extension from the array $fileNameParts

        $folder = date('m');  //folder name where the image is supposed to be stored, month

        #Check if the target folder exists, if not, then create it using the mkdir() function
        #We create a new directoris because one directory is limited to 10000 files
        if (!is_dir(UPLOAD_DIR_PRIVATE . $folder)) {
            mkdir(UPLOAD_DIR_PRIVATE . $folder, 0755, true);    //0755 is a permission that the only owner can read, write and execute on this folder
        }

        #Generate a file name: year/month/dateRandomNumber.extension
        $generateFileName = $folder . '/' . date('dHis') . rand(1000, 9999) . '.' . $ext;

        #Move the uploaded file to the created directory
        $res = move_uploaded_file($image['tmp_name'], UPLOAD_DIR_PRIVATE . $generateFileName);

        #Check whether the uploaded file was moved succefully
        if (!$res) {
            $data['message'] = 'Error storing the file on server!';
            return $data;
        }

        #Check whether all fields were filled
        if ($name == '') {
            $data['message'] = 'Name needed!';
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
        $product = product_get_by_name($database, $name);
        
        if ($product) {
            $data['message'] = 'The product ' . $name . ' is already in the registry!';
            return $data;
        }

        $addProduct = product_add($database, $name, $price, $quantity, $categoryId, $adminId, $generateFileName);
    
        if ($addProduct) {
            $data['message'] = 'Product with filename'. $generateFileName .'was added successfully!';
            return $data;
        }else{ 
            $data['message'] = 'Product was not added successfully :(';

        }
    }

    return $data;