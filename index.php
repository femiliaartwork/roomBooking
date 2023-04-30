<?php

session_start();


if (isset($_POST['submit'])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once './db_connection.php';

    // SQL query
    $select = "SELECT * FROM user WHERE email='$email' && password= '$password'";

    $result = mysqli_query($conn, $select);

    // print_r($result);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);

        if ($row['userType'] == 'admin') {
            $_SESSION['admin_name'] = $row['firstName'] . ' ' . $row['lastName'];
            $_SESSION['admin_id'] = $row['user_id'];

            header('location:./public/adminPage.php');
        } else if ($row['userType'] == 'student') {
            $_SESSION['student_name'] = $row['firstName'] . ' ' . $row['lastName'];
            $_SESSION['student_id'] = $row['user_id'];

            header('location:./public/studentPage.php');
        }
    } else {
        $error[] = 'Incorrect email or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="./css/fontawesome-all.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="./css/styles.css" />
    <script src="./js/jquery-3.2.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
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
                                    <img src="./assets/images/logo-shorthand-horizontal.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <form>

                                            <!-- <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Logo</span>
                                              </div> -->

                                            <h2 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h2>

                                            <?php
                                            if (isset($error)) {
                                                foreach ($error as $error) {
                                                    echo '<span class="error-msg">' . $error . '</span>';
                                                }
                                            }
                                            ?>

                                            <div class="form-outline mb-4">
                                                <input type="email" id="form2Example17" class="form-control form-control-lg" placeholder="Email" name="email" />
                                                <label class="form-label" for="form2Example17">Email address</label>
                                            </div>

                                            <div class="form-outline mb-4">
                                                <input type="password" id="form2Example27" class="form-control form-control-lg" placeholder="Password" name="password" />
                                                <label class="form-label" for="form2Example27">Password</label>
                                            </div>

                                            <div class="pt-1 mb-4">


                                                <input class="btn btn-dark btn-lg btn-block" type="submit" value="Login" name="submit">
                                            </div>

                                            <a class="small text-muted" href="#!">Forgot password?</a>
                                            <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="./public/registrationPage.php" style="color: #393f81;">Register here</a></p>
                                            <a href="#!" class="small text-muted">Terms of use.</a>
                                            <a href="#!" class="small text-muted">Privacy policy</a>
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