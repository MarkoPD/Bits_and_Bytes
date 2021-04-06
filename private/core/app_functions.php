<?php
    function redirect($url) {
        ob_clean();
        header('Location: ' . $url);
        exit;
    }

    function redirectToAction($action) {
        ob_clean();
        header('Location: ?action=' . $action);
        exit;
    }

    /*function set($name, $value){
        $GLOBALS[$name] = $value;
    }*/

    function e($string) {
        return htmlspecialchars($string);
    }

    function ee($string) {
        echo htmlspecialchars($string);
    }

    function uploadedImage($name) {
        echo UPLOAD_DIR_PUBLIC . $name;
    }