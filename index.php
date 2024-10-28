<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Shortcut icon" href="img/logo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">    
    <?php require_once("View/Links/links.php") ?>
 
</head>
<body>
 <script src="https://unpkg.com/scrollreveal"></script>

    
</body>
</html>
<?php
    include "Model/DBconfig.php";
    $db = new Database();
    $db->connect();   
   
    if(isset($_GET['controller'])){
        $controller = $_GET['controller'];

    }else{
        $controller = '';
    }
    switch($controller){
        case 'dashboard':{        
            require_once('Controller/Dashboard/index.php');
        }

    }
?>