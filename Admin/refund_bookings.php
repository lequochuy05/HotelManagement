<?php
    require("inc/essentials.php");
    require("inc/dbconfig.php");
    adminLogin();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN - REFUND BOOKING</title>
    <link rel="Shortcut icon" href="images/logo.png">
    
    <?php   require("inc/links.php"); 
            require("inc/scripts.php");?>
    <link rel="stylesheet" href="css/common.css">
</head>
<body class="bg-light">
    <?php
        include("inc/header.php");
    ?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">REFUND BOOKING</h3>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">

                            <div class="text-end mb-4">
                                <input type="text" oninput="get_bookings(this.value)" class="form-control shadow-none w-25 ms-auto" placeholder="Search by name">
                            </div>
                            
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-hover border"  style="min-width: 1200px; overflow-y: auto;">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">User Details</th>
                                        <th scope="col">Room Details</th>
                                        <th scope="col">Refund Amount</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table-data"> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="scripts/refund_bookings.js"></script>
</body>
</html>