<?php
    if ($_POST) {
        $data = [];

        $customerName = filter_input(INPUT_POST, 'customer-name', FILTER_SANITIZE_STRING);
        $customerUser = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $customerPass = password_hash(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);
        $customerAddr = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);

        if ($customerName == '' ) {
            $data['message'] = 'Name needed!';
            return $data;
        }else if ($customerUser == '') {
            $data['message'] = 'Username needed!';
            return $data;
        }else if ($customerPass == '') {
            $data['message'] = 'Password needed';
            return $data;
        }else if ($customerAddr == '') {
            $data['message'] = 'Address needed!';
            return $data;
        }

        require_once('../private/application/datasets/customer.php');

        $customer = customer_get_by_username($database, $customerUser);

        if ($customer->username) {
            $data['message'] = 'The username ' . $customerUser . ' already exists! Please try again.';
            return $data;
        }

        $addCustomer = customer_add($database, $customerName, $customerUser, $customerPass, $customerAddr);
        
        if ($addCustomer) {
            $data['message'] = 'Customer ' . $customerName . ' was added successfully!';
            return $data;
        }

        return $data;
    }