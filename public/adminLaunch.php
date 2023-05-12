<?php
include_once '../db_connection.php';

$id = $_GET['roomid'];
$sql = "UPDATE room SET launch_room = 1 WHERE room_id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("location:./adminPage.php?msg=Room successfully launched!");
} else {
    echo 'Failed' .mysqli_error($conn);
}
?>