<?php
    if ($_POST) {
        $data = [];

        $productName = filter_input(INPUT_POST, 'product-name', FILTER_SANITIZE_STRING);

        if ($productName == '') {
            $data['message'] = 'All fields are requested!';
            return $data;
        }

        require_once('../private/application/datasets/product.php');

        $product = product_get_by_name($database, $productName);

        redirectToAction('Admin.editProduct');

        return $product;
        return $data; 
    }