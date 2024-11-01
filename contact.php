
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Shortcut icon" href="images/logo.png">
    <title>ONIX HOTEL - CONTACT</title>
    <?php

        use Google\Service\Analytics\Resource\Data;

        require_once("inc/links.php");
        require_once("inc/scripts.php");
    ?>
    <link rel="stylesheet" href="Css/common.css">

   </head>
<body class="bg-light">

    <?php include("inc/header.php"); ?>

    <div class="my-5 px-4">
        <div class="fw-bold h-font text-center">CONTACT US</div>
        <div class="h-line bg-dark"></div>
            <p class="text-center mt-3">
            Quality is our top priority. <br>
            We are committed to providing our customers with the best products/services..
            </p>    
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <iframe class="w-100 rounded mb-4" height="400px" src="<?php echo $contact_result['iframe'] ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    
                    
                    <h5>Address</h5>
                    <a href="https://maps.app.goo.gl/REzouy5HpVVJqbQW7" target="_blank" class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-geo-alt-fill"></i> 470 Đ. Trần Đại Nghĩa, Hòa Hải, Ngũ Hành Sơn, Đà Nẵng.
                    </a>
                    <h5 class="mt-4">Call Us</h5>
                    <a href="tel: +<?php echo $contact_result['phoneNumber1'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +<?php echo $contact_result['phoneNumber1'] ?></a> <br>
                    <?php
                        if($contact_result['phoneNumber2']!=''){
                            echo<<<data
                                <a href="tel: +$contact_result[phoneNumber2]" class="d-inline-block text-decoration-none text-dark">
                                    <i class="bi bi-telephone-fill"></i> +$contact_result[phoneNumber2]
                                </a>
                            data;
                        }
                    ?>
                    
                    <h5 class="mt-4">Email</h5>
                    <a href="mailto: <?php echo $contact_result['email'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-envelope-fill"></i> <?php echo $contact_result['email'] ?>
                    </a>
                    
                    <h5 class="mt-4">Follow Us</h5>

                        <?php
                            if($contact_result['tw']!=''){
                                echo<<<data
                                    <a href="$contact_result[tw]" class="d-inline-block mb-3 fs-5 me-2">
                                        <i class="bi bi-twitter me-1"></i>
                                    </a>
                                data;
                            }
                        ?>
                        
                        
                        <a href="<?php echo $contact_result['tw'] ?>" class="d-inline-block mb-3 fs-5 me-2">
                            <i class="bi bi-instagram me-1"></i>
                        </a>
             
                        <a href="<?php echo $contact_result['fb'] ?>" class="d-inline-block mb-3 fs-5">
                            <i class="bi bi-facebook me-1"></i>
                        </a> 
                </div>
                
            </div>
            <div class="col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form method="POST">
                        <h5>Send a message</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Name</label>
                            <input name="name" required type="text" class="form-control shadow-none">           
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Email</label>
                            <input name="email" required type="email" class="form-control shadow-none">           
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Subject</label>
                            <input name="subject" required type="text" class="form-control shadow-none">           
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Message</label>
                            <textarea name="message" required class="form-control shadow-none" rows="5" style="resize: none;"></textarea>           
                        </div>
                        <button type="submit" name="send" class="btn text-white shadow-none mt-3">SEND</button>
                    </form>
                </div>
            </div>
           
            
        </div>
    </div>

<?php
    if(isset($_POST['send'])){
        $frm_data = filteration($_POST);

        $sql = "INSERT INTO user_queries(name, email, subject, message) VALUES (?,?,?,?)";
        $values = [$frm_data['name'],$frm_data['email'],$frm_data['subject'],$frm_data['message']];
    
        $result = insert($sql, $values, 'ssss');
        if($result==1){
            alert('success', 'Mail sent');
        }else{
            alert('error', 'Sever down! Try again later!');
        }
    }
?>




      
<!-- Footer -->
<?php
require_once("inc/footer.php");
?>



</body>
</html>

