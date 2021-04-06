<?php
	function category_get_all($database) {
		return database_select_many($database, 'SELECT * FROM category ORDER BY created_at ASC;');
	}

	function category_get_by_id($database, $categoryId) {
		return database_select_one($database, 'SELECT * FROM category WHERE category_id = ?;', [ $categoryId ]);
	}

	function category_get_by_name($database, $categoryName) {
		return database_select_one($database, 'SELECT * FROM category WHERE `name` = ?;', [ $categoryName ]);
	}

	function category_add($database, $name) {
		return database_insert($database, 'INSERT category SET `name` = ?;', [ $name ]);
	}

	function category_edit_by_id($database, $categoryId, $name) {
		return database_execute($database, 'UPDATE category SET `name` = ? WHERE category_id = ?;',[ $name, $categoryId ]
		);
	}

	function category_delete_by_id($database, $categoryId) {
		return database_execute($database, 'DELETE FROM category WHERE category_id = ?;', [ $categoryId ]);
	}

	function category_get_id_by_name($database, $categoryName) {
		return database_select_one($database, 'SELECT `category_id` FROM category WHERE `name` = ?;', [ $categoryName ]);
	}
