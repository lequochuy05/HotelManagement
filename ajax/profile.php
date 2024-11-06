<?php
    session_start();
    require('../Admin/inc/dbconfig.php');
    require('../Admin/inc/essentials.php');
    
    
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    
    if(isset($_POST['info_form'])){
        $frm_data = filteration($_POST);

        $u_exist = select("SELECT * FROM taikhoanuser WHERE phonenum=? AND id=? LIMIT 1",
            [$frm_data['phonenum'], $_SESSION['uId']], "ss");   

        if(mysqli_num_rows($u_exist)!=0){
            echo 'phone_already';
            exit;
        }

        $q = "UPDATE taikhoanuser SET name=?, address =?, phonenum=?, pincode=?, dob=?
                WHERE id =?";
        $val = [$frm_data['name'],$frm_data['address'],$frm_data['phonenum'],$frm_data['pincode'],$frm_data['dob'],$_SESSION['uId']];

        if(update($q, $val, "sssssi")){
            $_SESSION['uName'] = $frm_data['name'];
            echo 1;
        }else{
            echo 0;
        }

    }

?>