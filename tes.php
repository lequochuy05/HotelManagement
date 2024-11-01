                <!-- Manage room images modal -->
                <div class="modal fade" id="room-images" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="add_image_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Room Name</h5>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="image-alert"></div>
                        <div class="border-bottom border-3 pb-3 mb-3">
                            <form id="add_image_form">
                                <label class="form-label fw-bold">Add Image</label>
                                <input type="file" name="image" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none mb-3" required>
                                <button type="submit" class="btn custom-bg text-white shadow-none">Add</button>
                                <input type="hidden" name="room_id">
                            </form>
                        </div>

                        <div class="table-responsive-lg" style="height: 350px; overflow-y:scroll;">
                            <table class="table table-hover border text-center">
                                <thead>
                                    <tr class="bg-dark text-light sticky-top">
                                    <th scope="col" width="60%">Image</th>
                                    <th scope="col">Thumb</th>
                                    <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="room-image-data">
                                   
                                </tbody>
                            </table>
                        </div>

                    </div>
                   
                </div>
            </form>
        </div>
    </div>
let add_image_form = document.getElementById('add_image_form');
        add_image_form.addEventListener('submit', function(e){
            e.preventDefault();
            add_image();
        });

        function add_image(){
            let data = new FormData();
            data.append('image',add_image_form.elements['image'].file[0]);
            data.append('room_id',add_image_form.elements['room_id'].value);
            data.append('add_image', '');

            let xhr = new XMLHttpRequest();
            xhr.open("POST","ajax/rooms.php", true);

            xhr.onload = function(){
                if(this.responseText == 'inv_img'){
                    alert('error','Only JPG, WEBP, or PNG images are allowed!');
                }else if(this.responseText == 'inv_size'){
                    alert('error','Image should be less than 2MB!');
                }else if(this.responseText == 'upd_failed'){
                    alert('error','Image upload failed. Server Down');
                }else{
                    alert('success', 'New image added!','image-alert');
                    add_image_form.reset();
                    
                }   

                xhr.send(data);

            }
        }

        if(isset($_POST['add_image'])){

$frm_data = filteration($_POST);   

$img_r = uploadImage($_FILES['image'], ABOUT_FOLDER);

if($img_r == 'inv_img'){
    echo $img_r;
} else if($img_r == 'inv_size'){
    echo $img_r;
}else if($img_r == 'upd_failed'){
    echo $img_r;
}else{
    $sql = "INSERT INTO room_images(room_id, image) VALUES(?,?)"; 
    $values = [$frm_data['room_id'], $img_r];
    $res = insert($sql,$values,'is');
    echo $res;
}

}

<?php
        
        define('SITE_URL', 'http://localhost/HotelManagement/');
        define('ABOUT_IMG_PATH',SITE_URL.'images/about/');
        // define('CAROUSEL_IMG_PATH', SITE_URL.'images/carousel');
        // define('FEATURES_IMG_PATH', SITE_URL.'images/features/');
        define('FACILITIES_IMG_PATH', SITE_URL.'images/facilities/');
        define('ROOMS_IMG_PATH', SITE_URL.'images/rooms/');

        define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'].'/HotelManagement/images/');
        define('ABOUT_FOLDER','about/');
        // define('CAROUSEL_FOLDER','carousel/');
        // define('FEATURES_FOLDER','features/');
        define('FACILITIES_FOLDER','facilities/');
        define('ROOMS_FOLDER','rooms/');


    function adminLogin(){
        session_start();
        if(!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)){
            echo "
                <script>window.location.href = 'login.php';
                </script>";
            exit;
        }
    }

    function redirect($url){
        echo "
        <script>window.location.href = '$url';
        </script>";
        exit;
    }

    function alert($type, $msg){
        $bs_class = ($type == "success") ? "alert-success" : "alert-danger";
        echo <<<alert
            <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
            <strong class="me-3">$msg</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        alert;
    }

    function uploadImage($image, $folder){
        $valid_mime = ['image/jpeg','image/png','image/webp'];
        $img_mime = $image['type'];

        if(!in_array($img_mime, $valid_mime)){
            return 'inv_img';
        } else if(($image['size'] / (1024 * 1024)) > 2){
            return 'inv_size';
        }else{
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            $rname = 'IMG_'.random_int(11111, 99999).".$ext";

            $img_path = UPLOAD_IMAGE_PATH.$folder.$rname; 
            if(move_uploaded_file($image['tmp_name'],$img_path)){
                return $rname;
            }else{
                return 'upd_failed';
            }
        }
        
    }

    function deleteImage($image, $folder){
        if(unlink(UPLOAD_IMAGE_PATH.$folder.$image)){
            return true;
        }else{
            return false;
        }
    }

    function uploadSVGImage($image, $folder){
        $valid_mime = ['image/svg+xml'];
        $img_mime = $image['type'];

        if(!in_array($img_mime, $valid_mime)){
            return 'inv_img';
        } else if(($image['size'] / (1024 * 1024)) > 1){
            return 'inv_size'; //invalid size greater than 1MB
        }else{
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            $rname = 'IMG_'.random_int(11111, 99999).".$ext";

            $img_path = UPLOAD_IMAGE_PATH.$folder.$rname; 
            if(move_uploaded_file($image['tmp_name'],$img_path)){
                return $rname;
            }else{
                return 'upd_failed';
            }
        }
        
    }
    ?>