<?php
ob_start(); //Turns on output buffering
session_start(); //Start a session to allow variable to save

$timezone = date_default_timezone_set("Europe/London");

$servername = "localhost";
$username = "root";
$password = "";
$db = "paranoidpanda";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>