<?php
    require_once("message.php");
    session_start();
    session_destroy();
    redirect('index.php?controller=admin&action=login');

?>