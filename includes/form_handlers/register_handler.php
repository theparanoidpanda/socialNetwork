<?php

//Declaring Variables
$fname = ""; //First Name
$lname = ""; //Last Name
$em = ""; //Email
$em2 = ""; //Email2
$password = ""; //Password
$password2 = ""; //Password 2
$date = ""; //Sign Up Date
$error_array = array(); //Holds Error Messages

//If Register Button is pressed, Start handling the Form
if(isset($_POST['register_button'])){

    //Registration Form Values
    $fname = strip_tags($_POST['reg_fname']); //Remove html Tags
    $fname = str_replace(' ','', $fname); //Remove Spaces
    $fname = ucfirst(strtolower($fname)); // Upppercase First Letter, Lower Case Rest
    $_SESSION['reg_fname'] = $fname; // Stores first name into session variable

    $lname = strip_tags($_POST['reg_lname']); //Remove html Tags
    $lname = str_replace(' ','', $lname); //Remove Spaces
    $lname = ucfirst(strtolower($lname)); // Upppercase First Letter, Lower Case Rest
    $_SESSION['reg_lname'] = $lname; // Stores last name into session variable

    $em = strip_tags($_POST['reg_email']); //Remove html Tags
    $em = str_replace(' ','', $em); //Remove Spaces
    $em = ucfirst(strtolower($em)); // Upppercase First Letter, Lower Case Rest
    $_SESSION['reg_email'] = $em; // Stores email into session variable

    $em2 = strip_tags($_POST['reg_email2']); //Remove html Tags
    $em2 = str_replace(' ','', $em2); //Remove Spaces
    $em2 = ucfirst(strtolower($em2)); // Upppercase First Letter, Lower Case Rest
    $_SESSION['reg_email2'] = $em2; // Stores email 2 into session variable

    $password = strip_tags($_POST['reg_password']); //Remove html Tags
    
    $password2 = strip_tags($_POST['reg_password2']); //Remove html Tags

    $date = Date("D.m.y,"); //Gets current date

    //Check if both emails match
    if($em = $em2){
        //Check if email is in valid format
        if(filter_var($em, FILTER_VALIDATE_EMAIL)){
            $em = filter_var($em, FILTER_VALIDATE_EMAIL);

            //Check if email already exsists
            $e_check = mysqli_query($conn, "SELECT email FROM users WHERE email='$em'");

            //Count number of rows returned
            $num_rows = mysqli_num_rows($e_check);

            if($num_rows > 0) {
                array_push($error_array, "Email already in use! <br />");
            }
        }
        else{
            array_push($error_array, "Invalid Email Format! <br />");
        }
    }

    else {
        array_push($error_array, "Emails do not match! <br />");
    }

    //check length of first name
    if(strlen($fname) > 30 || strlen($fname) < 2) {
        array_push($error_array, "Your first name must be between 2 and 30 characters! <br />");
    }

    //check length of last name
    if(strlen($lname) > 30 || strlen($lname) < 2) {
        array_push($error_array, "Your last name must be between 2 and 30 characters! <br />");
    }
    
    //Check if password Match
    if($password != $password2){
        array_push($error_array, "Your passwords do not match! <br />");
    }
    //Check what characters are used in choosen password
    else{
        if(preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($error_array, "Your password can only contain english Characters or numbers! <br />");
        }
    }
    //Check that password stays within given character limit
    if(strlen($password > 30 || strlen($password) < 5 )) {
        array_push($error_array, "Your password must be between 5 and 30 characters! <br />");
    }

    if(empty($error_array)){
        $password = md5($password); //Encrypt Password before sending to daabase

        //Generate username by concatenating first name and last name
        $username = strtolower($fname . "_" . $lname);
        $check_username_query = mysqli_query($conn, "SELECT username FROM users WHERE username='$username'");

        $i = 0;
        //if username exsists add number to username
        while(mysqli_num_rows($check_username_query) != 0) {
            $i++; //Add 1 to 1
            $username = $username . "_" . $i;
            $check_username_query = mysqli_query($conn, "SELECT username FROM users WHERE username='$username'");
        }

        //Assign a profile pic
        $rand = rand(1,2); // Random number bewteen 1 and 2

        if($rand = 1)
            $profile_pic = "assets/images/profile_pics/defaults/head_red.png";
        else if($rand = 2)
        $profile_pic = "assets/images/profile_pics/defaults/head_deep_blue.png";

        //Send information to database
        $query = mysqli_query($conn, "INSERT INTO users VALUES ('', '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");
        
        //Confirmation message, using error array as already configured. 
        array_push($error_array, "<span style='color: #ff0000;'>Registration Completed!</span><br />");

        //Clear session variables if registration is complete
        $_SESSION['reg_fname'] = "";
        $_SESSION['reg_lname'] = "";
        $_SESSION['reg_email'] = "";
        $_SESSION['reg_email2'] = "";

    }
}
    
?>