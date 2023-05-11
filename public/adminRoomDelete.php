<?php
include_once '../db_connection.php';

$id = $_GET['roomid'];
$sql = "DELETE FROM room WHERE room_id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("location:./adminPage.php?delete=Room successfully deleted!");
} else {
    echo 'Failed' .mysqli_error($conn);
}
?>