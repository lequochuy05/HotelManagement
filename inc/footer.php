
<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-lg-4 p-4">
            <h3 class="h-font fw-bold fs-3 mb-2"><?php echo $settings_result['site_title'] ?></h3>
            <p>
                <?php echo $settings_result['site_about'] ?>
            </p>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Links</h5>
            <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a> <br>
            <a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a> <br>
            <a href="facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a> <br>
            <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact Us</a> <br>
            <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">About</a>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Follow Us</h5>
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

<h6 class="text-center bg-dark text-white p-3 m-0"><i class="bi bi-c-circle"></i> By Quốc Huy</h6>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>

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
            } else if(responseText === 'email_already') {
                alert('error', "Email is already registered!");
            } else if(responseText === 'phone_already') {
                alert('error', "Phone number is already registered!");
            } else if(responseText === 'inv_img') {
                alert('error', "Only JPG, WEBP & PNG images are allowed");
            } else if(responseText === 'upd_img') {
                alert('error', "Image upload failed");
            } else if(responseText === 'mail_failed') {
                alert('error', "Cannot send confirm email! Server Down!");
            } else if(responseText === 'ins_failed') {
                alert('error', "Registration failed! Server Down!");
            } else {
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
                window.location = window.location.pathname;
                
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
       
</script>