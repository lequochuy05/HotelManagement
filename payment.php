<?php
    require("inc/links.php"); 
  

    if(!(isset($_SESSION['login']) || $_SESSION['login'] == true)){
        redirect('index.php');
    }

    function generateOrderCode($length = 6) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code.=$characters[rand(0, strlen($characters) - 1)];
        }
        return $code;
         
    } 
    $orderCode = generateOrderCode();

    $data = filteration($_GET);

    $payment = (double) $_SESSION['room']['payment'] ?? 0;

    // var_dump($_SESSION);

     $user_id = $_SESSION['uId'] ?? null;
     $email_from_session = $data['email'] ?? null;
 
     if (!$user_id && $email_from_session) {
         $query = "SELECT id FROM taikhoanuser WHERE email = ?";
         $stmt = $conn->prepare($query);
         $stmt->bind_param("s", $email_from_session);
         $stmt->execute();
         $result = $stmt->get_result();
 
         if ($result->num_rows > 0) {
             $user = $result->fetch_assoc();
             $user_id = $user['id'];
             $_SESSION['user_id'] = $user_id;
         } else {
            
             die("Error: User ID not found.");
         }
     }
    // print_r($user_id);
    if (!$user_id) {
        die("Error: User ID not found.");
    }
    $user_name = $_SESSION['uName'];
    $room_price = (double)$_SESSION['room']['price'];
    $name = $_SESSION['room']['name'];

    $tax_rate = 0.05;
    $tax_amount = $payment * $tax_rate;
    $total_amount = $payment + $tax_amount;

    if(isset($_POST['pay_now'])){
        $frm_data = filteration($_POST);
   
        $q1 = "INSERT INTO booking_order(user_id, room_id, check_in, check_out, order_id) VALUES(?,?,?,?,? )";
        insert($q1, [$user_id, $_SESSION['room']['id'], $frm_data['checkin'], $frm_data['checkout'], $orderCode], 'issss');

        $booking_id = mysqli_insert_id($conn);
        $q2 = "INSERT INTO booking_details(booking_id, room_name, price, total_pay, user_name, phonenum, address) VALUES(?,?,?,?,?,?,?)";
        insert($q2, [$booking_id, $_SESSION['room']['name'],$room_price, $total_amount, $user_name, $frm_data['phonenum'], $frm_data['address']], 'isddsss');
        
    }
    //print_r($user_name);


 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title><?php echo $settings_result['site_title'] ?> - Payment</title>
