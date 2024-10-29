<?php
    require_once("message.php");
    adminLogin();
    session_regenerate_id(true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>
</head>
<body class="bg-light">
    
    <div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between">
        <h3 class="mb-0">AD - Dashboard</h3>
        <a href="index.php?controller=admin&action=logout" class="btn btn-light btn-sm">LOG OUT</a>
    </div>



</body>
</html>