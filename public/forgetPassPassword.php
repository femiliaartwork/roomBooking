<?php

include_once '../db_connection.php';

session_start();

if (isset($_POST['submit'])) {

    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    if ($password != $password2) {
        $error[] = 'Password Mismatch!';
    }

    // SQL query
    $select = "SELECT * FROM user WHERE password='$password'";

    $result = mysqli_query($conn, $select);

    // var_dump($result);    

    // SQL query to update the user password according to the email he/she entered in the forgetPassEmail.php using _SESSION['email']
    $update = "UPDATE user SET password = '$password' WHERE email = '" . $_SESSION['email'] . "'";
    mysqli_query($conn, $update);

    header('location:../index.php?passchange=Password Successfully change!');
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
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <title>Room Booking System</title>


</head>

<body>

    <form action="" method="post">
        <section class="vh-100" style="background-color: white;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-4">
                        <div class="card" style="border-radius: 1rem; width:max-content; height:max-content; margin-top:6rem">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="../assets/images/logo-shorthand-horizontal.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <?php
                                        if (isset($_GET['msg'])) {
                                            $msg = $_GET['msg'];
                                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">' . $msg .
                                                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                          </div>';
                                        }
                                        ?>

                                        <form>

                                            <!-- <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Logo</span>
                                              </div> -->

                                            <h2 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Forget Password / Email</h2>

                                            <?php
                                            if (isset($error)) {
                                                foreach ($error as $error) {
                                                    echo '<span class="error-msg">' . $error . '</span>';
                                                }
                                            }
                                            ?>

                                            <div class="form-outline mb-4">
                                                <input type="password" id="form2Example17" class="form-control form-control-lg" placeholder="Password" name="password" required />
                                                <label class="form-label" for="form2Example17">Password</label>
                                            </div>

                                            <div class="form-outline mb-4">
                                                <input type="password" id="form2Example18" class="form-control form-control-lg" placeholder="Confirm Password" name="password2" required />
                                                <label class="form-label" for="form2Example18">Confirm Password</label>
                                            </div>

                                            <div class="pt-1 mb-4">


                                                <input class="btn btn-dark btn-lg btn-block" type="submit" value="Continue" name="submit">
                                            </div>


                                        </form>

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

<footer>
    © Copyright Team Fruit- 2023
</footer>

</html>