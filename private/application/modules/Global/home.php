<?php
    require_once '../private/application/datasets/category.php';
    require_once '../private/application/datasets/product.php';

    #A data array where all messages and data for displaying will be stored to access them in the rtemplate
    $data = [];

    $category = category_get_all($database);
    $DATA['category'] = $category;

    $product = product_get_all($database);
    $DATA['product'] = $product;
    /*
    foreach(products): 
    $image = product_get_img_by_name($database,$name);
    */
    if($product == null) {
        $data['message'] = 'No products available to show!';
        return $data;
    }
    
    return $data;