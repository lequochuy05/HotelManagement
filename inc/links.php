    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">   
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:ital,wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"  integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <?php
        

        session_start();

        date_default_timezone_set("Asia/Ho_Chi_Minh");

        require('Admin/inc/dbconfig.php');
        require('Admin/inc/essentials.php');
        
        $contact_sql = "SELECT * FROM contact_details WHERE no = ?";
        $settings_sql = "SELECT * FROM settings WHERE no = ?";
        $values = [1];
        $contact_result = mysqli_fetch_assoc(select($contact_sql, $values, 'i'));
        $settings_result = mysqli_fetch_assoc(select($settings_sql, $values, 'i'));

        if($settings_result['shutdown']){
            echo<<<alertbar
                <div class='bg-danger text-center p-2 fw-bold'>
                    <i class='bi bi-exclamation-triangle-fill'></i>
                    Bookings are temporarily closed!
                </div>
            alertbar;
        }
        
    ?>
