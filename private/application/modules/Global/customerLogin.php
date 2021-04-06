<?php
    if ($_POST) {
         /*
        NOTE: AFTER EVERY ERROR MESSAGE, STOP THE PROGRAM BY RETURNING THE DATA STORED IN THE $data ARRAY
        */

        #A data array where all messages and data for displaying will be stored to access them in the rtemplate
        $data = [];

        #Get the input values from the $_POST array and filter them from special characters
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        
        if ($username == '' || $password == '') {
            $data['message'] = 'All fields are required!';
            return $data;
        }
        
        require_once('../private/application/datasets/customer.php');

        $customer = customer_get_by_username($database, $username);

        #Check the username exists
        if (!$customer) {
            sleep(1);
            $data['message'] = 'Wrong username';
            return $data;
        }

        #Check whether the entered password matches the hash from the database
        if (!password_verify($password,  $customer->password)) {
            sleep(1);
           // $data['message'] = 'Wrong password';
            $data['message'] = $customer->password;
            return $data;
        }

        #Check whther the user account is active
        if ($customer->active == 0) {
            sleep(1);
            $data['message'] = 'Account is disabled, contact your admin!';
            return $data;
        }

        #Unset the password from the customer array before passing it to the $_SESSION array for security reasons
        unset($customer->password);

        $_SESSION['CUSTOMER'] = $customer;

        redirectToAction('Global.home');
    }