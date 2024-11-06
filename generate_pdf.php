<?php
    require("Admin/inc/essentials.php");
    require("Admin/inc/dbconfig.php");
    require("Admin/inc/mpdf/vendor/autoload.php");

    // if(!(isset($_SESSION['login']) && $_SESSION['login'] == true))
    // {
    //     redirect('index.php');
    // }

    if(isset($_GET['gen_pdf']) && isset($_GET['id']))
    {
        $frm_data = filteration($_GET);

        $q = "SELECT bo.*, bd.*,uc.* FROM booking_order bo
            INNER JOIN booking_details bd ON bo.booking_id = bd.booking_id 
            INNER JOIN taikhoanuser uc ON uc.id = bo.user_id 
            WHERE ((bo.booking_status = 'booked' AND bo.arrival = 1)
            OR (bo.booking_status = 'cancelled' AND bo.refund = 1))
            AND bo.booking_id = '$frm_data[id]'";
        $res = mysqli_query($conn, $q);
        $total_rows = mysqli_num_rows($res);


        if($total_rows==0){
            header('location: index.php');
            exit;
        }
        $data = mysqli_fetch_assoc($res);
        $date = date("h:ia | d-m-Y", strtotime($data['datentime']));
        $checkin = date("d-m-Y", strtotime($data['check_in']));
        $checkout = date("d-m-Y", strtotime($data['check_out']));

        $table_data = "
             <style>
                body { font-family: Arial, sans-serif; }
                h2 { text-align: center; color: #4CAF50; }
                table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
                th { background-color: #f2f2f2; font-weight: bold; }
                td { font-size: 14px; }
                .center { text-align: center; }
                .signature {
                    font-size: 16px;
                    font-style: italic;
                    font-weight: bold;
                    color: #555;
                    position: absolute;
                    bottom: 500px;
                    right: 20px;
                    text-align: right;
                    border-top: 1px solid #555;
                    padding-top: 5px;
                    width: 120px;
                }
            </style>


            <h1>BOOKING RECEIPT</h1>
            <table>
            <tr>
                <td><strong>Order ID:</strong> $data[order_id]</td>
                <td><strong>Booking Date:</strong> $date</td>
            </tr>
            <tr>
                <td colspan='2'><strong>Status:</strong> $data[booking_status]</td>
            </tr>
            <tr>
                <td><strong>Name:</strong> $data[user_name]</td>
                <td><strong>Email:</strong> $data[email]</td>
            </tr>
            <tr>
                <td><strong>Phone Number:</strong> $data[phonenum]</td>
                <td><strong>Address:</strong> $data[address]</td>
            </tr>
            <tr>
                <td><strong>Room Name:</strong> $data[room_name]</td>
                <td><strong>Cost:</strong> $$data[price]</td>
            </tr>
            <tr>
                <td><strong>Check-in:</strong> $checkin</td>
                <td><strong>Check-out:</strong> $checkout</td>
            </tr>";

    if($data['booking_status'] == 'cancelled') {
        $refund = ($data['refund']) ? "Amount Refunded" : "Not Yet Refunded";
        $table_data .= "
            <tr>
                <td><strong>Amount Paid:</strong> $$data[total_pay]</td>
                <td><strong>Refund:</strong> $refund</td>
            </tr>";
    } else {
        $table_data .= "
            <tr>
                <td><strong>Room Number:</strong> $data[room_no]</td>
                <td><strong>Amount Paid:</strong> $$data[total_pay]</td>
            </tr>";
    }


    $table_data .= "
        <div class='signature'>
            ONIX <br>(Confirmed)
        </div>
    ";
  $table_data .= "</table>";


        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($table_data);

        $mpdf->Output($data['order_id'].'.pdf','D');

        echo $table_data;

    }
    else{
        header('location: index.php');
            
    }

?>