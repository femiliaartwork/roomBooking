<?php

include_once '../db_connection.php';

session_start();

if (isset($_POST['submit'])) {
    $promotionCode = mysqli_real_escape_string($conn, $_POST['promotion_code']);
    $discount = mysqli_real_escape_string($conn, $_POST['discount']);

    // Update the room details
    $updatePromotion = "UPDATE promotion SET discount = '$discount', promotion_code = '$promotionCode' WHERE promotion_code = '" . $_GET['promotion_code'] . "'";
    $resultPromotion = mysqli_query($conn, $updatePromotion);


    header('location:./adminPage.php?update=Promotion updated successfully!');
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

    <title>Edit Promotion Page</title>
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
                                        <h3 class="mb-5 text-uppercase">Edit Promotion Details</h3>


                                        <div class="form-outline mb-4">
                                            <?php
                                            $sql = "SELECT * from promotion where promotion_code = '" . $_GET['promotion_code'] . "'";
                                            $result2 = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_assoc($result2);    
                                            ?>
                                            <input type="text" id="promotion_code" class="form-control form-control-lg" name="promotion_code" value="<?php echo $row['promotion_code']?>" required>
                                            <label class="form-label" for="promotion_code">Promotion Name</label>
                                        </div>

                                        <div class="form-outline mb-4">

                                            <input type="double" id="discount" class="form-control form-control-lg" name="discount" min="1" max="100" value="<?php echo $row['discount']?>"required>
                                            <label class="form-label" for="discount">Discount</label>
                                        </div>

                                        <div class="d-flex justify-content-end pt-3">

                                            <input class="btn btn-light btn-lg" type="reset" value="Reset Edit Promotion">
                                            <input class="btn btn-warning btn-lg ms-2" type="submit" value="Edit promotion" name="submit">

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