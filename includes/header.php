<?php
// Required Files
require 'connections/connect.php';

//Session Check using variables from Login Handler. If unnsuccessful redirect.
if(isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($conn, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}
else {
    header("Location: register.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Paranoid Panda - Social</title>
        <!-- Javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    </head>

    <body>
        <div class="top_bar">
            <div class="logo">
                <a href="index.php">PARANOID PANDA</a>
            </div>

            <nav>
                <a href="#">
                    <?php echo $user['first_name'] ?>
                </a>
                <a href="index.php">
                    <span class="material-icons">home</span>
                </a>
                <a href="#">
                    <span class="material-icons">message</span>
                </a>
                <a href="#">
                    <span class="material-icons">group</span>
                </a>
                <a href="#">
                    <span class="material-icons">settings</span>
                </a>
                <a href="#">
                    <span class="material-icons">exit_to_app</span>
                </a>
            </nav>
        </div>
        <br />

           
        <div class="wrapper">