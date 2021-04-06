<?php
    require_once '../private/application/datasets/product.php';
    require_once '../private/application/datasets/category.php';
    //require_once '../private/application/modules/Global/selectCategory.php';
    include '../private/application/modules/Global/selectCategory.php';

    #Get the ID of the requested category
   // $category = category_get_all($database);
    //$categoryId = intval($_GET['category']);
   // echo $temp;
    $data = [];

    $category = category_get_all($database);
    var_dump($category);
   // $DATA['category'] = $category;

   // $product = product_get_all($database);
  //  $DATA['product'] = $product;


      //  foreach($productName)
       // $productImg = product_get_img_by_name($database, $productName);
        

      // $tempImg = $products->image;
        #A data array where all messages and data for displaying will be stored to access them in the rtemplate

        #Check whether the product exists
        /*if (!$products) {
            $data['message'] = 'There are no available products fro this category!';
            return $data;
        }
    */
    return $data;