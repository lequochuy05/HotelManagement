<?php
  require("inc/essentials.php");
  require("inc/dbconfig.php");

  session_start();
    if(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true){
      redirect('dashboard.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/log.css">
    <link rel="Shortcut icon" href="images/logo.png">
    <?php require("inc/links.php");
          require("inc/scripts.php");
    ?>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>ADMIN - LOGIN</title>
  </head>
  
  <body>
    <div class="container">
      <header>
        <div id="head1">
          <img src="images/logo.png"/>
          <div class="logo-text">
            <div class="logo-name">ONIX</div>
            <a href="#">Register</a>
          </div>
        </div>
        <div id="head2">
          <a href="#">About - Onix</a>
        </div>
      </header>
      <main>
        <div class="main1"><img src="images/ONIX.png"/></div>
        <div class="main2">
          <form method="POST">
            <div class="head">Login</div>
            <div class="middle">
              <input type="text" name="admin_name" placeholder="Username" />
              <br />
              <input type="password" name="admin_pass" placeholder="Password" />
              <button name="login" type="submit" class="btn_log">Login</button>
              <br />
              <div class="register-section">
                <div class="register">
                  <a href="#">Register</a> 
                  <span>or</span>
                  <a href="#">Forgot Password</a>
                </div>
                <div class="social-buttons">
                  <button class="btn-facebook">
                    <i class="fab fa-facebook-f"></i> Sign in with Facebook
                  </button>
                  <button class="btn-google">
                    <i class="fab fa-google"></i> Sign in with Google
                  </button>
                  <button class="btn-twitter">
                    <i class="fab fa-twitter"></i> Sign in with Twitter
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </main>
    </div>
  <?php  
    if(isset($_POST['login'])){
      $frm_data = filteration($_POST);
      
      $sql = "SELECT * FROM taikhoanadmin WHERE username = ? AND password = ?";
      $values = [$frm_data['admin_name'],$frm_data['admin_pass']];

      $result = select($sql, $values, "ss");
      if(!$result->num_rows > 0){
        alert('error', 'Login failed - Incorrect username or password');
      }else{
        $row = mysqli_fetch_assoc($result);
        $_SESSION['adminLogin'] = true;
        $_SESSION['adminId'] = $row['username'];
        redirect('dashboard.php');
      }
    }
  ?>

  </body>
</html>
