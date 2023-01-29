<?php include "Navbar.php"; ?>

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
    <title>Update</title>
</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center bg-primary text-white py-2 mt-3 rounded">Search OfficeData</h3>
            </div>
            <div class="col-md-12 mt-3">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="form-inline my-4 my-lg-0 d-flex justify-content-center">
                    <input class="form-control mr-sm-2" type="search" name="searchid" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary my-2 my-sm-0" name="searchSubmit" type="submit">Search Data</button>
                </form>
                <div class="col-md-12 mt-3">
                    <form action="Query.php" method="POST">
                        <?php
                        include "DataBase.php";
                        if (isset($_REQUEST['searchSubmit']) == true) {
                            $id = $_POST['searchid'];
                            $myData = new DataBase();
                            $myData->select("office", "Id=$id");
                            $result = $myData->sql;
                            if (mysqli_num_rows($result) > 0) {
                                while ($rows = mysqli_fetch_assoc($result)) {

                        ?>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" value="<?php echo $rows['Name']; ?>" id="name" placeholder="Enter Your Name">
                                            <input type="hidden" name="editId" value="<?php echo $rows['Id']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Email">Email</label>
                                            <input type="email" name="email" class="form-control" id="Email" value="<?php echo $rows['Email']; ?>" placeholder="Enter your Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Password">Password</label>
                                        <input type="password" name="password" class="form-control" id="Password" value="<?php echo $rows['Password']; ?>" placeholder="Enter your Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="Phone">Phone no</label>
                                        <input type="number" name="phone" class="form-control" value="<?php echo $rows['PhoneNo']; ?>" id="Phone" placeholder="Enter your Phone no">
                                    </div>
                                    <div class="form-group row">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label col-form-label">Gender</label>
                                        <div class="col-sm-10">
                                            <?php if ($rows['Gender'] == "Male") { ?>
                                                <input type="radio" id="colFormLabel" name="gender" value="Male" checked>
                                                <label for="colFormLabel" class="col-form-label col-form-label">Male</label>
                                                <input type="radio" id="colFormLabel" name="gender" value="Female">
                                                <label for="colFormLabel" class="col-form-label col-form-label">Female</label>
                                            <?php } elseif ($rows['Gender'] == "Female") { ?>
                                                <input type="radio" id="colFormLabel" name="gender" value="Male">
                                                <label for="colFormLabel" class="col-form-label col-form-label">Male</label>
                                                <input type="radio" id="colFormLabel" name="gender" value="Female" checked>
                                                <label for="colFormLabel" class="col-form-label col-form-label">Female</label>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <button type="submit" name="editBtn" class="btn btn-primary text-white roundes">EditData</button>

                        <?php }
                            }
                        } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>