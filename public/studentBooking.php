<?php

include_once '../db_connection.php';

session_start();

if (isset($_POST['submit'])) {

    $roomName = mysqli_real_escape_string($conn, $_POST['room']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $etime = mysqli_real_escape_string($conn, $_POST['etime']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $promo = mysqli_real_escape_string($conn, $_POST['promocode']);


    // SQL query if the room is chosen but its not available then cannot book
    $select = "SELECT * FROM room WHERE room_name ='$roomName' && availability = 1";

    $result = mysqli_query($conn, $select);

    $row = mysqli_fetch_assoc($result);

    // SQL query for retrieving the promotion code
    $sqlpromo = "SELECT * FROM promotion where promotion_code = '$promo' ";
    $promoResult = mysqli_query($conn, $sqlpromo);
    $promoRow = mysqli_fetch_assoc($promoResult);

    // print_r($result);

    if (mysqli_num_rows($result) == 0) {
        $error[] = 'Room is not available for booking';
    } else {
        $_SESSION['room_id'] = $row['room_id'];
        $_SESSION['room_name'] = $roomName;
        $_SESSION['date'] = $date;
        $_SESSION['etime'] = $etime;
        $_SESSION['time'] = $time;
        $_SESSION['promotion'] = $promoRow['discount'];
        header('location:./payment.php?msg=booking in progress');
    }
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

    <title>Student Booking Page</title>
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
                        <div class="card card-registration my-4 " style="height:max-content; ">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-4 d-none d-md-block">
                                    <img src="../assets/images/logo-shorthand-horizontal.png" alt="" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                </div>
                                <div class="col-xl-6 ">
                                    <div class="card-body p-md-5 text-black">
                                        <h3 class="mb-5 text-uppercase">Room Booking</h3>

                                        <?php
                                        if (isset($error)) {
                                            foreach ($error as $error) {
                                                echo '<span class="error-msg">' . $error . '</span>';
                                            }
                                        }
                                        ?>



                                        <div class="form-outline mb-4">

                                            <select id="form3Example97" class="form-control form-control-lg" name="room" required>
                                                <option selected>Choose Room To Book</option>
                                                <?php
                                                $sql = "SELECT * FROM room";
                                                $result2 = mysqli_query($conn, $sql);
                                                $resultCheck = mysqli_num_rows($result2);

                                                if ($resultCheck > 0) {
                                                    while ($row = mysqli_fetch_assoc($result2)) {
                                                        echo '<option value="' . $row['room_name'] . '">' . $row['room_name'] . '</option>';
                                                    }
                                                } else {
                                                }
                                                ?>
                                            </select>
                                        </div>


                                        <div class="form-outline mb-4">
                                            <input type="date" id="datepicker" class="form-control form-control-lg" name="date" required>
                                            <label class="form-label" for="datepicker">Booking Date</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="time" id="datepicker2" class="form-control form-control-lg" name="time" required>
                                            <label class="form-label" for="datepicker2">Booking Time</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="time" id="timepicker" class="form-control form-control-lg" name="etime" required>
                                            <label class="form-label" for="timepicker">Booking End Time</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="promo" class="form-control form-control-lg" name="promocode" required>
                                            <label class="form-label" for="promo">Promo Code</label>
                                        </div>


                                        <div class="d-flex justify-content-end pt-3">

                                            <input class="btn btn-light btn-lg" type="reset" value="Reset Booking">
                                            <input class="btn btn-warning btn-lg ms-2" type="submit" value="Book room" name="submit">

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