<?php
$firstname_err = $lastname_err = $email_err = $phonenos_err = $countryerr = $message_Err = "";
$first_name = $last_name = $company_email = $phone_number = $country = $message = "";

$form_valid = true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['fname'])) {
        $firstname_err = "First name is required";
    } else {
        $first_name = input_data($_POST['fname']);
        if (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
            $firstname_err = "Only alphabets and word space are allowed";
            $form_valid = false;
        }
    }

    if (empty($_POST['lname'])) {
        $lastname_err = "Last name is required";
        $form_valid = false;
    } else {
        $last_name = input_data($_POST['lname']);
        if (!preg_match("/^[a-zA-Z ]*$/", $last_name)) {
            $lastname_err = "Only alphabets and word space are allowed";
            $form_valid = false;
        }
    }

    if (empty($_POST['email'])) {
        $email_err = "email id is required";
        $form_valid = false;
    } else {
        $company_email = input_data($_POST["email"]);
        if (!filter_var($company_email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Email is not allowed";
            $form_valid = false;
        }
    }

    if (empty($_POST['phone_nos'])) {
        $phonenos_err = "phone number is required";
        $form_valid = false;
    } else {
        $phone_number = input_data($_POST["phone_nos"]);
        if (!preg_match('/^[0-9]{10}+$/', $phone_number)) {
            $phonenos_err  = "Mobile must contain 10 digits";
            $form_valid = false;
        }
    }
    // echo '$form_valid';

    if (empty($_POST['country'])) {
        $countryerr = "country  is required";
        $form_valid = false;
    } else {
        $country = input_data($_POST["country"]);
    }

    if (empty($_POST['message'])) {
        $message_Err = "message is required";
        $form_valid = false;
    } else {
        $message = input_data($_POST["message"]);
    }

    if ($form_valid) {
        include("connect.php");
        try {
            $stmt =  $conn->prepare("INSERT INTO customer(first_name, last_name, company_email, phone_number, country, message) VALUES(?,?,?,?,?,?)");
            // print_r($stmt);

            $stmt->bind_param("ssssss", $first_name, $last_name, $company_email, $phone_number, $country, $message);
            //   print_r($stmt);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            $alert_message = "Customer is added successfully";
            $alert_type = "success";
        } catch (mysqli_sql_exception  $e) {
            $alert_message = "Database error: " . $e->getMessage();
            $alert_type = "error";
        }
       
    }
} else {
    echo "submitted via a different method";
}

function input_data($data)
{
    $data = trim($data);
    // print_r($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
