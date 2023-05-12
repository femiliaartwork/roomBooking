<?php

include_once '../db_connection.php';

session_start();

if (isset($_POST['submit'])) {

    $roomName = mysqli_real_escape_string($conn, $_POST['room_name']);
    $roomCapacity = mysqli_real_escape_string($conn, $_POST['room_capacity']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $promotionCode = mysqli_real_escape_string($conn, $_POST['promotion_code']);

    // insert a new record into the "room" table
    $insert = "INSERT INTO room SET launch_room = 0 , room_name = '$roomName', room_capacity = '$roomCapacity', price = '$price', promotion_code = '$promotionCode' , user_id = '" . $_SESSION['admin_id'] . "'";
    $result = mysqli_query($conn, $insert);

    header('location:./adminPage.php?msg=Room created successfully.');
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

    <title>Admin Room Creating Page</title>
</head>

<body>
    <?php
    include('./header.php');
    ?>
    <form action="" method="post">
        <section class="h-100 bg-white">
            <div class="container py-5 h-100 w-100" style="margin-top: 5rem" >
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card card-registration my-4 w-100" style="width:max-content; height:max-content; margin-left:25rem; ">
                            <div class="row g-0">
                                <div class="col-xl-6 d-none d-xl-block">
                                    <img src="../assets/images/logo-shorthand-horizontal.png" alt="Sample photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                                </div>
                                <div class="col-xl-6 ">
                                    <div class="card-body p-md-5 text-black">
                                        <h3 class="mb-5 text-uppercase">Room Creation</h3>

                                        <?php
                                        if (isset($error)) {
                                            foreach ($error as $error) {
                                                echo '<span class="error-msg">' . $error . '</span>';
                                            }
                                        }
                                        ?>

                                    <label for="name">Room Name:</label>
                                    <input type="text" name="room_name" id="room_name">
                                    <br>
                                    <label for="price">Price:</label>
                                    <input type="text" name="price" id="price">
                                    <br>
                                    <label for="capacity">Capacity:</label>
                                    <input type="number" name="room_capacity" id="room_capacity">
                                    <br>
                                    <label for="promo_code">Promotion code:</label>
                                    <input type="text" name="promotion_code" id="promotion_code">
                                    <br>
                                    <input type="submit" value="Create room" name="submit">

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