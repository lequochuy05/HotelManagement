
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONIX HOTEL - ROOMS</title>
    <link rel="stylesheet" href="Css/room.css">

   </head>
<body class="bg-light">
    <?php include_once("View/Header/index.php"); ?>

    <div class="my-5 px-4">
        <div class="fw-bold h-font text-center">OUR ROOMS</div>
        <div class="h-line bg-dark"></div>            
    </div>
    
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">FILTERS</h4>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">CHECK AVAILABILITY</h5>
                                <label class="form-label" style="font-weight: 500;">Check-in</label>
                                <input type="date" class="form-control shadow-none mb-3">
                                <label class="form-label" style="font-weight: 500;">Check-out</label>
                                <input type="date" class="form-control shadow-none"> 
                            </div>
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">FACILITIES</h5>
                                <div class="mb-2">
                                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f1">Facility one</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f2">Facility two</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f3">Facility three</label>
                                </div>
                            </div>
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">GUESTS</h5>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <label class="form-label">Adust</label>
                                        <input type="number" class="form-control shadow-none">
                                    </div>
                                    <div>
                                        <label class="form-label">Children</label>
                                        <input type="number" class="form-control shadow-none">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-lg-9 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-3">
                            <img src="images/rooms/1.png" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Room 1</h5>
                            <div class="features mb-3">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                2 Rooms 
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                2 Bathroom 
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                1 Balcony 
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                1 Sofa 
                                </span>
                            </div>
                            <div class="facilities mb-3">
                                <h6 class="mb1-">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                Wifi 
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                Television
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                Air conditioner 
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                Refrigerator 
                                </span>
                            </div>
                            <div class="rating mb-4">
                                <h6 class="mb-1">Rating</h6>
                                <span class="badge rounded-pill bg-light">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </span>
                            </div>                          
                        </div>
                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <h4 class="mb-4">$15</h4>
                            <a href="#" class="btn btn-sm w-100 text-white shadow-none mb-2" style="background-color: #2ec1ac;">Book Now</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Details</a>
                        </div>
                       
                    </div>
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-3">
                            <img src="images/rooms/2.png" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Room 2</h5>
                            <div class="features mb-3">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                2 Rooms 
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                2 Bathroom 
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                1 Balcony 
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                1 Sofa 
                                </span>
                            </div>
                            <div class="facilities mb-3">
                                <h6 class="mb1-">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                Wifi 
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                Television
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                Air conditioner 
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                Refrigerator 
                                </span>
                            </div>
                            <div class="rating mb-4">
                                <h6 class="mb-1">Rating</h6>
                                <span class="badge rounded-pill bg-light">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </span>
                            </div>                          
                        </div>
                        <div class="col-md-2 text-align-center">
                            <h6 class="mb-4">$15</h6>
                            <a href="#" class="btn btn-sm w-100 text-white shadow-none mb-2" style="background-color: #2ec1ac;">Book Now</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Details</a>
                        </div>
                       
                    </div>
                </div>  
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-3">
                            <img src="images/rooms/3.png" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Room 3</h5>
                            <div class="features mb-3">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                2 Rooms 
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                2 Bathroom 
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                1 Balcony 
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                1 Sofa 
                                </span>
                            </div>
                            <div class="facilities mb-3">
                                <h6 class="mb1-">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                Wifi 
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                Television
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                Air conditioner 
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                Refrigerator 
                                </span>
                            </div>
                            <div class="rating mb-4">
                                <h6 class="mb-1">Rating</h6>
                                <span class="badge rounded-pill bg-light">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </span>
                            </div>                          
                        </div>
                        <div class="col-md-2 text-align-center">
                            <h6 class="mb-4">$15</h6>
                            <a href="#" class="btn btn-sm w-100 text-white shadow-none mb-2" style="background-color: #2ec1ac;">Book Now</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Details</a>
                        </div>
                       
                    </div>
                </div>    
            </div>


        </div>
    </div>
  

  
<!-- Footer -->
<?php
include_once("View/Footer/index.php");
?>



</body>
</html>

