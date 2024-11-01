<?php
    require("inc/essentials.php");
    require("inc/dbconfig.php");
    adminLogin();

    if(isset($_GET['seen'])){
        $frm_data = filteration($_GET);
        if($frm_data['seen'] == 'all'){
            $sql = "UPDATE user_queries SET seen = ?";
            $values = [1];
            if(update($sql, $values, 'i')){
                alert('success', 'Marked all as read');
            }else{
                alert('error', 'Operation Failed');
            }
        }else{
            $sql = "UPDATE user_queries SET seen = ? WHERE no=?";
            $values = [1, $frm_data['seen']];
            if(update($sql, $values, 'ii')){
                alert('success', 'Marked as read');
            }else{
                alert('error', 'Operation Failed');
            }
        }
    }
    if(isset($_GET['del'])){
        $frm_data = filteration($_GET);
        if($frm_data['del'] == 'all'){
            $sql = "DELETE FROM user_queries" ;
             if(mysqli_query($conn, $sql)){
                alert('success', 'All Data Deleted');
            }else{
                alert('error', 'Operation Failed');
            }
        }else{
            $sql = "DELETE FROM user_queries WHERE no=?";
            $values = [$frm_data['del']];
            if(delete($sql, $values, 'i')){
                alert('success', 'Data Deleted');
            }else{
                alert('error', 'Operation Failed');
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN - User Query</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="Shortcut icon" href="images/logo.png">
    <?php   require("inc/links.php"); 
            require("inc/scripts.php");?>
</head>
<body class="bg-light">
    <?php
        include("inc/header.php");
    ?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">USER QUERIES</h3>

                <!-- User Query section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <div class="text-end mb-4">
                            <a href="?seen=all" class="btn btn-dark rounded-pill shadow-none btn-sm"><i class="bi bi-check2"></i> Mark all read</a>
                            <a href="?del=all" class="btn btn-danger rounded-pill shadow-none btn-sm"><i class="bi bi-trash"></i> Delete all</a>
                        </div>

                        <div class="table-responsive-md" style="height: 450px; overflow-y:scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" width="20%">Subject</th>
                                    <th scope="col" width="20%">Message</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM user_queries ORDER BY no DESC";
                                        $data = mysqli_query($conn, $sql);
                                        $i = 1;
                                        while($row = mysqli_fetch_assoc($data)){
                                            $seen = '';
                                            if($row['seen']!=1){
                                                $seen = "<a href='?seen=$row[no]' class='btn btn-sm rounded-pill btn-primary'>Mark as read</a> <br>";
                                            } 
                                            $seen.="<a href='?del=$row[no]' class='btn btn-sm rounded-pill btn-danger mt-2'>Delete</a>";
                                           
                                            echo<<<query
                                                <tr>
                                                    <td>$i</td>
                                                    <td>$row[name]</td>
                                                    <td>$row[email]</td>
                                                    <td>$row[subject]</td>
                                                    <td>$row[message]</td>
                                                    <td>$row[date]</td>
                                                    <td>$seen</td>
                                                </tr>
                                            query;
                                            $i++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>