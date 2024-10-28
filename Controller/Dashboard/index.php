<?php
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }else{
        $action = '';
    }
    switch ($action) {
        case 'dashboard':      
        require_once("View/Dashboard/index.php");
        break;

        case 'facilities':
            require_once("View/Facilities/facilities.php");
        break;

        case 'about':
            require_once("View/About/about.php");
        break;

        case 'contact':
            require_once("View/Contact/contact.php");
        break;

        case 'room':
            require_once("View/Room/rooms.php");
        break;

        default:
            $message = "Unknown error.";
            break;
    }
?>
