<?php
    function product_get_all($database) {
        return database_select_many($database, 'SELECT *FROM `product` ORDER BY created_at ASC;');
    }

    function product_get_by_id($database, $productId) {
        return database_select_one($database, 'SELECT * FROM `product` WHERE product_id = ?;', [ $productId ]);
    }

    function product_get_by_category_id($database, $categoryId) {
        return database_select_many($database, 'SELECT `name` FROM `product` WHERE category_id = ?;', [ $categoryId ]);
    }

    function product_add($database, $name, $price, $quantity, $category_id, $admin_id, $image) {
        return database_insert($database, 
                                'INSERT `product` SET `name` = ?, price = ?, `quantity` = ?, category_id = ?, admin_id = ?,`image` = ?;',
                                [ $name, $price, $quantity, $category_id, $admin_id, $image ]);
    }

    function product_edit_by_id($database, $productId, $name, $price, $quantity, $categoryId, $adminId) {
        return database_execute($database, 
                                'UPDATE `product` SET `name` = ?, price = ?, `quantity` = ?, category_id = ?, admin_id = ? WHERE product_id = ?;',
                                [ $name, $price, $quantity, $categoryId, $adminId, $productId ]);
    }

    function product_delete_by_id($database, $productId) {
        return database_execute($database, 'DELETE * FROM `product` WHERE product_id = ?;', [ $productId ]);
    }

    function product_get_by_name($database, $name) {
        return database_select_one($database, 'SELECT * FROM `product` WHERE `name` = ?;', [ $name ]);
    }

    function product_get_img_by_name($database, $name) {
        return database_select_one($database, 'SELECT `image` FROM `product` WHERE `name` = ?;', [ $name ]);
    }