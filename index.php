
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Shortcut icon" href="images/logo.png">
   
    <?php   
        require_once("inc/links.php"); 
    ?>
     <title><?php echo $settings_result['site_title'] ?></title>
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

        <?php
            $sql = "SELECT * FROM rooms WHERE status=? AND removed = ? ORDER BY id ASC LIMIT 3";
            $room_res = select($sql, [1,0],'ii');
            while($room_data = mysqli_fetch_assoc($room_res))
            {
                #get features of room
                $sql_fea = "SELECT f.name FROM features f 
                        INNER JOIN room_features rfea ON f.id = rfea.features_id
                        WHERE rfea.room_id = '$room_data[id]'";

                $fea_q = mysqli_query($conn, $sql_fea);
                $features_data = "";
                while($fea_row = mysqli_fetch_assoc($fea_q))
                {
                    $features_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                                            $fea_row[name]
                                        </span>";

                }
                
                    #get facilities of room
                    $sql_fac = "SELECT f.name FROM facilities f 
                    INNER JOIN room_facilities rfac ON f.id = rfac.facilities_id
                    WHERE rfac.room_id = '$room_data[id]'";

                $fac_q = mysqli_query($conn, $sql_fac);
                $facilities_data = "";
                while($fac_row = mysqli_fetch_assoc($fac_q))
                {
                    $facilities_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                                            $fac_row[name]
                                        </span>";

                }

                #get room thumbnail of room
                $room_thumb = ROOMS_IMG_PATH."thumbnail.jpg";
                $sql_thumb = "SELECT * FROM room_images 
                                WHERE room_id = '$room_data[id]' 
                                AND thumb= '1'";
                $thumb_q = mysqli_query($conn, $sql_thumb);
                if(mysqli_num_rows($thumb_q)>0){
                    $thumb_res = mysqli_fetch_assoc($thumb_q);
                    $room_thumb = ROOMS_IMG_PATH.$thumb_res['image'];
                }

                $book_btn = "";

                if(!$settings_result['shutdown']){
                    $book_btn= "<a href='#' class='btn btn-sm text-white custom-bg shadow-none'>Book Now</a>";
                }

                #print room cards
                echo<<<data
                    <div class="col-lg-4 col-md-6 my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                        <img src="$room_thumb" class="card-img-top">
                            <div class="card-body">
                                <h5>$room_data[name]</h5>
                                <h6 class="mb-4">$$room_data[price]</h6>
                                <div class="features mb-4">
                                    <h6 class="mb-1">Features</h6>
                                    $features_data
                                </div>
                                <div class="facilities mb-4">
                                    <h6 class="mb1-">Facilities</h6>
                                    $facilities_data
                                </div>
                                <div class="guests mb-4">
                                    <h6 class="mb1-">Guests</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                        $room_data[adult] Adult
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                        $room_data[children] Children
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
                                    $book_btn
                                    <a href="room_details.php?id=$room_data[id]" class="btn btn-sm btn-outline-dark shadow-none">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                data;
            }

        ?>
        <div class="col-lg-12 text-center mt-5">
            <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms >>></a>
        </div>
    </div>
</div>

<!-- Facilities -->
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>
<div class="container">
    <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
        <?php
            $result = mysqli_query($conn, "SELECT * FROM facilities ORDER BY id DESC LIMIT 5");
            $path = FACILITIES_IMG_PATH;

            while($row = mysqli_fetch_assoc($result)){
                echo<<<data
                    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                        <img src="$path$row[icon]" width="80px">
                        <h5 class="mt-3">$row[name]</h5>
                    </div>
                    
                data;
            }
        ?>

        <div class="col-lg-12 text-center mt-5">
            <a href="facilities.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Facilities >>></a>
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
    <div class="col-lg-12 text-center mt-5">
        <a href="about.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Know More >>></a>
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

<!-- Password Reset -->
<div class="modal fade" id="recoveryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="recovery-form">
        <div class="modal-header">
          <h5 class="modal-title d-flex align-items-center"><i class="bi bi-shield-lock fs-3 me-2"></i> Set up New Password</h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
            Note: A link will be sent to your email to reset your password!
          </span>
          <div class="mb-4">
            <label class="form-label">New Password</label>
            <input type="password" name="pass" class="form-control shadow-none" required>           
            <input type="hidden" name="email">
            <input type="hidden" name="token">
        </div>
        
          <div class="mb-2 text-end">
            <button type="button" class="btn shadow-none me-2"data-bs-dismiss="modal">
                Cancel
            </button>
            <button type="submit" class="btn btn-dark shadow-none">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Footer -->
<?php
include_once("inc/footer.php");
?>

<?php
    if(isset($_GET['account_recovery'])){
        $data = filteration($_GET);

        $t_date = date("Y-m-d");
        $q = select("SELECT * FROM taikhoanuser WHERE email =? AND token=? AND t_expire=? LIMIT 1",
                    [$data['email'],$data['token'],$t_date],'sss');
        if(mysqli_num_rows($q)==1){
            echo<<<showModal
                <script>
                    var myModal = document.getElementById('recoveryModal');
                    
                    
                    myModal.querySelector("input[name='email']").value = '$data[email]';
                    myModal.querySelector("input[name='token']").value = '$data[token]';
   
                    var modal = bootstrap.Modal.getOrCreateInstance(myModal);
                    modal.show();   
                </script>
            showModal;
        }else{
            alert("error", "Invalid or Expired Link!");
        }
    }
?>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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

    //Recover account
    let recovery_form = document.getElementById('recovery-form');

    recovery_form.addEventListener('submit', (e)=>{
        e.preventDefault();

        let data = new FormData();
        data.append('email',recovery_form.elements['email'].value); 
        data.append('token',recovery_form.elements['token'].value);
        data.append('pass',recovery_form.elements['pass'].value);    
        data.append('recover_user','');
        
        var myModal = document.getElementById("recoveryModal");
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register.php", true);
    

        xhr.onload = function() {
            let responseText = this.responseText.trim();
            if(responseText === 'failed') {
                alert('error', "Account reset failed!");
            } else {
                alert('success', "Account reset successful!");
                recovery_form.reset();
                
            }
        }
        xhr.send(data); 
        
    });
</script>
</body>
</html>

