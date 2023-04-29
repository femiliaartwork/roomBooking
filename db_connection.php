<?php 

    $dbServer = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'roomBooking';

    $conn = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);
    if (!$conn) {
        die("fail");
    } else {
        // echo 'Success';
    }

        

        // $query = "select * from admin";
        // $stmt = mysqli_query($conn, $query);

        // while($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {
        //     echo $row['name'].'</br>';
        // }
