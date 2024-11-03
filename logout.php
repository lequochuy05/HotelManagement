<?php
    require_once("Admin/inc/essentials.php");
    session_start();
    session_destroy();
    redirect('index.php');

?>