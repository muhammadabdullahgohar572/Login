<?php

$showAlert = false;
    $exists = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "./Serverconnect.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Corrected the query to check for existing username
    $existsusrname = "SELECT * FROM `login` WHERE `username` = '$username'";

    $result = mysqli_query($conn, $existsusrname);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $exists = true;
        } else {
            $exists = false;
        }

        if ($password == $cpassword && $exists == false) {
            $sql = "INSERT INTO `login` (`username`, `password`) VALUES ('$username', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
            } else {
                $err = "Error: " . mysqli_error($conn);
                echo $err;
            }
        } else if ($password != $cpassword) {
            echo '<div class="alert alert-danger" role="alert">
             <b>Error</b> Passwords do not match.
           </div>';
        }
    } else {
        $err = "Error: " . mysqli_error($conn);
        echo $err;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php require "./Navbar.php" ?>
    <?php
    if ($showAlert) {
        echo '<div class="alert alert-success" role="alert">
     <b>Success!</b> Your account is now created and you can login.
       </div>';
        header("location: ./Loginsystem.php");

    }
    if ($exists) {
        echo '<div class="alert alert-danger" role="alert">
            <b>Error</b> Username already exists.
        </div>';
        }
    ?>
    <div
        style="font-family: Arial, sans-serif;padding: 0 200px 0 200px; align-items: center;  background-color: #f0f0f0">
        <div class="background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1)">
            <h2 style="text-align: center;">Sign Up</h2>
            <form method="post" action="./Singup.php">
                <div style="margin-bottom: 15px;">
                    <label for="username" style="display: block; margin-bottom: 5px;">Username:</label>
                    <input type="text" id="username" name="username"
                        style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label for="password" style="display: block; margin-bottom: 5px;">Password:</label>
                    <input type="password" id="password" name="password"
                        style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label for="confirm-password" style="display: block; margin-bottom: 5px;">Confirm
                        Password:</label>
                    <input type="password" id="cpassword" name="cpassword"
                        style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                <div style="">
                    <button type="submit"
                        style="background-color: #007BFF; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Sign
                        Up</button>
                </div>
            </form>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>