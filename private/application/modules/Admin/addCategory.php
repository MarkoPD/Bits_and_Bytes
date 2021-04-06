<?php
    if ($_POST) {
        $data = [];

        $categoryName = filter_input(INPUT_POST, 'category-name', FILTER_SANITIZE_STRING);

        if ($categoryName == '') {
            $data['message'] = 'All fields are requested!';
            return $data;
        }

        require_once('../private/application/datasets/category.php');

        $category = category_get_by_name($database, $categoryName);

        if ($category) {
            $data['message'] = 'Category ' . $categoryName . ' already exists!';
            return $data;
        }

        $addCategory = category_add($database, $categoryName);
        
        if ($addCategory) {
            $data['message'] = 'Category ' . $categoryName . ' was added successfully!';
            return $data;
        }

        return $data;
    }