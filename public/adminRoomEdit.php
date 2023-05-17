<?php

include_once '../db_connection.php';

session_start();

if (isset($_POST['submit'])) {
    $roomName = mysqli_real_escape_string($conn, $_POST['room_name']);
    $roomCapacity = mysqli_real_escape_string($conn, $_POST['room_capacity']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $promotionCode = mysqli_real_escape_string($conn, $_POST['promotion_code']);
    $selectDate = mysqli_real_escape_string($conn, $_POST['select_date']);

    // Update the room details
    $updateRoom = "UPDATE room SET room_name = '$roomName', room_capacity = '$roomCapacity', price = '$price', promotion_code = '$promotionCode', select_date = '$selectDate' WHERE room_id = '" . $_GET['roomid'] . "'";
    $resultRoom = mysqli_query($conn, $updateRoom);

    // Change availability to 0 for the selected date in every month
    $dateParts = explode('-', $selectDate);
    $selectedDay = $dateParts[2];
    
    for ($month = 1; $month <= 12; $month++) {
        $year = $dateParts[0];
        $blockedDate = "$year-$month-$selectedDay";
    
        // Update the availability for the blocked date to 0 in your availability table
        // Modify the query based on your table structure
        $updateAvailability = "UPDATE room SET availability = 0 WHERE date_column = '$blockedDate'";
        mysqli_query($conn, $updateAvailability);
    }


    header('location:./adminPage.php?update=Room updated successfully!');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../css/fontawesome-all.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src=".."></script>

    <title>Edit Room Booking Page</title>
</head>

<body>
    <?php
    include('./header.php');
    ?>
    <form action="" method="post">
        <section class="h-100 bg-white">
            <div class="container py-5 h-100 w-100" style="margin-top: 5rem">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card card-registration my-4 w-100" style="width:max-content; height:max-content; margin-left:15rem; ">
                            <div class="row g-0">
                                <div class="col-xl-6 d-none d-xl-block">
                                    <img src="../assets/images/logo-shorthand-horizontal.png" alt="Sample photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                                </div>
                                <div class="col-xl-6 ">
                                    <div class="card-body p-md-5 text-black">
                                        <h3 class="mb-5 text-uppercase">Edit Room Details</h3>


                                        <div class="form-outline mb-4">
                                            <?php
                                            $sql = "SELECT * from room where room_id = '" . $_GET['roomid'] . "'";
                                            $result2 = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_assoc($result2);    
                                            ?>
                                            <input type="text" id="room_name" class="form-control form-control-lg" name="room_name" value="<?php echo $row['room_name']?>" readonly>
                                            <label class="form-label" for="room_name">Room Name</label>
                                        </div>

                                        <div class="form-outline mb-4">

                                            <input type="number" id="capacity" class="form-control form-control-lg" name="room_capacity" min="1" max="100" value="<?php echo $row['room_capacity']?>"required>
                                            <label class="form-label" for="capacity">Capacity</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="number" id="price" class="form-control form-control-lg" name="price" min="1" max="1000" step="0.01" value="<?php echo $row['price']?>"required>
                                            <label class="form-label" for="price">Price</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="date" id="datepicker" class="form-control form-control-lg" name="select_date" value="<?php echo $row['select_date']?>"required>
                                            <label class="form-label" for="datepicker">Select Blocked Out Date</label>
                                        </div>

                                        <div class="d-flex justify-content-end pt-3">

                                            <input class="btn btn-light btn-lg" type="reset" value="Reset Edit Booking">
                                            <input class="btn btn-warning btn-lg ms-2" type="submit" value="Edit room" name="submit">

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

</body>

</html>