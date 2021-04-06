<?php
	function login_get_all($database) {
		return database_select_many($database, 'SELECT * FROM `login` ORDER BY created_at ASC;');
	}

	function login_add($database, $customerId, $adminId, $ipAddress) {
		return database_insert($database, 'INSERT `login` SET customer_id = ?, admin_id = ?, ip_address = ?;', [ $customerId, $adminId, $ipAddress ]);
	}