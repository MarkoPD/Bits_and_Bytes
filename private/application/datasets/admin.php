<?php
    function admin_get_all($database) {
        return database_select_many($database, 'SELECT *FROM `admin` ORDER BY created_at ASC;');
    }

    function admin_get_by_id($database, $adminId) {
        return database_select_one($database, 'SELECT * FROM `admin` WHERE admin_id = ?;', [ $adminId ]);
    }

    function admin_get_by_username($database, $username) {
        return database_select_one($database, 'SELECT * FROM `admin` WHERE username = ?;', [ $username ]);
    }

    function admin_add($database, $name, $username, $password) {
        return database_insert($database, 'INSERT `admin` SET `name` = ?, username = ?, `password` = ?;', [ $name, $username, $password ]);
    }

    function admin_edit_by_id($database, $adminId, $name, $username, $password, $active) {
        return database_execute($database, 
                                'UPDATE `admin` SET `name` = ?, username = ?, `password` = ?, active = ? WHERE admin_id = ?;',
                                [ $name, $username, $password, $active, $adminId ]);
    }

    function admin_delete_by_id($database, $adminId) {
        return database_execute($database, 'DELETE * FROM `admin` WHERE admin_id = ?;', [ $adminId ]);
    }