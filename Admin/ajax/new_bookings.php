<?php

    require('../inc/dbconfig.php');
    require('../inc/essentials.php');
    adminLogin();
    

    if(isset($_POST['get_bookings']))
    {
        $q = "SELECT bo.*, bd.* FROM booking_order bo
                INNER JOIN booking_details bd ON bo.booking_id = bd.booking_id
                WHERE bo.booking_status = 'booked' AND bo.arrival = 0 ORDER BY bo.booking_id ASC";
        $res = mysqli_query($conn, $q);
        $i=1;
        $table_data = "";

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
                        <b>Price:</b> $$data[price]
                    </td>
                    <td>
                        <b>Check in:</b> $checkin
                        <br>
                        <b>Check out:</b> $checkout
                        <br>
                        <b>Date:</b> $date
                    </td>
                    <td>
                        <button type='button' onclick='assign_room($data[booking_id])' class='btn text-white btn-sm fw-bold custom-bg shadow-none' data-bs-toggle='modal' data-bs-target='#assign-room'>
                            <i class='bi bi-check2-square'></i> Assign room
                        </button>
                        <br>
                        <button type='button' onclick='cancel_booking($data[booking_id])' class='mt-2 btn btn-outline-danger fw-bold shadow-none'>
                            <i class='bi bi-trash'></i> Cancel booking
                        </button>
                    </td>
                </tr>
            ";
            $i++;
        }


        echo $table_data;
    }

    if(isset($_POST['assign_room']))
    {
        $frm_data = filteration($_POST);

        $q = "UPDATE booking_order bo INNER JOIN booking_details bd
                ON bo.booking_id = bd.booking_id
                SET bo.arrival = ?, bd.room_no=?
                WHERE bo.booking_id=?";
        $values = [1, $frm_data['room_no'], $frm_data['booking_id']];
        $res = update($q, $values, 'isi');
 
        echo ($res == 2) ? 1 : 0;   //It will update 2 rows so it will return 2
    }

    if(isset($_POST['cancel_booking']))
    {
        $frm_data = filteration($_POST);
         $q = "UPDATE booking_order SET booking_status = ?, refund=? WHERE booking_id=?";
         $val = ['canceled',0, $frm_data['booking_id']];
         $res = update($q, $val, 'sii');

         echo $res;

    }
  

 
    // if(isset($_POST['remove_user'])){
    //     $frm_data = filteration($_POST);
       
    //     $sql = "DELETE FROM taikhoanuser WHERE id=? AND is_verified=?";
    //     $res = delete($sql, [$frm_data['user_id'],0], 'ii');

    //     if($res){
    //         echo 1;
    //     }else{
    //         echo 0;
    //     }
    // }


    // if(isset($_POST['search_user'])){
    //     $frm_data = filteration($_POST);
    //     $q = "SELECT * FROM taikhoanuser WHERE name LIKE ?";
    //     $res = select($q, ["%$frm_data[name]%"], 's');
        
    //     $i=1;
    //     $path = USERS_IMG_PATH;

    //     $data = "";

    //     while($row = mysqli_fetch_assoc($res)){
    //         $del_btn =  "<button type='button' onclick='remove_user($row[id])' class='btn btn-danger shadow-none btn-sm'>
    //                         <i class='bi bi-trash'></i>
    //                     </button>";
    //         $verified ="<span class='badge bg-warning'><i class='bi bi-x-lg'></i></span>";

    //         if($row['is_verified']){
    //             $verified = "<span class='badge bg-success'><i class='bi bi-check-lg'></i></span>";
    //             $del_btn ="";
    //         }

    //         $status = "<button onclick='toggle_status($row[id], 0)' class='btn btn-dark btn-sm shadow-none'>active</button>";
    //         if(!$row['status']){
    //             $status = "<button onclick='toggle_status($row[id], 1)' class='btn btn-danger btn-sm shadow-none'>inactive</button>";
    //         }
    //         $date = date("d-m-Y",strtotime($row['datentime']));
            
    //         $data.="
    //             <tr class='align-middle'>
    //                 <td>$i</td>
    //                 <td>
    //                     <img src='$path$row[profile]' width='55px'> <br>
    //                     $row[name]
    //                 </td>
    //                 <td>$row[email]</td>
    //                 <td>$row[phonenum]</td>
    //                 <td>$row[address]   |   $row[pincode]</td> 
    //                 <td>$row[dob]</td>
    //                 <td>$verified</td>
    //                 <td>$status</td>
    //                 <td>$date</td>
    //                 <td>$del_btn</td>

    //             </tr>
    //         ";
    //         $i++;
            
    //     }
    //     echo $data;
    // }

?>