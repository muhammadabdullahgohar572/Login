<?php


session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {

    header("location: login.php");
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
    <h1>Welcome <?php echo $_SESSION['username'] ?></h1>
    <!-- 
    git remote add origin https://github.com/muhammadabdullahgohar572/Login.git
    git branch -M main
    git push -u origin main -->
</body>

</html>