</head>
<body>
<div class="row">
    <div class="row my-5 px-2">
        <div class="col-md-8 mx-auto">
            <div class="row">
                <div class="col-md-8">
                    <h1> Booking</h1>
                    <span class="text-muted">Order code #<?php echo $orderCode;?></span>
                    <div id="success_pay_box" class="p-2 text-center pt-3 border border-2 mt-5" style="display:none">
                        <h2 class="text-success pt-3"> Payment successful</h2>
                        <p class="text-center text-success pb-1">We have received payment!</p>
                    </div>
                    
                    <div class="row mt-5 px-2" id="checkout_box">
                        <div class="col-12 text-center my-2 border"><p class="mt-3">Instructions for payment via bank transfer</p></div>
                        <div class="col-md-6 border text-center p-2">
                            <p class="fw-bold">Method 1: Open the banking app and scan the QR code</p>
                            <div class="my-2">
                                <img src='https://qr.sepay.vn/img?acc=285902788&template=compact&bank=MBBank' class="img-fluid">
                                <div class="text-center"><a class="btn btn-outline-primary btn-sm" href="https://qr.sepay.vn/img?bank=MBBank&acc=285902788&template=compact&download=true"><i class="bi bi-download"></i> Download QR</a></div>
                                    <span>Status: Pending payment... 
                                        <div class="spinner-border" role="status">
                                            <span class="sr-only"></span>
                                        </div>
                                    </span>
                            </div>
                        </div>
                    <div class="col-md-6 border p-2">
                        <p class="fw-bold text-center">Method 2: Manual transfer according to information</p>
                        <div class="text-center"><img src="https://qr.sepay.vn/assets/img/banklogo/MB.png" class="img-fluid" style="max-height:50px">
                        <p class="fw-bold">Ngân hàng MBBank</p></div>
                        
                        <table class="table">
                            <tbody>

                                <tr>
                                    <td>Account holder: </td>
                                    <td><b>LE QUOC HUY</b></td>
                                </tr>
                                <tr>
                                    <td>Account Number: </td>
                                    <td><b>285902788</b></td>
                                </tr>
                                <tr>
                                    <td>Amount: </td>
                                    <td><b><?php echo $total_amount ?>$</b></td>
                                </tr>
                                <tr>
                                    <td>CK content: </td>
                                    <td><b><?php echo  $orderCode;?></b></td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="bg-light p-2">Notes: Please keep the transfer content intact <b><?php echo $orderCode ?></b> so that the system can automatically confirm the payment !!!</p>
                    </div>
                </div>
            </div>
                <div id="order-info" class="col-md-4 bg-light border-top">
                    <p class="fw-bold">Order information</p>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><span class="fw-bold"><?php echo $name ?></span></td>
                                <td class="text-end fw-bold"><?php echo $payment ?>$</td>
                            </tr>
                            
                            <tr>
                                <td>Tax (5%)</td>
                                <td class="text-end"><?php echo number_format($tax_amount, 2) ?>$</td>
                            </tr>
                            <td><span class="fw-bold">Totals</span></td>
                            <td class="text-end fw-bold">
                                <?php 
                                    echo number_format($total_amount, 2); // Format total amount
                                ?>$
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    
                </div>
                <div id="hoa-don" class="col-md-4 bg-light border-top">
                    <p class="fw-bold">Invoice information</p>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><span class="fw-bold">Name: </span></td>
                                <td class="text-end"><?php echo $name; ?></td>
                            </tr>
                            <tr>
                                <td><span class="fw-bold">Check-in: </span></td>
                                <td class="text-end "><?php echo $frm_data['checkin'] ?? ''; ?></td>
                            </tr>
                            <tr>
                                <td><span class="fw-bold">Check-out: </span></td>
                                <td class="text-end "><?php echo $frm_data['checkout'] ?? ''; ?></td>
                            </tr>
                            <tr>
                                <td><span class="fw-bold">Customer Name:</span></td>
                                <td class="text-end "> <?php echo $user_name; ?></td>
                            </tr>
                            <tr>
                                <td><span class="fw-bold">Order ID: </span></td>
                                <td class="text-end "><?php echo $orderCode; ?></td>
                            </tr>
                            <tr>
                                <td><span class="fw-bold">Total Pay: </span></td>
                                <td class="text-end "><?php echo number_format($total_amount, 2); ?>$</td>
                            </tr>
                            <tr>
                                <td><span class="fw-bold">Date & Time: </span></td>
                                <td class="text-end "><?php echo date("Y-m-d H:i:s"); ?></td>
                            </tr>
                        
                        </tbody>
                    </table>
                    <div class="text-center mt-3">
                        <p class="fw-bold">Scan the QR code for details</p>
                        <img src='https://qr.sepay.vn/img?acc=285902788&template=compact&bank=MBBank' class="img-fluid mb-3 w-50">
                    </div>

                    <div class="text-end mt-2">
                        <span class="fw-bold text-success">ONIX <br> (đã thanh toán)</span>
                    </div>
                </div>
                
            </div>

            <div>
                <p class="mt-5">
                    <a class="text-decoration-none ms-3" href="index.php"><i class="bi bi-house-door"></i> Home</a>
                </p>
                
            </div>
        </div>
    </div>
</div>
      <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

      <script>
            $(document).ready(function() {
                $("#hoa-don").hide();
                setTimeout(function() {
                    $("#checkout_box").hide();
                    $("#success_pay_box").show();
                    
                    $("#success_pay_box").append('<p class="text-success"><i class="bi bi-check-circle"></i> Payment confirmed!!</p>');
                    
                    $("#order-info").hide();
                    $("#hoa-don").show();


                    setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 200000);
                }, 10000);
            });
     
      </script>

       
  </body>
</html>