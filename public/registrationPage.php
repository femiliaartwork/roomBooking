<?php

    include_once '../db_connection.php';

    if (isset($_POST['submit'])) {

        $fName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lName = mysqli_real_escape_string($conn, $_POST['lastName']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $userType = mysqli_real_escape_string($conn, $_POST['inlineRadioOptions']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);


        // SQL query
        $select = "SELECT * FROM user WHERE email='$email' && password= '$password'";

        $result = mysqli_query($conn, $select);

        // print_r($result);

        if (mysqli_num_rows($result) > 0) {
            $error[] = 'User Already existed';
            
        } else {
            $insert = "INSERT INTO user(firstName, lastName, userType, email, password, address) VALUES('$fName', '$lName', '$userType', '$email', '$password', '$address')";
            mysqli_query($conn, $insert);

            header('location:../index.php?msg=User Account Successfully Created');

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
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src=".."></script>

    <title>Registration Page</title>
</head>

<body>
    <form action="" method="post">
        <section class="h-100 bg-white">
            <div class="container py-5 h-100" style="margin-top: 5rem">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card card-registration my-4" style="width:max-content; height:max-content; margin-left:15rem; ">
                            <div class="row g-0">
                                <div class="col-xl-6 d-none d-xl-block">
                                    <img src="../assets/images/logo-shorthand-horizontal.png" alt="Sample photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                                </div>
                                <div class="col-xl-6">
                                    <div class="card-body p-md-5 text-black">
                                        <h3 class="mb-5 text-uppercase">Account registration form</h3>

                                            <?php
                                                if(isset($error)) {
                                                    foreach($error as $error) {
                                                        echo '<span class="error-msg">'.$error.'</span>';
                                                    }
                                                }
                                            ?>
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="form3Example1m" class="form-control form-control-lg" placeholder="First Name" name="firstName" required/>
                                                    <label class="form-label" for="form3Example1m">First name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="form3Example1n" class="form-control form-control-lg" placeholder="Last Name" name="lastName" required/>
                                                    <label class="form-label" for="form3Example1n">Last name</label>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-outline mb-4">
                                            <input type="text" id="form3Example8" class="form-control form-control-lg" placeholder="Address" name="address" required/>
                                            <label class="form-label" for="form3Example8">Address</label>
                                        </div>

                                        <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                            <h6 class="mb-1 me-4">Account Type: </h6>

                                            <div class="form-check form-check-inline mb-0 me-4" style="padding-left: 1rem;">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="adminUser" value="admin" required/>
                                                <label class="form-check-label" for="adminUser">Admin</label>
                                            </div>

                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="student" value="student" required/>
                                                <label class="form-check-label" for="student">Student</label>
                                            </div>

                                        </div>


                                        <div class="form-outline mb-4">
                                            <input type="text" id="form3Example97" class="form-control form-control-lg" placeholder="Email" name="email" required/>
                                            <label class="form-label" for="form3Example97">Email</label>
                                        </div>


                                        <div class="form-outline mb-4">
                                            <input type="password" id="form3Example97" class="form-control form-control-lg" placeholder="Password" name="password" required/>
                                            <label class="form-label" for="form3Example97">Password</label>
                                        </div>

                                        <div class="d-flex justify-content-end pt-3">

                                            <input class="btn btn-light btn-lg" type="reset" value="Reset Form">
                                            <input class="btn btn-warning btn-lg ms-2" type="submit" value="Register" name="submit">

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