
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Shortcut icon" href="images/logo.png">
   
    <?php 
            require_once("inc/links.php");
    ?>
    <link rel="stylesheet" href="Css/common.css">
    <title><?php echo $settings_result['site_title'] ?> - ABOUT</title>
   </head>
<body class="bg-light">
    <?php include("inc/header.php"); ?>

    <div class="my-5 px-4">
        <div class="fw-bold h-font text-center">ABOUT US</div>
        <div class="h-line bg-dark"></div>
            <p class="text-center mt-3">
            Quality is our top priority. <br> We are committed to providing our customers with the best products/services..
            </p>    
    </div>
    
    
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-2">
                <h3 class="mb-3">President XQuocHuy</h3>
                <p> He is an attractive man with a refined appearance and a warm smile. ;
                    His friendliness and approachability always make people around him feel comfortable and happy to chat. 
                    Not only is he handsome, he also has a confident style, delicate gestures, creating a natural charm. 
                    Wherever he is, he easily connects and builds good relationships with everyone.</p>
            </div>
            <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-1">
                <img src="images/about/1.png" class="w-100" style="border-radius: 2px">
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/hotel.svg" width="70px">
                    <h4 class="mt-3">50+ Rooms</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/customer.svg" width="70px">
                    <h4 class="mt-3">1000+ Customers</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/review.svg" width="70px">
                    <h4 class="mt-3">800+ Reviews</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/staff.svg" width="70px">
                    <h4 class="mt-3">100+ Staffs</h4>
                </div>
            </div>
          
        </div>
    </div>

    <h3 class="my-5 fw-bold h-font text-center">MANAGEMENT</h3>
    <div class="container px-4">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5">
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="images/about/2.jpg" class="w-100">
                    <h5 class="mt-2">Quốc Huy</h5>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="images/about/3.jpg" class="w-100">
                    <h5 class="mt-2">Quốc Huy</h5>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="images/about/4.jpg" class="w-100">
                    <h5 class="mt-2">Quốc Huy</h5>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="images/about/2.jpg" class="w-100">
                    <h5 class="mt-2">Quốc Huy</h5>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="images/about/4.jpg" class="w-100">
                    <h5 class="mt-2">Quốc Huy</h5>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="images/about/3.jpg" class="w-100">
                    <h5 class="mt-2">Quốc Huy</h5>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="images/about/4.jpg" class="w-100">
                    <h5 class="mt-2">Quốc Huy</h5>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

      
<!-- Footer -->
<?php
include_once("inc/footer.php");
?>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 40,
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

