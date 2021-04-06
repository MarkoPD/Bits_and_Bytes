<?php
    if ($_POST) {
         /*
        NOTE: AFTER EVERY ERROR MESSAGE, STOP THE PROGRAM BY RETURNING THE DATA STORED IN THE $data ARRAY
        */

        #A data array where all messages and data for displaying will be stored to access them in the rtemplate
        $data = [];

        #Get the input values from the $_POST array and filter them from special characters
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = password_hash(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);
        $oldpassword = filter_input(INPUT_POST, 'old-password', FILTER_SANITIZE_STRING);
        
        if ($username == '') {
            $data['message'] = 'Username';
            return $data;
        }else if ($password == '') {
            $data['message'] = 'Old Pass';
            return $data;
        }else if ($oldpassword == '') {
            $data['message'] = 'New Pass';
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
        if (!password_verify($oldpassword,  $customer->password)) {
            sleep(1);
            $data['message'] = $customer->password;
            return $data;
        }

        #Check whther the user account is active
        if ($customer->active == 0) {
            sleep(1);
            $data['message'] = 'Account is disabled, contact your admin!';
            return $data;
        }

        $editCustomer = customer_edit_by_user($database, $username, $password);

        if ($editCustomer) {
            sleep(1);
            $data['message'] = 'Your password has been changed!';
            return $data;
        }
        #Unset the password from the customer array before passing it to the $_SESSION array for security reasons
        unset($customer->password);

        $_SESSION['CUSTOMER'] = $customer;
    }