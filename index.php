
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Shortcut icon" href="images/logo.png">
    <title>ONIX</title>
    <?php   
        require_once("inc/links.php"); 
        require_once("inc/scripts.php");
    ?>
    <link rel="stylesheet" href="Css/common.css">
   </head>
<body class="bg-light">
      <?php
          include("inc/header.php");
      ?>
   
<div class="container-fluid px-lg-4 mt-4">
  <div class="swiper swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="images/dashboard/img-01.png" class="w-100 d-block" />
      </div>
      <div class="swiper-slide">
        <img src="images/dashboard/img-02.png" class="w-100 d-block" />
      </div>
      <div class="swiper-slide">
        <img src="images/dashboard/img-03.png" class="w-100 d-block" />
      </div>
      <div class="swiper-slide">
        <img src="images/dashboard/img-04.png" class="w-100 d-block" />
      </div>
      <div class="swiper-slide">
        <img src="images/dashboard/img-05.png" class="w-100 d-block" />
      </div>
      <div class="swiper-slide">
        <img src="images/dashboard/img-06.png" class="w-100 d-block" />
      </div>
    </div>
  
  </div>
</div>
 <!-- Check availability room -->

<div class="container availability-form">
    <div class="row">
        <div class="col-lg-12 bg-white shadow p-4 rounded">
            <h5 class="mb-4">Check Booking Availability</h5>
            <form>
                <div class="row">
                    <div class="col-lg-3">
                        <label class="form-label" style="font-weight: 500;">Check-in</label>
                        <input type="date" class="form-control shadow-none"> 
                    </div>
                    <div class="col-lg-3">
                        <label class="form-label" style="font-weight: 500;">Check-out</label>
                        <input type="date" class="form-control shadow-none"> 
                    </div>
                    <div class="col-lg-3">
                        <label class="form-label" style="font-weight: 500;">Adult</label>
                        <select class="form-select shadow-none">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label class="form-label" style="font-weight: 500;">Children</label>
                        <select class="form-select shadow-none">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-1 mb-lg-3 mt-2">
                        <button type="submit" class="btn text-white shadow-none custom-bg" style="background-color: #2ec1ac;">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--    Our rooms   -->
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>
<div class="container">
    <div class="row">
    <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
            <img src="images/rooms/1.png" class="card-img-top">
                <div class="card-body">
                    <h5>Room 1</h5>
                    <h6 class="mb-4">$15</h6>
                    <div class="features mb-4">
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
                    <div class="facilities mb-4">
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
                    <div class="facilities mb-4">
                        <h6 class="mb1-">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                        5 Adust 
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                        3 Children
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
                    <div class="d-flex justify-content-evenly mb-2">
                        <a href="#" class="btn btn-sm text-white shadow-none" style="background-color: #2ec1ac;">Book Now</a>
                        <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Details</a>
                    </div>
                    </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
            <img src="images/rooms/2.png" class="card-img-top">
                <div class="card-body">
                    <h5>Room 2</h5>
                    <h6 class="mb-4">$25</h6>
                    <div class="features mb-4">
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
                    <div class="facilities mb-4">
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
                    <div class="facilities mb-4">
                        <h6 class="mb1-">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                        5 Adust 
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                        3 Children
                        </span>
                    </div>
                    <div class="rating mb-4">
                        <h6 class="mb-1">Rating</h6>
                        <span class="badge rounded-pill bg-light">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </span>
                    </div>
                    <div class="d-flex justify-content-evenly mb-2">
                        <a href="#" class="btn btn-sm text-white shadow-none" style="background-color: #2ec1ac;">Book Now</a>
                        <a href="#" class="btn btn-outline-dark shadow-none">Details</a>
                    </div>
                    </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
            <img src="images/rooms/3.png" class="card-img-top">
                <div class="card-body">
                    <h5>Room 3</h5>
                    <h6 class="mb-4">$25</h6>
                    <div class="features mb-4">
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
                    <div class="facilities mb-4">
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
                    <div class="facilities mb-4">
                        <h6 class="mb1-">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                        5 Adust 
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                        3 Children
                        </span>
                    </div>
                    <div class="rating mb-4">
                        <h6 class="mb-1">Rating</h6>
                        <span class="badge rounded-pill bg-light">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </span>
                    </div>
                    <div class="d-flex justify-content-evenly mb-2">
                        <a href="#" class="btn btn-sm text-white shadow-none" style="background-color: #2ec1ac;">Book Now</a>
                        <a href="#" class="btn btn-outline-dark shadow-none">Details</a>
                    </div>
                    </div>
            </div>
        </div>
        
        <div class="col-lg-12 text-center mt-5">
            <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms >>></a>
        </div>
    </div>
</div>

