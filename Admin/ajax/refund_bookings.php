<?php

    require('../inc/dbconfig.php');
    require('../inc/essentials.php');
    adminLogin();
    

    if(isset($_POST['get_bookings']))
    {
        $frm_data = filteration($_POST);

        $q = "SELECT bo.*, bd.* FROM booking_order bo
                INNER JOIN booking_details bd ON bo.booking_id = bd.booking_id
                WHERE (bo.order_id LIKE ? OR bd.phonenum LIKE ? OR bd.user_name LIKE ?)
                AND (bo.booking_status = ? AND bo.refund = ?) ORDER BY bo.booking_id ASC";
        $res = select($q, ["%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%", "cancelled", 0], "sssss");

        $i=1;
        $table_data = "";
        
        if(mysqli_num_rows($res)==0){
            echo "<b>No Data Found</b>";
            exit;
        }

        while($data = mysqli_fetch_assoc($res)){
            $date = date("d-m-Y H:i:s", strtotime($data['datentime']));
            $checkin = date("d-m-Y", strtotime($data['check_in']));
            $checkout = date("d-m-Y", strtotime($data['check_out']));

            $table_data .="
                <tr>
                    <td>$i</td>
                    <td>
                        <span class='badge bg-primary'>
                            Oder ID: $data[order_id]
                        </span>
                        <br>
                        <b>Name:</b> $data[user_name]
                        <br>
                        <b>Phone:</b> $data[phonenum]
                    </td>
                    <td>
                        <b>Room:</b> $data[room_name]
                        <br>
                        <b>Check in:</b> $checkin
                        <br>
                        <b>Check out:</b> $checkout
                        <br>
                        <b>Date:</b> $date
                    </td>
                    <td>
                        <b>$$data[price]</b>
                    </td>
                    <td>
                        <button type='button' onclick='refund_booking($data[booking_id])' class='btn btn-success fw-bold shadow-none'>
                            <i class='bi bi-cash-stack'></i> Refund
                        </button>
                    </td>
                </tr>
            ";
            $i++;
        }


        echo $table_data;
    }

    if(isset($_POST['refund_booking']))
    {
        $frm_data = filteration($_POST);

         $q = "UPDATE booking_order SET refund=? WHERE booking_id=?";
         $val = [1, $frm_data['booking_id']];
         $res = update($q, $val, 'ii');

         echo $res;

    }
  


   

?>