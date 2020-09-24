<?php 
// Asking to require the file to connect the database 
require 'connections/connect.php';

//Declaring Variables
$fname = ""; //First Name
$lname = ""; //Last Name
$em = ""; //Email
$em2 = ""; //Email2
$password = ""; //Password
$password2 = ""; //Password 2
$date = ""; //Sign Up Date
$error_array = ""; //Holds Error Messages

//If Register Button is pressed, Start handling the Form
if(isset($_POST['register_button'])){

    //Registration Form Values
    $fname = strip_tags($_POST['reg_fname']); //Remove html Tags
    $fname = str_replace(' ','', $fname); //Remove Spaces
    $fname = ucfirst(strtolower($fname)); // Upppercase First Letter, Lower Case Rest

    $lname = strip_tags($_POST['reg_lname']); //Remove html Tags
    $lname = str_replace(' ','', $lname); //Remove Spaces
    $lname = ucfirst(strtolower($lname)); // Upppercase First Letter, Lower Case Rest

    $em = strip_tags($_POST['reg_email']); //Remove html Tags
    $em = str_replace(' ','', $em); //Remove Spaces
    $em = ucfirst(strtolower($em)); // Upppercase First Letter, Lower Case Rest

    $em2 = strip_tags($_POST['reg_email2']); //Remove html Tags
    $em2 = str_replace(' ','', $em2); //Remove Spaces
    $em2 = ucfirst(strtolower($em2)); // Upppercase First Letter, Lower Case Rest

    $password = strip_tags($_POST['reg_password']); //Remove html Tags
    
    $password2 = strip_tags($_POST['reg_password2']); //Remove html Tags

    $date = Date("D.m.y,"); //Gets current date

    //Check if email-1 matches email-2
    if($em = $em2){

    }
    else {
        echo "Emails do not match!";
    }

}
?>

<!DOCTYPE hmtl>
<html>
    <head>
        <title>ParanoidPanda - Register</title>
    </head>

    <body>

        <form action="register.php" method="POST">
            <input type="text" name="reg_fname" placeholder="First Name" required>
            <br />
            <input type="text" name="reg_lname" placeholder="Last Name" required>
            <br />
            <input type="email" name="reg_email" placeholder="Email" required>
            <br />
            <input type="email" name="reg_email2" placeholder="Confirm Email" required>
            <br />
            <input type="password" name="reg_password" placeholder="Password" required>
            <br />
            <input type="password" name="reg_password2" placeholder="Confirm Password" required>
            <br />
            <input type="submit" name="register_button" value="Register">
        </form>
    
    </body>

</html>