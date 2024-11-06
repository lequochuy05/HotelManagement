<?php
    session_start();
    require('../Admin/inc/dbconfig.php');
    require('../Admin/inc/essentials.php');

    date_default_timezone_set("Asia/Ho_Chi_Minh");


    if(!(isset($_SESSION['login']) && $_SESSION['login'] == true))
        {
            redirect('index.php');
        }

    if(isset($_POST['cancel_booking']))
    {
        $frm_data = filteration($_POST);

        $q = "UPDATE booking_order SET booking_status = ?, refund= ?
                WHERE booking_id= ? AND user_id = ?";
                
        $values = ['cancelled', 0, $frm_data['id'], $_SESSION['uId']];

        $res = update($q, $values, 'siii');

        echo $res;

        
    }
    

?>