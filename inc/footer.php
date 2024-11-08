<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>

<body>

<!-- Footer -->
<footer class="bg-light text-dark py-5">
    <div class="container">
        <div class="row gy-4">
            <!-- Contact Section -->
            <div class="col-lg-3">
                <h4 class="fw-bold mb-3">Liên Hệ</h4>
                <ul class="list-unstyled">
                    <li><i class="fa-solid fa-house me-2"></i>470 Đ. Trần Đại Nghĩa, Khu đô thị, Ngũ Hành Sơn, Đà Nẵng</li>
                    <li><i class="fa-solid fa-phone me-2"></i>0706163387</li>
                    <li><i class="fa-solid fa-envelope me-2"></i>lehuy2425@gmail.com</li>
                </ul>
            </div>

            <!-- Navigation Links -->
            <div class="col-lg-2">
                <h5>Links</h5>
                <ul class="list-unstyled">
                    <li><a href="index.php" class="text-dark text-decoration-none">Home</a></li>
                    <li><a href="rooms.php" class="text-dark text-decoration-none">Rooms</a></li>
                    <li><a href="facilities.php" class="text-dark text-decoration-none">Facilities</a></li>
                    <li><a href="contact.php" class="text-dark text-decoration-none">Contact Us</a></li>
                    <li><a href="about.php" class="text-dark text-decoration-none">About</a></li>
                </ul>
            </div>

            <!-- Help Section -->
            <div class="col-lg-3">
                <h5>Được giúp đỡ</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-dark text-decoration-none">QHUY</a></li>
                    <li><a href="#" class="text-dark text-decoration-none">APPLE INC</a></li>
                    <li><a href="#" class="text-dark text-decoration-none">SAUDI ARAMCO</a></li>
                    <li><a href="#" class="text-dark text-decoration-none">MICROSOFT CORP</a></li>
                </ul>
            </div>

            <!-- Branches -->
            <div class="col-lg-2">
                <h5>Chi Nhánh</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-dark text-decoration-none">Đà Nẵng</a></li>
                    <li><a href="#" class="text-dark text-decoration-none">TP Hồ Chí Minh</a></li>
                    <li><a href="#" class="text-dark text-decoration-none">Hà Nội</a></li>
                    <li><a href="#" class="text-dark text-decoration-none">Hải Phòng</a></li>
                    <li><a href="#" class="text-dark text-decoration-none">Cần Thơ</a></li>
                </ul>
            </div>

            <!-- Social Links -->
            <div class="col-lg-2">
                <h5>Theo dõi</h5>
                <div class="d-flex gap-2">
                    <a href="<?php echo $contact_result['tw']; ?>" class="btn btn-outline-dark rounded-circle"><i class="fa-brands fa-twitter"></i></a>
                    <a href="<?php echo $contact_result['fb']; ?>" class="btn btn-outline-dark rounded-circle"><i class="fa-brands fa-facebook"></i></a>
                    <a href="<?php echo $contact_result['ig']; ?>" class="btn btn-outline-dark rounded-circle"><i class="fa-brands fa-instagram"></i></a>
                    <a href="<?php echo $contact_result['tt']; ?>" class="btn btn-outline-dark rounded-circle"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Footer Bottom -->
<div class="bg-dark text-white text-center py-2">
    <small><i class="bi bi-c-circle"></i> By Quốc Huy</small>
</div>

