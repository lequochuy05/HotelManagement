<?php
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }else{
        $action = '';
    }
    switch ($action) {

        case 'admin':
            require_once("View/Admin/admin.php");
        break;
        case 'login':
            require_once("View/Admin/login.php");
        break;
        case 'logout':
            require_once("View/Admin/logout.php");
        break;


        default:
            $message = "Unknown error.";
            break;
    }
?>
