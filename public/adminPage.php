<?php
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

    <div class="container">
        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">User Id</th>
                    <th scope="col">Room Name</th>
                    <th scope="col">Room Id</th>
                    <th scope="col">Availability</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>
                        <a href="" class="link-primary"><i class="fa-solid fa-pen-to-square fs-5 me-3">Edit</i></a>
                        <a href="" class="link-danger"><i class="fa-solid fa-pen-to-square fs-5 me-3">Delete</i></a>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</body>

</html>