<?php
   
    require('../Admin/inc/dbconfig.php');
    require('../Admin/inc/essentials.php');
    session_start();
    date_default_timezone_set("Asia/Ho_Chi_Minh");

    if(isset($_GET['fetch_rooms'])){

        //Check availability data decode
        $chk_avail = json_decode($_GET['chk_avail'],true);

        if($chk_avail['checkin']!='' && $chk_avail['checkout']!=''){
            $today_date = new DateTime(date("Y-m-d"));
            $checkin_date = new DateTime($chk_avail['checkin']);
            $checkout_date = new DateTime($chk_avail['checkout']);
        
            if($checkin_date == $checkout_date)
            {
                echo "<h3 class='text-center text-danger'>INVALID DATES</h3>";
                exit;
            }else if($checkout_date < $checkin_date)
            {
                echo "<h3 class='text-center text-danger'>INVALID DATES</h3>";
                exit;
                
            }else if($checkin_date < $today_date)
            { 
                echo "<h3 class='text-center text-danger'>INVALID DATES</h3>";
                exit;
            }
        }

        //Guests data decode
        $guests = json_decode($_GET['guests'], true);
        
        $adults = ($guests['adults'] != '') ? $guests['adults'] : 0;
        $children = ($guests['children']!= '') ? $guests['children'] : 0;

        //Facilities data decode
       
        $facility_list = json_decode($_GET['facility_list'], true);



        //count no. of rooms and output variable to store room cards
        $count_rooms = 0;
        $output = "";

        // fetching setting table to check website is shutdown or not?
        $settings_sql = "SELECT * FROM settings WHERE no = '1'";
        $settings_result = mysqli_fetch_assoc(mysqli_query($conn,$settings_sql));

        // query for room cards
        $sql = "SELECT * FROM rooms WHERE adult >= ? AND children >= ? AND  status=? AND removed = ?";
        $room_res = select($sql, [$adults,$children,1,0],'iiii');

        
        while ($room_data = mysqli_fetch_assoc($room_res)) {
            $is_available = true; // Đặt cờ để theo dõi trạng thái khả dụng của phòng
            
            if ($chk_avail['checkin'] != '' && $chk_avail['checkout'] != '') {
                $room_id = $room_data['id'];
                $check_in = $chk_avail['checkin'];
                $check_out = $chk_avail['checkout'];
        
                $query = "SELECT * FROM booking_order WHERE room_id = ? AND booking_status != 'cancelled'
                    AND ((check_in BETWEEN ? AND ?) 
                    OR (check_out BETWEEN ? AND ?)
                    OR (? BETWEEN check_in AND check_out)
                    OR (? BETWEEN check_in AND check_out))";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("issssss", $room_id, $check_in, $check_out, $check_in, $check_out, $check_in, $check_out);
                $stmt->execute();
                $result = $stmt->get_result();
        
                if ($result->num_rows > 0) {
                    $is_available = false; // Đặt cờ nếu phòng không khả dụng
                }
            }
        
            // Chỉ tạo thẻ hiển thị phòng nếu phòng khả dụng
            if ($is_available) {


                 #get facilities of room
                $fac_count = 0;

                 $sql_fac = "SELECT f.name, f.id FROM facilities f 
                            INNER JOIN room_facilities rfac ON f.id = rfac.facilities_id
                            WHERE rfac.room_id = '$room_data[id]'";
                $fac_q = mysqli_query($conn, $sql_fac);
                $facilities_data = "";
                while ($fac_row = mysqli_fetch_assoc($fac_q)) {

                    if(in_array($fac_row['id'], $facility_list['facilities'])){
                        $fac_count++;
                    }
                    $facilities_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>$fac_row[name]</span>";
                }

                if(count($facility_list['facilities']) != $fac_count){
                    continue;
                }

                #get features of room
                $sql_fea = "SELECT f.name FROM features f 
                            INNER JOIN room_features rfea ON f.id = rfea.features_id
                            WHERE rfea.room_id = '$room_data[id]'";
                $fea_q = mysqli_query($conn, $sql_fea);
                $features_data = "";
                while ($fea_row = mysqli_fetch_assoc($fea_q)) {
                    $features_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>$fea_row[name]</span>";
                }
                
               
        
                #get room thumbnail of room
                $room_thumb = ROOMS_IMG_PATH . "thumbnail.jpg";
                $sql_thumb = "SELECT * FROM room_images 
                                WHERE room_id = '$room_data[id]' 
                                AND thumb = '1'";
                $thumb_q = mysqli_query($conn, $sql_thumb);
                if (mysqli_num_rows($thumb_q) > 0) {
                    $thumb_res = mysqli_fetch_assoc($thumb_q);
                    $room_thumb = ROOMS_IMG_PATH . $thumb_res['image'];
                }
        
                $book_btn = "";
                if (!$settings_result['shutdown']) {
                    $login = 0;
                    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                        $login = 1;
                    }
                    $book_btn = "<button onclick='checkLoginToBook($login, $room_data[id])' class='btn btn-sm w-100 text-white custom-bg shadow-none mb-2'>Book Now</button>";
                }
        
                #print room cards
                $output .= "
                    <div class='card mb-4 border-0 shadow'>
                        <div class='row g-0 p-3 align-items-center'>
                            <div class='col-md-5 mb-lg-0 mb-md-0 mb-3'>
                                <img src='$room_thumb' class='img-fluid rounded'>
                            </div>
                            <div class='col-md-5 px-lg-3 px-md-3 px-0'>
                                <h5 class='mb-3'>$room_data[name]</h5>
                                <div class='features mb-3'>
                                    <h6 class='mb-1'>Features</h6>
                                    $features_data
                                </div>
                                <div class='facilities mb-3'>
                                    <h6 class='mb1-'>Facilities</h6>
                                    $facilities_data
                                </div>
                                <div class='guests'>
                                    <h6 class='mb-1'>Guests</h6>
                                    <span class='badge rounded-pill bg-light text-dark text-wrap lh-base'>$room_data[adult] Adults</span>
                                    <span class='badge rounded-pill bg-light text-dark text-wrap lh-base'>$room_data[children] Children</span>
                                </div>
                            </div>
                            <div class='col-md-2 mt-lg-0 mt-md-0 mt-4 text-center'>
                                <h4 class='mb-4'>$$room_data[price]</h4>
                                $book_btn
                                <a href='room_details.php?id=$room_data[id]' class='btn btn-sm w-100 btn-outline-dark shadow-none'>Details</a>
                            </div>
                        </div>
                    </div>
                ";
                $count_rooms++;
            }
        }
        
        if ($count_rooms > 0) {
            echo $output;
        } else {
            echo "<h3 class='text-center text-danger'>No rooms to show</h3>";
        }
        



    }


?>