<?php
$server = 'localhost';
$username = 'root';
$password = 'velu@1234';
$db_name = 'travel';
$conn = new mysqli($server, $username, $password, $db_name);
if($conn->connect_error){
    die('connection  failed'.$conn->connect_error);
}else{
  
  $stmt =  $conn->prepare("INSERT INTO customer(first_name, last_name, company_email, phone_number, country, message) VALUES(?,?,?,?,?,?)");
  // print_r($stmt);
  $stmt->bind_param("ssssss", $first_name, $last_name, $company_email, $phone_number, $country, $message);
  // print_r($stmt);
  $stmt->execute();
  echo"Customer is added sucessfully";
  $stmt->close();
  $conn->close();
}

?>