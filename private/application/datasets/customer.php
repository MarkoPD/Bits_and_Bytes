<?php
    function customer_get_all($database) {
        return database_select_many($database, 'SELECT * FROM customer ORDER BY created_at ASC;');
    }

    function customer_get_by_id($database, $id) {
        return database_select_one($database, 'SELECT * FROM customer WHERE customer_id = ?;', [ $id ]);
    }

    function customer_get_by_username($database, $username) {
        return database_select_one($database, 'SELECT * FROM customer WHERE username = ?;', [ $username ]);
    }

    function customer_add($database, $name, $username, $password, $address){
        return database_insert($database,
                                'INSERT customer SET `name` = ?, username = ?, `password` = ?, `address` = ?;',
                                [ $name, $username, $password, $address ]);
    }

    function customer_edit_by_id($database, $customerId, $name, $username, $password, $address, $active) {
        return database_execute($database,
                                'UPDATE customer SET `name` = ?, username = ?, `password` = ?, `address` = ?, active = ? WHERE customer_id = ?;',
                                [ $name, $username, $password, $address, $active, $customerId ]);
    }

    function customer_edit_by_user($database, $password, $username) {
        return database_execute($database,
                                'UPDATE customer SET  `password` = ? WHERE username = ?;',
                                [ $username, $password ]);
    }

    function customer_delete_by_id($database, $customerId) {
        return database_execute($database, 'DELETE * customer WHERE customer_id = ?;', [ $customerId ]);
    }