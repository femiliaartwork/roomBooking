<?php 

    $dbServer = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'test';

    $conn = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);
    if (!$conn) {
        die("fail");
    } else {
        echo 'Connection Successful';
    }

        

        // $query = "select * from admin";
        // $stmt = mysqli_query($conn, $query);

        // while($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {
        //     echo $row['name'].'</br>';
        // }
