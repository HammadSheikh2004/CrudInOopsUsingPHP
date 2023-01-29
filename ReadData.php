<?php
include "Navbar.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>ReadData</title>
</head>

<body>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center bg-primary text-white py-2 mt-3 rounded">Read OfficeData</h3>
            </div>
            <div class="col-md-12 mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Password</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include "DataBase.php";
                        $b = new DataBase();
                        $b->select("office");
                        $result = $b->sql;
                        while ($rows = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <th><?php echo $rows['Id']; ?></th>
                                <td><?php echo $rows['Name']; ?></td>
                                <td><?php echo $rows['Email']; ?></td>
                                <td><?php echo $rows['PhoneNo']; ?></td>
                                <td><?php echo $rows['Password']; ?></td>
                                <td><?php echo $rows['Gender']; ?></td>
                                <td>
                                    <a href="Edit.php?editId=<?php echo $rows['Id']; ?>" class="badge badge-primary text-white rounded py-2">Update Data</a>
                                    <a href="Query.php?deleteid=<?php echo $rows['Id']; ?>" class="badge badge-primary text-white rounded py-2">Delete Data</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>