<?php
// Required Files
require 'connections/connect.php';

//Session Check using variables from Login Handler. If unnsuccessful redirect.
if(isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
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
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    </head>

    <body>
        <div class="top_bar">
            <div class="logo">
                <a href="index.php">THE PANDA LAB</a>
            </div>
        </div>
        <p>This is some text</p>
    </body>
</html>