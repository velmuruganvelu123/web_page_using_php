<?php
session_start();
include("connect.php");
include("function.php");

$errors =[];

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user_name = $_POST['user_name'];    
    $password = $_POST['password'];

    if(empty($user_name) || is_numeric($user_name)){
        $errors['user_name'] = "invalid Username and Username cannot be numeric.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $user_name)) {
        $errors['user_name'] = "Username must be chars, letters, numbers, underscore only.";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } elseif (strlen($password) < 8) {
        $errors['password'] = "Password must be at least 8 characters long.";
    } elseif (!preg_match('/[A-Z]/', $password)) {
        $errors['password'] = "Password must contain at least one uppercase letter.";
    } elseif (!preg_match('/[a-z]/', $password)) {
        $errors['password'] = "Password must contain at least one lowercase letter.";
    } elseif (!preg_match('/[0-9]/', $password)) {
        $errors['password'] = "Password must contain at least one number.";
    } elseif (!preg_match('/[^A-Za-z0-9]/', $password)) {
        $errors['password'] = "Password must contain at least one special character.";
}
   
    if(empty($errors) ){
        $user_id = random_num(10);
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        // print_r($password_hash);
        $query ="SELECT * from login_users where user_name = '$user_name' limit 1";
        // print_r($query);
        $result = mysqli_query($conn, $query);
        if($result) {
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);
                if($user_data['password'] === $password){
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: web.php");
                    die;
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                            <h4>Login</h4>
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">User name </label>
                            <input type="text" class="form-control <?php echo isset($errors['user_name']) ? 'is-invalid' : ''; ?>" name="user_name" value="<?php echo $user_name ?? ''; ?>">
                            
                            <div class="invalid-feedback">
                               <?php echo $errors['user_name'] ?? ''; ?>
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
                        <a href="signup.php">Clicked to Signup</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
