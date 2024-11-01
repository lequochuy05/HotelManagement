<?php

    require('../inc/dbconfig.php');
    require('../inc/essentials.php');
    adminLogin();

    if(isset($_POST['get_general'])){
         $sql = "SELECT * FROM settings WHERE no = ?";
         $values = [1];
         $result = select($sql, $values, 'i');
         $data = mysqli_fetch_assoc($result);
         $json_data = json_encode($data);
         echo $json_data;
    }

    if(isset($_POST['upd_general'])){
        $frm_data = filteration($_POST);

        $sql = "UPDATE settings SET site_title = ?, site_about = ? WHERE no = ?";
        $values = [$frm_data['site_title'], $frm_data['site_about'], 1];
        $result = update($sql, $values, 'ssi');
        echo $result;
    }


    if(isset($_POST['upd_shutdown'])){
        $frm_data = ($_POST['upd_shutdown']==0) ? 1 : 0;

        $sql = "UPDATE settings SET shutdown = ? WHERE no = ?";
        $values = [$frm_data, 1];
        $result = update($sql, $values, 'ii');
        echo $result;
    }

    if(isset($_POST['get_contacts'])){
        $sql = "SELECT * FROM contact_details WHERE no = ?";
        $values = [1];
        $result = select($sql, $values, "i");
        $data = mysqli_fetch_assoc($result);
        $json_data = json_encode($data);
        echo $json_data;
   }

    if(isset($_POST['upd_contacts'])){
        $frm_data = filteration($_POST);

        $sql = "UPDATE contact_details SET address = ?, gmap = ?, phoneNumber1 = ?, phoneNumber2 = ?, email = ?, fb = ?, tt=?, ig = ?, tw = ?, iframe = ? WHERE no = ?";
        $values = [$frm_data['address'], $frm_data['gmap'], $frm_data['pn1'], $frm_data['pn2'], 
                $frm_data['email'], $frm_data['fb'], $frm_data['tt'], $frm_data['ig'], $frm_data['tw'], $frm_data['iframe'], 1];
        $result = update($sql, $values, 'ssssssssssi');
        echo $result;
    }


    
?>