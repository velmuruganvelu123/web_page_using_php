<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact</title>
</head>

<body>
    <?php include("static/include/header.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-sm-4">
                <h2>Talk with our team</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis, voluptates odit. Illo alias tempora doloremque voluptatum dolores impedit blanditiis. Explicabo harum, qui libero illum facere provident totam obcaecati minus unde!</p>
                <img class="img-fluid" src="static/img/mountain_image.jpg" width="500px" height="250px" alt="">
            </div>
            <div class="col-12 col-md-6 col-sm-3 pt-3 pb-3">
               
                <form action="function.php" method="POST">
                    <div class="form-group pb-3">
                        <label for="fname">First Name :</label>
                        <input class="form-control" type="text" name="fname" id="fname" placeholder="Enter the first name">
                        <div class="invalid-feedback">
                            <?php echo $firstname_err; ?>
                        </div>

                    </div>
                    <div class="form-group pb-3">
                        <label for="lname">Last Name :</label>
                        <input class="form-control" type="text" name="lname" id="lname" placeholder="Enter the last name">
                        <div class="invalid-feedback">
                            <?php echo $lastname_err; ?>
                        </div>
                    </div>
                    <div class="form-group pb-3">
                        <label for="email">Company Email :</label>
                        <input class="form-control" type="text" name="email" id="email" placeholder="Enter the email_id">
                        <div class="invalid-feedback">
                            <?php echo $email_err; ?>
                        </div>
                    </div>
                    <div class="form-group pb-3">
                        <label for="pnos">Phone Number :</label>
                        <input class="form-control" type="text" name="pnos" id="pnos" placeholder="Enter the phone number">
                        <div class="invalid-feedback">
                            <?php echo $phonenos_err; ?>
                        </div>
                    </div>
                    <div class="form-group pb-3">
                        <label for="country">Country :</label>
                        <input class="form-control" type="text" name="country" id="country" placeholder="Please select your country">
                        <div class="invalid-feedback">
                            <?php echo $countryerr; ?>
                        </div>
                    </div>
                    <div class="form-group pb-3">
                        <label for="message">Message:</label>
                        <textarea class="form-control" placeholder="Leave a comment here" name="message" id="floatingTextarea">
                        </textarea>
                        <div class="invalid-feedback">
                            <?php echo $message_Err; ?>
                        </div>

                    </div>
                    <div class="form-group pb-3">
                        <input type="checkbox" id="checkbox" name="checkbox">
                        <label for="checkbox"> your agree to term and condition.</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div> 
    <?php include("static/include/footer.php");?>

</body>

</html>