<?php 
//Start a session to allow variable to save
session_start();

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
                array_push($error_array, "Email already in use <br />");
            }
        }
        else{
            echo "Invalid Format";
        }
    }

    else {
        echo "Emails do not match!";
    }

    //check length of first name
    if(strlen($fname) > 30 || strlen($fname) < 2) {
        echo "Your first name must be between 2 and 30 characters!";
    }

    //check length of last name
    if(strlen($lname) > 30 || strlen($lname) < 2) {
        echo "Your first name must be between 2 and 30 characters!";
    }
    
    //Check if password Match
    if($password != $password2){
        echo "Your passwords do not match!";
    }
    //Check what characters are used in choosen password
    else{
        if(preg_match('/[^A-Za-z0-9]/', $password)) {
            echo "Your password can only contain English Characters or numbers!";
        }
    }
    //Check that password stays within given character limit
    if(strlen($password > 30 || strlen($password) < 5 )) {
        echo "Your password must be between 5 and 30 characters";
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
            <input type="text" name="reg_fname" placeholder="First Name" value="<?php 
            if(isset($_SESSION['reg_fname'])) { 
                echo $_SESSION['reg_fname']; 
                } 
                ?>" required>
            <br />
            <input type="text" name="reg_lname" placeholder="Last Name" value="<?php 
            if(isset($_SESSION['reg_lname'])) { 
                echo $_SESSION['reg_lname']; 
                } 
                ?>"required>
            <br />
            <input type="email" name="reg_email" placeholder="Email" value="<?php 
            if(isset($_SESSION['reg_email'])) { 
                echo $_SESSION['reg_email']; 
                } 
                ?>"required>
            <br />
            <input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php 
            if(isset($_SESSION['reg_email2'])) { 
                echo $_SESSION['reg_email2']; 
                } 
                ?>"required>
            <br />
            <input type="password" name="reg_password" placeholder="Password" required>
            <br />
            <input type="password" name="reg_password2" placeholder="Confirm Password" required>
            <br />
            <input type="submit" name="register_button" value="Register">
        </form>

    </body>
</html>