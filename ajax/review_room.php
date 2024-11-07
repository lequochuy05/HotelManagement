<?php
    session_start();
    require('../Admin/inc/dbconfig.php');
    require('../Admin/inc/essentials.php');

    date_default_timezone_set("Asia/Ho_Chi_Minh");


    if(!(isset($_SESSION['login']) && $_SESSION['login'] == true))
        {
            redirect('index.php');
        }

    if(isset($_POST['review_form']))
    {
        $frm_data = filteration($_POST);

        $upd_q = "UPDATE booking_order SET rate_review = ? WHERE booking_id= ? AND user_id = ?";
        $upd_val = [1, $frm_data['booking_id'], $_SESSION['uId']];
        $upd_res = update($upd_q, $upd_val, 'iii');

        $ins_q = "INSERT INTO rating_review(booking_id, room_id, user_id, rating, review)
             VALUES(?,?,?,?,?)";
        $ins_val = [$frm_data['booking_id'],$frm_data['room_id'],$_SESSION['uId'],$frm_data['rating'],$frm_data['review']];
        $ins_res = insert($ins_q, $ins_val, 'iiiis');




        echo $ins_res;

        
    }
    

?>