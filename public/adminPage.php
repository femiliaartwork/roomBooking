<?php
include_once '../db_connection.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../css/fontawesome-all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css" />
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <title>Admin Page</title>
</head>

<body>
    <h1 style="padding-left:1rem;">Welcome <span class="link-primary"><?php echo $_SESSION['admin_name'] ?></span></h1>

    <div style="padding-left:1rem;">
        <a href="./adminCreate.php" class="btn btn-dark mb-3">Create a room</a>
    </div>
    <div class="container">
        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Room Name</th>
                    <th scope="col">Room Id</th>
                    <th scope="col">Room Capacity</th>
                    <th scope="col">Availability</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT * from room where user_id = '" . $_SESSION['admin_id'] . "'";
                $result = mysqli_query($conn, $sql);           

                // check if there are any result that came back
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                        <th scope="row">' . $row['room_name'] . '</th>
                        <td>' . $row['room_id'] . '</td>
                        <td>' . $row['room_capacity'] . '</td>
                        <td>' . $row['availability'] .'</td>
                        <td>' . $row['price'] .'</td>
                        <td>
                            <a href="./adminEdit.php?roomid='. $row['room_id'] .'" class="link-primary"><i class="fa-solid fa-pen-to-square fs-5 me-3">Edit</i></a>
                            <a href="" class="link-danger"><i class="fa-solid fa-pen-to-square fs-5 me-3">Delete</i></a>
                        </td>
                    </tr>';
                    }
                   
                } else {
                    echo "No results found";
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>