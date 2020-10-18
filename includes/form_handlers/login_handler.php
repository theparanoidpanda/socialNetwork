<?php

if(isset($_POST['login_button'])){

    //Sanitize email
    $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL);
    //Store email into session variable
    $_SESSION['log_email'] = $email;
    //Get password
    $password = md5($_POST['log_password']);

    $check_database_query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    $check_login_query = mysqli_num_rows($check_database_query);

    if($check_login_query = 1){
        $row= myqli_fetch_array($check_database_query);
        $username = $row['username'];

        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    }
}
?>