
    <div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
        <h3 class="mb-0 h-font">ADMIN</h3>
        <a href="logout.php" class="btn btn-light btn-sm">LOG OUT</a>
    </div>

    <div class="col-lg-2 bg-dark border-top border-3 border-secondary" id="dashboard-menu">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid flex-lg-column align-items-stretch">
                <h4 class="mt-2 text-light">ADMIN PANEL</h4>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white"href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <button class="btn text-white px-3 w-100 shadow-none text-start d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#bookingLinks">
                                <span>Bookings</span>
                                <span><i class="bi bi-caret-down-fill"></i></span>
                            </button>
                            <div class="collapse show px-3 small mb-1" id="bookingLinks">
                                <ul class="nav nav-pills flex-column rounded border-secondary">
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="new_bookings.php">New Bookings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="refund_bookings.php">Refund Bookings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="booking_records.php">Booking Records</a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="users.php">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="rooms.php">Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="features_facilities.php">Features & Facilities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="user_queries.php">User Query</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="settings.php">Setting</a>
                        </li>
                        
                    </ul>   
                </div>
            </div>
        </nav>
    </div>


    <script>
        function setActive(){
        let navbar = document.getElementById('dashboard-menu');
        let a_tags = navbar.getElementsByTagName('a');

        for(i=0; i<a_tags.length;i++){
            let file = a_tags[i].href.split('/').pop();
            let file_name = file.split('.')[0];

            if(document.location.href.indexOf(file_name)>=0){
                a_tags[i].classList.add('active');
            }
        }
    }


    setActive();
    </script>