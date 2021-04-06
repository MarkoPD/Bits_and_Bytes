<?php
    if (!isset($_SESSION['ADMIN'])) {
        redirectToAction('Global.adminLogin');
    }
