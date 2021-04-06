<?php
    if ($_POST) {
        $data = [];
        $temp = 'test';
        $categoryName = filter_input(INPUT_POST, 'category-name', FILTER_SANITIZE_STRING);

        if ($categoryName == '') {
            $data['message'] = 'All fields are requested!';
            return $data;
        }

        require_once('../private/application/datasets/category.php');

        $category = category_get_by_name($database, $categoryName);
        var_dump($category);

       // redirectToAction('Global.viewByCategory');

       // return $category;
        return $data;
    }