<!-- Facilities -->
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>
<div class="container">
    <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="images/features/wifi.svg" width="80px">
            <h5 class="mt-3">Wifi</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="images/features/cooker.svg" width="80px">
            <h5 class="mt-3">Cooker</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="images/features/serve.svg" width="80px">
            <h5 class="mt-3">Serve</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="images/features/telephone.svg" width="80px">
            <h5 class="mt-3">Telephone</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="images/features/employee.svg" width="80px">
            <h5 class="mt-3">Employee</h5>
        </div>
        <div class="col-lg-12 text-center mt-5">
            <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Facilities >>></a>
        </div>
    </div>
</div>

<!-- Testimonials -->
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">TESTIMONIALS</h2>
<div class="container">
    <div class="swiper swiper-testimonials">
        <div class="swiper-wrapper md-5">


            <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center mb-3">
                    <img src="images/features/man.svg" width="30px">
                    <h6 class="m-0 ms-2">User1</h6>
                </div>
                <p>
                    Khách sạn có không gian sang trọng, hiện đại cùng với đội ngũ nhân viên phục vụ tận tâm, chu đáo. 
                    Phòng ốc sạch sẽ, tiện nghi đầy đủ, mang đến cảm giác thoải mái và dễ chịu. 
                    Đây chắc chắn là nơi nghỉ dưỡng lý tưởng cho những ai muốn trải nghiệm dịch vụ cao cấp.
                </p>
                <div class="rating">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  
                </div>
            </div>
            <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center p-4">
                    <img src="images/features/man.svg" width="30px">
                    <h6 class="m-0 ms-2">User2</h6>
                </div>
                <p>
                    Khách sạn có không gian sang trọng, hiện đại cùng với đội ngũ nhân viên phục vụ tận tâm, chu đáo. 
                    Phòng ốc sạch sẽ, tiện nghi đầy đủ, mang đến cảm giác thoải mái và dễ chịu. 
                    Đây chắc chắn là nơi nghỉ dưỡng lý tưởng cho những ai muốn trải nghiệm dịch vụ cao cấp.
                </p>
                <div class="rating">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  
                </div>
            </div>
            <div class="swiper-slide bg-white p-4"> 
                <div class="profile d-flex align-items-center p-4">
                    <img src="images/features/man.svg" width="30px">
                    <h6 class="m-0 ms-2">User3</h6>
                </div>
                <p>
                    Khách sạn có không gian sang trọng, hiện đại cùng với đội ngũ nhân viên phục vụ tận tâm, chu đáo. 
                    Phòng ốc sạch sẽ, tiện nghi đầy đủ, mang đến cảm giác thoải mái và dễ chịu. 
                    Đây chắc chắn là nơi nghỉ dưỡng lý tưởng cho những ai muốn trải nghiệm dịch vụ cao cấp.
                
                </p>
                <div class="rating">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  
                </div>
            </div>
            
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

<!-- Reach Us -->
    
 <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Reach Us</h2>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-4 p-4 mb-lg-0 mb-3 bg-white rounded">
          <iframe class="w-100" height="400px" src="<?php echo $contact_result['iframe']; ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="bg-white p-4 rounded mb-4">
                <h5>Call Us</h5>
                <a href="tel: +<?php echo $contact_result['phoneNumber1']; ?>" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +<?php echo $contact_result['phoneNumber1']; ?></a> <br>
                <?php
                    if($contact_result['phoneNumber2']!=''){
                        echo<<<data
                        <a href="tel: +$contact_result[phoneNumber2]" class="d-inline-block mb-2 text-decoration-none text-dark">
                            <i class="bi bi-telephone-fill"></i> +$contact_result[phoneNumber2]
                        </a>           
                        data;
                    }

                ?>
                 </div>
            <div class="bg-white p-4 rounded mb-4">
                <h5>Follow Us</h5>
                <?php
                    if($contact_result['tw']!= ''){
                        echo<<<data
                            <a href="$contact_result[tw]" class="d-inline-block mb-1 text-decoration-none">
                                <span class="badge bg-light text-dark fs-6 p-2">
                                    <i class="bi bi-twitter me-1"></i> Twitter
                                </span>
                            </a>                                                         
                        data;
                    }
                ?>
                <br>
                <a href="<?php echo $contact_result['ig'] ?>" class="d-inline-block mb-1 text-decoration-none">
                    <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-instagram me-1"></i> Instagram
                    </span>
                </a>
                <br>
                <a href="<?php echo $contact_result['fb'] ?>" class="d-inline-block mb-1 text-decoration-none">
                    <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-facebook me-1"></i> Facebook
                    </span>
                </a>
                <br>
                <a href="<?php echo $contact_result['tt'] ?>" class="d-inline-block mb-1 text-decoration-none">
                    <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-tiktok me-1"></i> TikTok
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php
include_once("inc/footer.php");
?>

<script>
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
      loop:true,
      autoplay: {
        delay: 3500,
        disableOnInteraction:false,
      }
    });

    var swiper = new Swiper(".swiper-testimonials", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      slidesPerView: "3",
      loop: true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        320: {
            slidesPerView: 1,
        },
        640: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        }
      }
    });
  </script>
</body>
</html>

