<?php
include_once '../db_connection.php';

$id = $_GET['bookingid'];
$sql = "DELETE FROM booking WHERE booking_id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("location:./studentPage.php?delete=Room booking successfully cancelled!");
} else {
    echo 'Failed' .mysqli_error($conn);
}
?>