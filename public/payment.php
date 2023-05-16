<?php

include_once '../db_connection.php';

session_start();

if (isset($_POST['submit'])) {

    // $roomName = mysqli_real_escape_string($conn, $_POST['room']);
    // $date = mysqli_real_escape_string($conn, $_POST['date']);
    // $time = mysqli_real_escape_string($conn, $_POST['time']);

    // SQL query if the room is chosen but its not available then cannot book

    // '" . $_GET['roomid'] . "' AND booking_id = '" . $_GET['bookingid'] . "'";
    $insert = "INSERT INTO booking(booking_date, booking_time, booking_etime, room_id, user_id) VALUES ('" . $_SESSION['date'] ."', '" . $_SESSION['time'] ."', '" . $_SESSION['etime'] ."', " . $_SESSION['room_id'] .", " . $_SESSION['student_id'] .") ";

    $result = mysqli_query($conn, $insert);

    header('location:./studentPage.php?payment=Room Successfully Booked');
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
    <title>Payment Page</title>
</head>

<body>
    <?php
    include('./header.php');
    ?>
    <section class="p-4 p-md-5" style="
    background-image: url(https://mdbcdn.b-cdn.net/img/Photos/Others/background3.webp);
  ">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-5">
                <div class="card rounded-3">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h2>Payment</h3>

                        </div>
                        <form action="" method="post">

                            <div class="d-flex flex-row align-items-center mb-4 pb-1">
                                <img class="img-fluid" src="https://img.icons8.com/color/48/000000/mastercard-logo.png" />


                            </div>

                            <p class="fw-bold mb-4">Add card:</p>

                            <div class="form-outline mb-4">
                                <input type="text" id="formControlLgXsd" class="form-control form-control-lg" value="" placeholder="nameofyourgirlfriend:)" />
                                <label class="form-label" for="formControlLgXsd">Cardholder's Name</label>
                            </div>

                            <div class="row mb-4">
                                <div class="col-7">
                                    <div class="form-outline">
                                        <input type="text" id="formControlLgXM" class="form-control form-control-lg" value="" placeholder="1234123412341234" />
                                        <label class="form-label" for="formControlLgXM">Card Number</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-outline">
                                        <input type="password" id="formControlLgExpk" class="form-control form-control-lg" placeholder="MM/YYYY" />
                                        <label class="form-label" for="formControlLgExpk">Expire</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-outline">
                                        <input type="password" id="formControlLgcvv" class="form-control form-control-lg" placeholder="Cvv" />
                                        <label class="form-label" for="formControlLgcvv">Cvv</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <?php
                                $sql = "SELECT * from room where room_name = '" . $_SESSION['room_name'] . "'";
                                $result2 = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result2);
                                $discountedPrice = $row['price'] - $_SESSION['promotion'];
                                ?>
                                <input type="text" id="formControlLgXsds" class="form-control form-control-lg" value="$<?php echo $discountedPrice ?>" readonly />
                                <label class="form-label" for="formControlLgXsds">Booking Cost</label>
                            </div>

                            <input type="submit" class="btn btn-success btn-lg btn-block" name="submit" value="Pay" />

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>