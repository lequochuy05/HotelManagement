<?php

    require('../Admin/inc/dbconfig.php');
    require('../Admin/inc/essentials.php');
    require("../inc/sendgrid/sendgrid-php.php");
    
    date_default_timezone_set("Asia/Ho_Chi_Minh");


    function send_email($recipient_email, $token, $type) {
        // Define content based on email type
        if ($type == "email_confirmation") {
            $page = 'email_confirm.php';
            $subject = "Account Verification Link";
            $content = [
                "header" => "Verify Your Email Address",
                "body" => "Please click the button below to confirm your email and activate your account.",
                "button" => "Confirm Email"
            ];
        } else {
            $page = 'index.php';
            $subject = "Account Reset Link";
            $content = [
                "header" => "Reset Your Account Password",
                "body" => "We received a request to reset your account password. Click the button below to proceed.",
                "button" => "Reset Password"
            ];
        }
    
        // Build email content with enhanced styling
        $emailContent = "
        <div style='font-family: Arial, sans-serif; padding: 20px; text-align: center; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 10px;'>
            <h2 style='color: #333;'>{$content['header']}</h2>
            <p style='font-size: 16px; color: #555;'>
                {$content['body']}
            </p>
            <a href='" . SITE_URL . "$page?$type&email=$recipient_email&token=$token' 
               style='display: inline-block; margin-top: 15px; padding: 10px 20px; font-size: 16px; color: #fff; background-color: #007BFF; text-decoration: none; border-radius: 5px;'>
               {$content['button']}
            </a>
            <p style='font-size: 12px; color: #999; margin-top: 20px;'>
                If you did not request this, please ignore this email.
            </p>
        </div>
        ";
    
        // Create and send email
        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom(SENDGRID_EMAIL, SENDGRID_NAME);
        $email->setSubject($subject);
        $email->addTo($recipient_email);
        $email->addContent("text/html", $emailContent);
    
        $sendgrid = new \SendGrid(SENDGRID_API_KEY);
        try {
            $sendgrid->send($email);
            return 1;
        } catch (Exception $e) {
            return 0;
        }
    }
    

    if(isset($_POST['register'])){
        $data = filteration($_POST);

        //match pass and cpass field
        if($data['pass'] != $data['cpass']){
            echo 'pass_mismatch';
            exit;
        }

        //check user exist or not
        $u_exist = select("SELECT * FROM taikhoanuser WHERE email=? OR phonenum = ? LIMIT 1",
                            [$data['email'],$data['phonenum']],"ss");
        
        if(mysqli_num_rows($u_exist)!=0){
            $u_exist_fetch = mysqli_fetch_assoc($u_exist);
            echo ($u_exist_fetch['email'] == $data['email']) ? 'email_already' : 'phone_already';

            exit;
        }


        //upload user image to server
        $img = uploadUserImage($_FILES['profile']);
        if($img == 'inv_img'){
            echo 'inv_img';
            exit;
        }else if($img == 'upd_failed'){
            echo 'upd_failed';
            exit;
        }

 
        // send confirm link to user's email
        $token = bin2hex(random_bytes(16));
        if(!send_email($data['email'], $token, "email_confirmation")){
            echo 'mail_failed';
            exit;
        }

        $enc_pass = password_hash($data['pass'], PASSWORD_BCRYPT);
        $sql = "INSERT INTO taikhoanuser(name, email, address, phonenum, pincode, dob, profile, password, token)
                VALUES(?,?,?,?,?,?,?,?,?)";
        $values = [$data['name'],$data['email'],$data['address'],$data['phonenum'],$data['pincode'],$data['dob'],
                    $img, $enc_pass, $token];
        if(insert($sql, $values,'sssssssss'))
        {
            echo 1;
        }else{
            echo 'ins_failed';
        }


    }

    if(isset($_POST['login'])){

        $data = filteration($_POST);

        $u_exist = select("SELECT * FROM taikhoanuser WHERE email=? OR phonenum = ? LIMIT 1",
        [$data['email_mob'],$data['email_mob']],"ss");

        if(mysqli_num_rows($u_exist)==0){
            echo 'inv_email_mob';
            exit;
        }else{
            $u_fetch = mysqli_fetch_assoc($u_exist);
            if($u_fetch['is_verified']==0){
                echo 'not_verified';
            }else if($u_fetch['status']==0){
                echo 'inactive';
            }else{
                if(!password_verify($data['pass'],$u_fetch['password'])){
                    echo 'inv_pass';
                }else{
                    session_start();
                    $_SESSION['login'] = true;
                    $_SESSION['uId'] = $u_fetch['id'];
                    $_SESSION['uName'] = $u_fetch['name'];
                    $_SESSION['uPic'] = $u_fetch['profile'];
                    $_SESSION['uPhone'] = $u_fetch['phonenum'];
                    echo 1;
                }
            }
        }
    }

    if(isset($_POST['forgot_pass'])){

        $data = filteration($_POST);

        $u_exist = select("SELECT * FROM taikhoanuser WHERE email=? LIMIT 1",
        [$data['email']],"s");

        if(mysqli_num_rows($u_exist)==0){
            echo 'inv_email';
            exit;
        }else{
            $u_fetch = mysqli_fetch_assoc($u_exist);
            if($u_fetch['is_verified']==0){
                echo 'not_verified';
            }else if($u_fetch['status']==0){
                echo 'inactive';
            }else{
                //Send reset link to email
                $token = bin2hex(random_bytes(16));
                if(!send_email($data['email'],$token,"account_recovery")){
                    echo 'mail_failed';
                }else{
                    
                    $date = date("Y-m-d");
                    $q = mysqli_query($conn,"UPDATE taikhoanuser SET token = '$token', t_expire = '$date'
                                            WHERE id = '$u_fetch[id]'");
                    if($q){
                        echo 1;
                    }else{
                        echo 'upd_failed';
                    }

                }

            }
        }
    }

    if(isset($_POST['recover_user'])){

        $data = filteration($_POST);

        $enc_pass = password_hash($data['pass'], PASSWORD_BCRYPT);
        
        $q = "UPDATE taikhoanuser SET password =?, token = ?, t_expire=? 
                WHERE email=? AND token=?";
        $values = [$enc_pass, null, null, $data['email'], $data['token']];
        if(update($q, $values, 'sssss')){
            echo 1;
        }else{
            echo 'failed';
        }
    }
?>