<?php

    require('../Admin/inc/dbconfig.php');
    require('../Admin/inc/essentials.php');
    require("../inc/sendgrid/sendgrid-php.php");
    
    date_default_timezone_set("Asia/Ho_Chi_Minh");


    function send_email($recipient_email, $token, $type){
        if($type == "email_confirmation"){
            $page = 'email_confirm.php';
            $subject = "Account Verification Link";
            $content = "confirm your email";
        }else{
            $page = 'index.php';
            $subject = "Account Reset Link";
            $content = "reset your account";
            
        }
        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom(SENDGRID_EMAIL, SENDGRID_NAME);
        $email->setSubject($subject);

        $email->addTo($recipient_email);
       
        $email->addContent(
            "text/html", "Click the link to $content: <br>
                <a href='".SITE_URL."$page?$type&email=$recipient_email&token=$token"."'>CLICK</a>
            "
        );
        $sendgrid = new \SendGrid(SENDGRID_API_KEY);

        try{
            $sendgrid->send($email);
            return 1;
        }catch (Exception $e){
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