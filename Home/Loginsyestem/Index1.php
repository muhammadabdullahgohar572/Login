<?php


session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {

    header("location: ./Loginsystem.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username'] ?>< /title>
</head>

<body>
    <?php require "./Navbar.php" ?>
    <!-- <h1>Welcome <?php echo $_SESSION['username'] ?></h1> -->

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Welcome <?php echo $_SESSION['username'] ?></h4>
        <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer
            so that you can see how spacing within an alert works with this kind of content.</p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure logout <a href="./Logout.php">Using This Link</a> </p>
    </div>
    <!-- 
    git remote add origin https://github.com/muhammadabdullahgohar572/Login.git
    git branch -M main
    git push -u origin main -->
</body>

</html>