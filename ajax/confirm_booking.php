<?php
    session_start();
    require('../Admin/inc/dbconfig.php');
    require('../Admin/inc/essentials.php');
    
    
    date_default_timezone_set("Asia/Ho_Chi_Minh");

    if(isset($_POST['check_availability'])){
        $frm_data = filteration($_POST);
        $status = "";
        $res = "";

        

        //Check in and out validations

        $today_date = new DateTime(date("Y-m-d"));
        $checkin_date = new DateTime($frm_data['check_in']);
        $checkout_date = new DateTime($frm_data['check_out']);
    
        if($checkin_date == $checkout_date)
        {
            $status = 'check_in_out_equal';
            $res = json_encode(["status"=>$status]);
        }else if($checkout_date < $checkin_date)
        {
            $status = 'check_out_earlier';
            $res = json_encode(["status"=>$status]);
        }else if($checkin_date < $today_date)
        { 
            $status = 'check_in_earlier';
            $res = json_encode(["status"=>$status]);
        }

        if($status!=''){
            echo $res;
            exit;
        }

        // Check room availability

        $room_id = $_SESSION['room']['id'];
        $check_in = $frm_data['check_in'];
        $check_out = $frm_data['check_out'];

        $query = "SELECT * FROM booking_order WHERE room_id = ? AND booking_status != 'cancelled'
            AND ((check_in BETWEEN ? AND ?) 
            OR (check_out BETWEEN ? AND ?)
            OR (? BETWEEN check_in AND check_out)
            OR (? BETWEEN check_in AND check_out))";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("issssss", $room_id, $check_in, $check_out, $check_in, $check_out, $check_in, $check_out);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            echo json_encode(['status' => 'unavailable']);
            exit; 
        }

        //run query to check room is available or not
        $count_days = date_diff($checkin_date,$checkout_date)->days;
        $payment =  $_SESSION['room']['price'] * $count_days;

        $_SESSION['room']['payment'] = $payment;
        $_SESSION['room']['available'] = true;
        
        $res = json_encode(["status"=>'available', "days"=>$count_days, "payment"=>$payment]);
        echo $res;
        
    }
    

?>