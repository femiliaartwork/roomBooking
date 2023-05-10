<?php
include_once '../db_connection.php';

$id = $_GET['roomid'];
$sql = "INSERT INTO room (room_name, room_capacity, price, promotion_code, user_id)
        SELECT room_name, room_capacity, price, promotion_code, user_id
        FROM createroom
        WHERE room_id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $sql = "DELETE FROM createroom WHERE room_id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location:./adminPage.php?msg=Room successfully launched!");
    } else {
        echo 'Failed' .mysqli_error($conn);
    }
} else {
    echo 'Failed' .mysqli_error($conn);
}
?>