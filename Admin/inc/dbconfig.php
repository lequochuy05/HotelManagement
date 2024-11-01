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
                $value = trim($value);
                $value = stripslashes($value);
                $value = strip_tags($value);
                $value = htmlspecialchars($value);
                 
                $data[$key] = $value;
            }
            return $data;
        }

        function selectAll($table){
            $conn = $GLOBALS['conn'];
            $sql = "SELECT * FROM $table";
            $result = mysqli_query($conn, $sql);
            return $result;
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
                    die("Query cannot be executed - Select");
                }
                
            }else{
                die("Query cannot be prepared - Select");
            }
        }

        function update($sql, $values, $datatypes){
            $conn = $GLOBALS['conn'];
            if($stmt = mysqli_prepare($conn, $sql)){
                mysqli_stmt_bind_param($stmt, $datatypes,...$values);
                if(mysqli_stmt_execute($stmt)){
                    $result = mysqli_stmt_affected_rows($stmt);
                    mysqli_stmt_close($stmt);
                    return $result;
                }else{
                    mysqli_stmt_close($stmt);
                    die("Query cannot be executed - Update");
                }
                
            }else{
                die("Query cannot be prepared - Update");
            }
        }

        function insert($sql, $values, $datatypes){
            $conn = $GLOBALS['conn'];
            if($stmt = mysqli_prepare($conn, $sql)){
                mysqli_stmt_bind_param($stmt, $datatypes,...$values);
                if(mysqli_stmt_execute($stmt)){
                    $result = mysqli_stmt_affected_rows($stmt);
                    mysqli_stmt_close($stmt);
                    return $result;
                }else{
                    mysqli_stmt_close($stmt);
                    die("Query cannot be executed - Insert");
                }
                
            }else{
                die("Query cannot be prepared - Insert");
            }
        }

        function delete($sql, $values, $datatypes){
            $conn = $GLOBALS['conn'];
            if ($stmt = mysqli_prepare($conn, $sql)) {
                    mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
                
                if (mysqli_stmt_execute($stmt)) {
                    $result = mysqli_stmt_affected_rows($stmt);
                    mysqli_stmt_close($stmt);
                    return $result;
                } else {
                    mysqli_stmt_close($stmt);
                    die("Query cannot be executed - Delete");
                }
            } else {
                die("Query cannot be prepared - Delete");
            }
        }
        
        
?>