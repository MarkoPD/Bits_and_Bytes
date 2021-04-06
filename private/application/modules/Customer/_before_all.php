<?php
    if (!isset($_SESSION['CUSTOMER'])) {
        redirectToAction('?Global.home');
    }