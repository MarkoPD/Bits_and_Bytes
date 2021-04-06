<?php
	function database_select_many($database, $sql, $parameters = []) {
		$prep = $database->prepare($sql);

		if (!$prep) {
			return [];
		}

		$res = $prep->execute($parameters);

		if (!$res) {
			return [];
		}

		return $prep->fetchAll(PDO::FETCH_OBJ);
	}

	function database_select_one($database, $sql, $parameters = []) {
		$prep = $database->prepare($sql);
		
		if (!$prep) {
			return null;
		}
		
		$res = $prep->execute($parameters);

		if (!$res) {
			return null;
		}
		return $prep->fetch(PDO::FETCH_OBJ);
	}

	function database_insert($database, $sql, $parameters = []) {
		$prep = $database->prepare($sql);

		if (!$prep) {
			return false;
		}

		$res = $prep->execute($parameters);

		if (!$res) {
			return false;
		}
		
		return $database->lastInsertId();
	}

	function database_execute($database, $sql, $parameters = []) {
		$prep = $database->prepare($sql);

		if (!$prep) {
			return false;
		}
		
		$res = $prep->execute($parameters);

		if (!$res) {
			return false;
		}

		return $prep->execute($parameters);
	}
