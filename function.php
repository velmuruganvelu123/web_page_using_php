<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $company_email = $_POST["email"];
    $phone_number = $_POST["pnos"];
    $country = $_POST["country"];
    $message = $_POST["message"];
    // print_r($_POST);
}
else{
    echo"Form not submitted";
}
include("connect.php");
?>