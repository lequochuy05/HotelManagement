<?php

    require('../inc/dbconfig.php');
    require('../inc/essentials.php');
    adminLogin();
        // feature
    if(isset($_POST['add_feature'])){
        $frm_data = filteration($_POST);

        $sql = "INSERT INTO features(name) VALUES(?)";
        $values = [$frm_data['name']];
        $result = insert($sql, $values, 's');

        echo $result;
     
    }
  
    if(isset($_POST['get_features'])){
        $result = selectAll('features');
        $i = 1; 

        while($row = mysqli_fetch_assoc($result)) {
            echo <<<data
                <tr>
                    <td>$i</td>
                    <td>$row[name]</td>
                    <td>
                        <button type="button" onclick="rem_feature($row[id])" class="btn btn-sm rounded-pill btn-danger mt-2">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </td>        
                </tr>
            data;
            $i++;
        }
    }

    if(isset($_POST['rem_feature'])){
        $frm_data = filteration($_POST);
        $values =  [$frm_data['rem_feature']];
       
        $check_q = select('SELECT * FROM room_features WHERE features_id = ?', [$frm_data[' ']], 'i');
        if(mysqli_num_rows($check_q)==0){
            $sql = "DELETE FROM features WHERE id =?";
            $result = delete($sql, $values, 'i');
            echo $result; 
        }else{
            echo "room_added";
        }
    
    }

    // facility
    if(isset($_POST['add_facility'])){
        $frm_data = filteration($_POST);

        $img_r = uploadSVGImage($_FILES['icon'],FACILITIES_FOLDER);
        if($img_r == 'inv_img'){
            echo $img_r;
        }else if($img_r == 'inv_size'){
            echo $img_r;
        }else if($img_r == 'upd_failed'){
            echo $img_r;
        }else{
            $sql = "INSERT INTO facilities(icon, name, description) VALUES(?,?,?)";
            $values = [$img_r,$frm_data['name'],$frm_data['desc']];
            $result = insert($sql, $values, 'sss');
            echo $result;
        }
    }

    if(isset($_POST['get_facilities'])){
        $result = selectAll('facilities');
        $i = 1; 
        $path = FACILITIES_IMG_PATH ;

        while($row = mysqli_fetch_assoc($result)) {
            echo <<<data
                <tr class="align-middle">
                    <td>$i</td>
                    <td><img src="$path$row[icon]" width="30px"></td>
                    <td>$row[name]</td>
                    <td>$row[description]</td>
                    <td>
                        <button type="button" onclick="rem_facility($row[id])" class="btn btn-sm rounded-pill btn-danger mt-2">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </td>        
                </tr>
            data;
            $i++;
        }
    }
  
    if(isset($_POST['rem_facility'])){
        $frm_data = filteration($_POST);
        $values =  [$frm_data['rem_facility']];

        $check_q = select('SELECT * FROM room_facilities WHERE facilities_id = ?', [$frm_data['rem_facility']], 'i');

        if(mysqli_num_rows($check_q)==0){
            $pre_q = "SELECT * FROM facilities WHERE id = ?";
            $result = select($pre_q, $values, 'i');
            $img = mysqli_fetch_assoc($result);
            
            if(deleteImage($img['icon'], FACILITIES_FOLDER)){
                $sql = "DELETE FROM facilities WHERE id =?";
                $result = delete($sql, $values, 'i');
                echo $result;  
            }else{
                echo 0;
            }
        }else{
            echo "room_added";
        }

       
  
    }
?>