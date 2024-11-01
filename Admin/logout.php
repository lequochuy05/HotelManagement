<?php
    require_once("inc/essentials.php");
    session_start();
    session_destroy();
    redirect('login.php');

?>