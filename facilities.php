
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Shortcut icon" href="images/logo.png">
    <title>ONIX HOTEL - FACILITIES</title>
    <?php 
            require_once("inc/links.php");
            require_once("inc/scripts.php");
    ?>
    <link rel="stylesheet" href="Css/common.css">
   

   </head>
<body class="bg-light">
    <?php include("inc/header.php"); ?>

    <div class="my-5 px-4">
        <div class="fw-bold h-font text-center">OUR FACILITIES</div>
        <div class="h-line bg-dark"></div>
            <p class="text-center mt-3">
            Quality is our top priority. <br> We are committed to providing our customers with the best products/services..
            </p>    
    </div>
    <div class="container">
        <div class="row">

        <?php
            $result = selectAll('facilities');
            $path = FACILITIES_IMG_PATH;

            while($row = mysqli_fetch_assoc($result)){
                echo<<<data
                     <div class="col-lg-4 col-md-6 mb-5 px-4">
                        <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                            <div class="d-flex align-items-center mb-2">
                                <img src="$path$row[icon]" width="40px">
                                <h5 class="m-0 ms-3">$row[name]</h5>      
                            </div>
                            <p>$row[description]</p>
                        </div>
                    </div>

                data;
            }
        ?>
          
        </div>
    </div>





      
<!-- Footer -->
<?php
require_once("inc/footer.php");
?>



</body>
</html>

