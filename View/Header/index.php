<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <style>
      * {
      font-family: 'Poppins' sans-serif;    
      }
      .h-font{
        font-family: 'Merienda', cursive;
      }
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      input[type=number] {
        -moz-appearance: textfield;
      }
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg2 shadow-sm sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php?controller=dashboard&action=dashboard">ONIX HOTEL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active me-2" aria-current="page" href="index.php?controller=dashboard&action=dashboard">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="index.php?controller=dashboard&action=room">Room</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="index.php?controller=dashboard&action=facilities">Facilities</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="index.php?controller=dashboard&action=contact">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="index.php?controller=dashboard&action=about">About</a>
        </li>
      </ul>
      <div class="d-flex">    
        <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#loginModal">
          Login
        </button>
        <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
          Register
        </button>
      </div>
    </div>
  </div>
</nav>
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header d-flex align-items-center">
          <h5 class="modal-title"><i class="bi bi-person-circle fs-3 me-2"></i> User Login</h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control shadow-none">           
          </div>
          <div class="mb-4">
            <label class="form-label">Password</label>
            <input type="password" class="form-control shadow-none">           
          </div>
          <div class="d-flex align-items-center justify-content-between mb-2">
            <button type="submit" class="btn btn-dark shadow-none">LOGIN</button>
            <a href="javascript: void(0)" class="tex-secondary text-decoration-none">Forgot Password?</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form>
        <div class="modal-header d-flex align-items-center">
          <h5 class="modal-title"><i class="bi bi-person-add"></i> User Registration</h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
          Note: Your details must match with your ID (Citizen ID, Passport, Driver's License, etc..) that will be required during check-in
        </span>

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 ps-0 mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control shadow-none"> 
            </div>
            <div class="col-md-6 ps-0 mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control shadow-none"> 
            </div>
            <div class="col-md-6 ps-0 mb-3">
              <label class="form-label">Phone number</label>
              <input type="number" class="form-control shadow-none"> 
            </div>
            <div class="col-md-6 p-0 mb-3">
              <label class="form-label">Picture</label>
              <input type="file" class="form-control shadow-none"> 
            </div>
            <div class="col-md-12 p-0">
              <label class="form-label">Address</label>
              <textarea class="form-control shadow-none" rows="1"></textarea>
            </div>
            <div class="col-md-6 ps-0 mb-3">
              <label class="form-label">Pin code</label>
              <input type="text" class="form-control shadow-none"> 
            </div>
            <div class="col-md-6 p-0 mb-3">
              <label class="form-label">Date of birth</label>
              <input type="date" class="form-control shadow-none"> 
            </div>
            <div class="col-md-6 ps-0 mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control shadow-none"> 
            </div>
            <div class="col-md-6 p-0 mb-3">
              <label class="form-label">Confirm password</label>
              <input type="password" class="form-control shadow-none"> 
            </div>  
          </div>
            <div class="text-center">
              <button type="submit" class="btn btn-dark shadow-none">REGISTER</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>