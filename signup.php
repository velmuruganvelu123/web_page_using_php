<?php
session_start();
include("connect.php");
include("function.php");

$errors = [];

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_nos'];
    $gender =$_POST['gender'] ?? '';
    $password = $_POST['password'];    


    if (empty($user_name)) {
        $errors[] = "User name is required.";
    } elseif (is_numeric($user_name)) {
        $errors[] = "Username cannot be numeric.";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $user_name)) {
        $errors[] = "Username must be 3–20 chars, letters, numbers, underscore only.";
    }
    echo "hi";

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($phone_number)) {
        $errors[] = "Phone number is required.";
    } elseif (!preg_match('/^[0-9]{10}$/', $phone_number)) {
        $errors[] = "Phone number must be 10 digits.";
    }

    if (empty($gender)) {
        $errors[] = "Gender is required.";
    } elseif (!in_array($gender, ['male', 'female', 'other'])) {
        $errors[] = "Invalid gender selected.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    } elseif (!preg_match('/[A-Z]/', $password)) {
        $errors[] = "Password must contain at least one uppercase letter.";
    } elseif (!preg_match('/[a-z]/', $password)) {
        $errors[] = "Password must contain at least one lowercase letter.";
    } elseif (!preg_match('/[0-9]/', $password)) {
        $errors[] = "Password must contain at least one number.";
    } elseif (!preg_match('/[^A-Za-z0-9]/', $password)) {
        $errors[] = "Password must contain at least one special character.";
    }
   
    if(empty($errors)){
        $user_id = random_num(10);
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $query ="insert into login_users (user_id, user_name, email, phone_number, gender, password) values ('$user_id', '$user_name', '$email', '$phone_number', '$gender', '$password')";
        // print_r($query);
        if(mysqli_query($conn, $query)) {
        header("Location: login.php");
        exit;
        }

    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body class="bg-light vh-100">
    <div class="container vh-100">
        <div class="row align-items-center vh-100">
            <div class="col-lg-5 mx-auto">
                <div class="bg-white p-5 rounded shadow">
                    <form method="POST" action="">
                        <div class="text-center">
                            <h4>Signup</h4>
                        </div>
                        <?php if (!empty($errors)) : ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach($errors as $e): ?>
                                    <li><?php echo $e; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                        <div class="mb-3">
                            <label class="form-label">User name </label>
                            <input type="text" class="form-control <?php echo isset($errors['user_name']) ? 'is-invalid' : ''; ?>" name="user_name" value="<?php echo $user_name ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?php echo $errors['user_name'] ?? ''; ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">email </label>
                            <input type="email" class="form-control <?php echo isset($errors['user_name']) ? 'is-invalid' : ''; ?>"  name="email" value="<?php echo $email ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?php echo $errors['email'] ?? '';  ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label <?php echo isset($errors['phone_number']) ? 'is-invalid' : ''; ?> ">phone number </label>
                            <input type="phone_nos" class="form-control"  name="phone_nos" value="<?php echo $phone_number ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?php echo $errors['phone_number'] ?? '';  ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender</label>

                            <div class="form-check">
                                <label class="form-check-label">Male</label>
                                <input class="form-check-input <?php echo isset($errors['gender']) ? 'is-invalid' : ''; ?>" type="radio" name="gender" value="male"
                                 <?php echo isset($gender) && $gender=="male" ? 'checked' : ''; ?>>
                            </div>

                            <div class="form-check">
                                <label class="form-check-label">Female</label>
                                <input class="form-check-input <?php echo isset($errors['gender']) ? 'is-invalid' : ''; ?>" type="radio" name="gender" value="female"
                                <?php echo isset($gender) && $gender=="female" ? 'checked' : ''; ?>>
                            </div>

                            <div class="form-check">
                                <label class="form-check-label">Other</label>
                                <input class="form-check-input <?php echo isset($errors['gender']) ? 'is-invalid' : ''; ?>" type="radio" name="gender" value="other"
                                 <?php echo isset($gender) && $gender=="other" ? 'checked' : ''; ?>>      
                                <div class="invalid-feedback">
                                    <?php echo $errors['gender'] ?? ''; ?>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password"
                                   class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>" name="password">                                   
                            <div class="invalid-feedback">
                                <?php echo $errors['password'] ?? ''; ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button><br><br>
                        <a href="login.php">Clicked to login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
