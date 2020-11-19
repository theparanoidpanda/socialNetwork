<?php
require 'connections/connect.php';

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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

    </head>

    <body>
        <p>Hi  All</p>
</html>