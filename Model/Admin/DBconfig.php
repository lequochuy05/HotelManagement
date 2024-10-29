<?php
    
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'hotelmanagement';

        $conn = mysqli_connect($hostname, $username, $password, $dbname);
        if(!$conn){
            die("Cannot Connect to Database".mysqli_connect_error());
            exit;
        }else{
            mysqli_set_charset($conn, 'utf8');
           // echo 'Connected';
        }    
   
        function filteration($data){
            foreach($data as $key => $value){
                $data[$key] = trim($value);
                $data[$key] = stripcslashes($value);
                $data[$key] = htmlspecialchars($value);
                $data[$key] = strip_tags($value);
            }
            return $data;
        }

        function select($sql, $values, $datatypes){
            $conn = $GLOBALS['conn'];
            if($stmt = mysqli_prepare($conn, $sql)){
                mysqli_stmt_bind_param($stmt, $datatypes,...$values);
                if(mysqli_stmt_execute($stmt)){
                    $result = mysqli_stmt_get_result($stmt);
                    mysqli_stmt_close($stmt);
                    return $result;
                }else{
                    mysqli_stmt_close($stmt);
                    die("Query cannot be executed!!!");
                }
                
            }else{
                mysqli_stmt_close($stmt);
                die("Query cannot be prepared");
            }
        }

?>