</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    function setActive(){
        let navbar = document.getElementById('nav-bar');
        let a_tags = navbar.getElementsByTagName('a');

        for(i=0; i<a_tags.length;i++){
            let file = a_tags[i].href.split('/').pop();
            let file_name = file.split('.')[0];

            if(document.location.href.indexOf(file_name)>=0){
                a_tags[i].classList.add('active');
            }
        }
    }


    function alert(type, msg, position= 'body')
    {
        let bs_class = (type == 'success') ? "alert-success" : "alert-danger";
        let element = document.createElement('div');
        element.innerHTML = `
            <div class="alert ${bs_class} alert-dismissible fade show" role="alert">
                <strong class="me-3">${msg}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>       
        `;
        if(position == 'body'){
            document.body.append(element);
            element.classList.add('custom-alert');
        }else{
            document.getElementById(position).appendChild(element);
        }
       
        setTimeout(remAlert, 3000);
    }

    function remAlert(){
        document.getElementsByClassName('alert')[0].remove();
    }

    // REGISTER
    let register_form = document.getElementById('register-form');

    register_form.addEventListener('submit', (e)=>{
        e.preventDefault();

        let data = new FormData();
        data.append('name',register_form.elements['name'].value);
        data.append('email',register_form.elements['email'].value);
        data.append('phonenum',register_form.elements['phonenum'].value);
        data.append('address',register_form.elements['address'].value);
        data.append('pincode',register_form.elements['pincode'].value);
        data.append('dob',register_form.elements['dob'].value);
        data.append('pass',register_form.elements['pass'].value);        
        data.append('cpass',register_form.elements['cpass'].value);
        data.append('profile',register_form.elements['profile'].files[0]);
        data.append('register','');
        
        var myModal = document.getElementById("registerModal");
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register.php", true);
       
        xhr.onload = function() {
            let responseText = this.responseText.trim();
            //console.log(responseText);
            if(responseText === 'pass_mismatch') {
                alert('error', "Password Mismatch");
            } 
            else if(responseText === 'email_already') {
                alert('error', "Email is already registered!");
            } 
            else if(responseText === 'phone_already') {
                alert('error', "Phone number is already registered!");
            } 
            else if(responseText === 'inv_img') {
                alert('error', "Only JPG, WEBP & PNG images are allowed");
            } 
            else if(responseText === 'upd_failed') {
                alert('error', "Image upload failed");
            } 
            else if(responseText === 'mail_failed') {
                alert('error', "Cannot send confirm email! Server Down!");
            } 
            else if(responseText === 'ins_failed') {
                alert('error', "Registration failed! Server Down!");
            } 
            else {
                alert('success', "Registration successful. Confirmation link sent to email!");
                register_form.reset();
                
            }
        }
        xhr.send(data); 
      
    });
       
    //LOGIN
    let login_form = document.getElementById('login-form');

    login_form.addEventListener('submit', (e)=>{
        e.preventDefault();

        let data = new FormData();
        data.append('email_mob',login_form.elements['email_mob'].value);
        data.append('pass',login_form.elements['pass'].value);        
        data.append('login','');
        
        var myModal = document.getElementById("loginModal");
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register.php", true);
       
        xhr.onload = function() {
            let responseText = this.responseText.trim();
            console.log(responseText);
            if(responseText === 'inv_email_mob') {
                alert('error', "Invalid Email or Phone Number");
            } else if(responseText === 'not_verified') {
                alert('error', "Email is not verified!");
            } else if(responseText === 'inactive') {
                alert('error', "Account Suspended! Please contact Admin");
            } else if(responseText === 'inv_pass') {
                alert('error', "Incorrect Password!");
            } else {

                let fileurl = window.location.href.split('/').pop().split('?').shift(); //Giữ vị trí của trang khi login success
                if(fileurl ==  'room_details.php'){
                    window.location = window.location.href;
                }else{
                window.location = window.location.pathname;
                }
            }
        }
        xhr.send(data); 
        
    });

    //FORGOT PASSWORD
    let forgot_form = document.getElementById('forgot-form');

    forgot_form.addEventListener('submit', (e)=>{
        e.preventDefault();

        let data = new FormData();
        data.append('email',forgot_form.elements['email'].value);     
        data.append('forgot_pass','');
        
        var myModal = document.getElementById("forgotModal");
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register.php", true);
    

        xhr.onload = function() {
            let responseText = this.responseText.trim();
            // console.log(responseText);
            if(responseText === 'inv_email') {
                alert('error', "Invalid Email!");
            } else if(responseText === 'not_verified') {
                alert('error', "Email is not verified!");
            }else if(responseText === 'inactive') {
                alert('error', "Account Suspended!");
            }else if(responseText === 'mail_failed') {
                alert('error', "Cannot send email! Server Down");
            }else if(responseText === 'upd_failed') {
                alert('error', "Account recovery failed! Server Down");
            } else {
                alert('success', "Reset link sent to email");
                forgot_form.reset();
                
            }
        }
        xhr.send(data); 
        
    });

    //BOOKING ROOM
    function checkLoginToBook(status, room_id){
        if(status){
            window.location.href = 'confirm_booking.php?id='+room_id;
        }else{
            alert('error','Please login to book room!');
        }
    }

    setActive();
       
</script>