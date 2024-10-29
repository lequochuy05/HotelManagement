<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Shortcut icon" href="images/logo.png" />
    <?php require_once("View/Links/links.php") ?>
 
</head>
<body>
    <?php require_once("View/Links/script.php") ?>

    
</body>
</html>
<?php
    include "Model/Admin/DBconfig.php";
   
    if(isset($_GET['controller'])){
        $controller = $_GET['controller'];

    }else{
        $controller = '';
    }
    switch($controller){
        case 'dashboard':{        
            require_once('Controller/Dashboard/index.php');
        }
        case 'admin':{
            require_once('Controller/Admin/index.php');
        }

    }
?>