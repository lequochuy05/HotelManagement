<?php

    require('../inc/dbconfig.php');
    require('../inc/essentials.php');
    adminLogin();
    
    if(isset($_POST['add_room'])){
        $features = filteration(json_decode($_POST['features']));
        $facilities = filteration(json_decode($_POST['facilities']));
        
        $frm_data = filteration($_POST);
        $flag = 0;

        $sql1 = "INSERT INTO rooms(name, area, price, quantity, adult, children, description) VALUES(?,?,?,?,?,?,?)";
        $values = [$frm_data['name'],$frm_data['area'],$frm_data['price'],$frm_data['quantity'],$frm_data['adult'],$frm_data['children'],$frm_data['desc']];

        if(insert($sql1, $values, 'siiiiis')){
            $flag = 1;
        }

        $room_id = mysqli_insert_id($conn);
        // echo "Room ID: " . $room_id;

        $sql2 = "INSERT INTO room_facilities(room_id, facilities_id) VALUES(?,?)";
        if($stmt = mysqli_prepare($conn, $sql2)){
            foreach($facilities as $f){
                mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
                mysqli_stmt_execute($stmt);
                // if (!mysqli_stmt_execute($stmt)) {
                //     die('Error executing statement: ' . mysqli_stmt_error($stmt));
                // }
            }
            mysqli_stmt_close($stmt);
        }else{  
            $flag = 0;
            die('Query cannot be prepared - Insert');
        }

       

       
        $sql3 = "INSERT INTO room_features(room_id, features_id) VALUES(?,?)";
        if($stmt = mysqli_prepare($conn, $sql3)){
            foreach($features as $f){
                mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
                mysqli_stmt_execute($stmt);
                // if (!mysqli_stmt_execute($stmt)) {
                //     die('Error executing statement: ' . mysqli_stmt_error($stmt));
                // }

            }
            mysqli_stmt_close($stmt);   
        }else{
            $flag = 0;
            die('Query cannot be prepared - Insert');
        }

        if($flag){
            echo 1;
        }
        else{
            echo 0;
        }

        
        
    }

    if(isset($_POST['get_all_rooms'])){
        $sql = "SELECT * FROM rooms WHERE removed=?";
        $result = select($sql, [0], 'i');
        $i=1;

        $data = "";

        while($row = mysqli_fetch_assoc($result)){
            if($row['status'] == 1){
                $status = "<button onclick='toggle_status($row[id], 0)' class='btn btn-dark btn-sm shadow-none'>active</button>";
            }else{
                $status = "<button onclick='toggle_status($row[id], 1)' class='btn btn-warning btn-sm shadow-none'>inactive</button>";
            }
            $data.="
                <tr class='align-middle'>
                    <td>$i</td>
                    <td>$row[name]</td>
                    <td>$row[area] m&sup2</td>
                    <td>
                        <span class='badge rounded-pill bg-light text-dark'>
                            Adult : $row[adult]
                        </span> 
                        <br>
                        <span class='badge rounded-pill bg-light text-dark'>
                            Children : $row[children]
                        </span>
                    </td>
                    <td>$$row[price]</td>
                    <td>$row[quantity]</td>
                    <td>$status</td>
                    <td>
                        <button type='button' onclick='edit_details($row[id])' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-room'>
                            <i class='bi bi-pencil-square'></i>
                        </button>
                        <button type='button' onclick=\"room_images($row[id], '$row[name]')\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#room-images'>
                            <i class='bi bi-images'></i>
                        </button>
                        <button type='button' onclick='remove_room($row[id])' class='btn btn-danger shadow-none btn-sm'>
                            <i class='bi bi-trash'></i>
                        </button>
                    </td>
                </tr>
            ";
            $i++;
            
        }
        echo $data;
    }

    if(isset($_POST['get_room'])){
        $frm_data = filteration($_POST);
        
        $res1 = select("SELECT * FROM rooms WHERE id = ?", [$frm_data['get_room']], 'i');
        $res2 = select("SELECT * FROM room_features WHERE room_id = ?", [$frm_data['get_room']], 'i');
        $res3 = select("SELECT * FROM room_facilities WHERE room_id = ?", [$frm_data['get_room']], 'i');

        $roomdata = mysqli_fetch_assoc($res1);
        $features = [];
        $facilities = [];

        if(mysqli_num_rows($res2) > 0){
            while($row = mysqli_fetch_assoc($res2)){
                array_push($features, $row['features_id']);
            }
        }
        if(mysqli_num_rows($res3) > 0){
            while($row = mysqli_fetch_assoc($res3)){
                array_push($facilities, $row['facilities_id']);
            }
        }

        $data = ["roomdata" => $roomdata, "features" => $features, "facilities" => $facilities];
        $data = json_encode($data);
        
        echo $data;

    }

    if(isset($_POST['edit_room'])){
        $features = filteration(json_decode($_POST['features']));
        $facilities = filteration(json_decode($_POST['facilities']));
        
        $frm_data = filteration($_POST);
        $flag = 0;

        $sql = "UPDATE rooms SET name = ?, area =?, price=?, quantity=?, adult=?, children=?, description=? WHERE id=?";
        $values = [$frm_data['name'],$frm_data['area'],$frm_data['price'],
                    $frm_data['quantity'],$frm_data['adult'],$frm_data['children'],$frm_data['desc'], $frm_data['room_id']];

        if(update($sql, $values, 'siiiiisi')){
            $flag = 1;
        }

        $del_features = delete("DELETE FROM room_features WHERE room_id =?", [$frm_data['room_id']], 'i');
        $del_facilities = delete("DELETE FROM room_facilities WHERE room_id =?", [$frm_data['room_id']], 'i');

        if(!($del_features && $del_facilities)){
            $flag = 0;
        }

        $sql2 = "INSERT INTO room_facilities(room_id, facilities_id) VALUES(?,?)";
        if($stmt = mysqli_prepare($conn, $sql2)){
            foreach($facilities as $f){
                mysqli_stmt_bind_param($stmt, 'ii', $frm_data['room_id'], $f);
                mysqli_stmt_execute($stmt);
            }
            $flag = 1;
            mysqli_stmt_close($stmt);
        }else{  
            $flag = 0;
            die('Query cannot be prepared - Insert');
        }

        $sql3 = "INSERT INTO room_features(room_id, features_id) VALUES(?,?)";
        if($stmt = mysqli_prepare($conn, $sql3)){
            foreach($features as $f){
                mysqli_stmt_bind_param($stmt, 'ii', $frm_data['room_id'], $f);
                mysqli_stmt_execute($stmt);
            }
            $flag = 1;
            mysqli_stmt_close($stmt);
        }else{  
            $flag = 0;
            die('Query cannot be prepared - Insert');
        }

        
        if($flag){
            echo 1;
        }
        else{
            echo 0;
        }
       
    }

    if(isset($_POST['toggle_status'])){
        $frm_data = filteration($_POST);

        $sql = "UPDATE rooms SET status=? WHERE id = ?";
        $values = [$frm_data['value'], $frm_data['toggle_status']];
        
        if(update($sql, $values, 'ii')){
            echo 1;
        }else{
            echo 0;
        }
    }

    if(isset($_POST['add_image'])){

        $frm_data = filteration($_POST);   

        $img_r = uploadImage($_FILES['image'], ROOMS_FOLDER);

        if($img_r == 'inv_img'){
            echo $img_r;
        } else if($img_r == 'inv_size'){
            echo $img_r;
        }else if($img_r == 'upd_failed'){
            echo $img_r;
        }else{
            $sql = "INSERT INTO room_images(`room_id`, `image`) VALUES(?,?)"; 
            $values = [$frm_data['room_id'], $img_r];
            $res = insert($sql,$values,'is');
            echo $res;
        }
       
    }

    if(isset($_POST['get_room_images'])){

        $frm_data = filteration($_POST);   
        $res = select("SELECT * FROM room_images WHERE room_id=?",[$frm_data['get_room_images']], 'i');

        $path = ROOMS_IMG_PATH;

        while($row = mysqli_fetch_assoc($res)){

            if($row['thumb']==1){
                $thumb_btn = "<i class='bi bi-check-lg text-light bg-success px-2 py-1 rounded fs-5'></i>";
           
            }else{
                $thumb_btn = "
                    <button onclick='thumb_image($row[no],$row[room_id])' class='btn btn-secondary shadow-none'>
                        <i class='bi bi-check2'></i>    
                    </button>
                            ";
            }


            echo<<<data
                <tr class='align-middle'>
                    <td><img src='$path$row[image]' class='img-fluid'></td>
                    <td>$thumb_btn</td>
                    <td>
                        <button onclick='rem_image($row[no],$row[room_id])' class='btn btn-danger shadow-none'>
                            <i class='bi bi-trash'></i>    
                        </button>
                    </td>
                </tr>
            data;
        }
       
    }

    if(isset($_POST['rem_image'])){
        $frm_data = filteration($_POST);
        $values = [$frm_data['image_id'],$frm_data['room_id']];

        $pre_q = "SELECT * FROM room_images WHERE no = ? AND room_id= ?";
        $res = select($pre_q, $values, 'ii');
        $img = mysqli_fetch_assoc($res);

        if(deleteImage($img['image'], ROOMS_FOLDER)){
            $sql = "DELETE FROM room_images WHERE no=? AND room_id = ?";
            $res = delete($sql, $values, 'ii');
            echo $res;
        }else{
        echo 0;
        }

    }

    if(isset($_POST['thumb_image'])){
        $frm_data = filteration($_POST);
        $values = [$frm_data['image_id'],$frm_data['room_id']];

        $pre_q = "UPDATE room_images SET thumb =? WHERE room_id=?";
        $pre_v = [0, $frm_data['room_id']];
        $pre_res = update($pre_q, $pre_v, 'ii');
        
        $q = "UPDATE room_images SET thumb =? WHERE no=? AND room_id=?";
        $v = [1, $frm_data['image_id'],$frm_data['room_id']];
        $res = update($q, $v, 'iii');
        
        echo $res;

    }

    if(isset($_POST['remove_room'])){
        $frm_data = filteration($_POST);
       
        $sql1 = "SELECT * FROM room_images WHERE room_id=?";
        $res1 = select($sql1, [$frm_data['room_id']], 'i');
        while($row = mysqli_fetch_assoc($res1)){
            deleteImage($row['image'], ROOMS_FOLDER);
        }
        
        $sql2 = "DELETE FROM room_images WHERE room_id=?";
        $res2 = delete($sql2, [$frm_data['room_id']], 'i');

        $sql3 = "DELETE FROM room_features WHERE room_id=?";
        $res3 = delete($sql3, [$frm_data['room_id']], 'i');

        $sql4 = "DELETE FROM room_facilities WHERE room_id=?";
        $res4 = delete($sql4, [$frm_data['room_id']], 'i');

        $sql5 = "UPDATE rooms SET removed=? WHERE id=?";
        $res5 = update($sql5, [1, $frm_data['room_id']], 'ii');

        if($res2 || $res3 || $res4 || $res5){
            echo 1;
        }else{
            echo 0;
        }
    }

?>