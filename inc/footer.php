
<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-lg-4 p-4">
            <h3>ONIX HOTEL</h3>
            <p>The hotel is located in the city center.
            </p>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Links</h5>
            <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a> <br>
            <a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a> <br>
            <a href="facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a> <br>
            <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact Us</a> <br>
            <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">About</a>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Follow Us</h5>
                <?php
                    if($contact_result['tw']!= ''){
                        echo<<<data
                            <a href="$contact_result[tw]" class="d-inline-block mb-1 text-decoration-none">
                                <span class="badge bg-light text-dark fs-6 p-2">
                                    <i class="bi bi-twitter me-1"></i> Twitter
                                </span>
                            </a>                                                         
                        data;
                    }
                ?>

               
                <br>
                <a href="<?php echo $contact_result['ig'] ?>" class="d-inline-block mb-1 text-decoration-none">
                    <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-instagram me-1"></i> Instagram
                    </span>
                </a>
                <br>
                <a href="<?php echo $contact_result['fb'] ?>" class="d-inline-block mb-1 text-decoration-none">
                    <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-facebook me-1"></i> Facebook
                    </span>
                </a>
                <br>
                <a href="<?php echo $contact_result['tt'] ?>" class="d-inline-block mb-1 text-decoration-none">
                    <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-tiktok me-1"></i> TikTok
                    </span>
                </a>
           
        </div>
    </div>
</div>

<h6 class="text-center bg-dark text-white p-3 m-0"><i class="bi bi-c-circle"></i> By Quốc Huy</h6>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
