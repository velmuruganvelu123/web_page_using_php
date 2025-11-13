<?php include("function.php")?>
<?php 
$title = "contact_page";
include("static/include/header.php");
?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-sm-4">
                <h2>Talk with our team</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis, voluptates odit. Illo alias tempora doloremque voluptatum dolores impedit blanditiis. Explicabo harum, qui libero illum facere provident totam obcaecati minus unde!</p>
                <img class="img-fluid" src="static/img/mountain_image.jpg" width="500px" height="250px" alt="">
            </div>
            <div class="col-12 col-md-6 col-sm-3 pt-3 pb-3">
                <?php if (!empty($alert_message)): ?>
                    <div class="alert alert-<?php echo ($alert_type == 'success') ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
                        <?php echo $alert_message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                               
                <form action="contact.php" method="POST">
                    <div class="form-group pb-3">
                        <label>First Name:</label>
                        <input type="text" name="fname" 
                            class="form-control <?php echo $firstname_err ? 'is-invalid' : ''; ?>" 
                            value="<?php echo htmlspecialchars($first_name); ?>">
                        <?php if ($firstname_err): ?>
                            <div class="invalid-feedback"><?php echo $firstname_err; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group pb-3">
                        <label for="lname">Last Name :</label>
                        <input type="text" name="lname"  class="form-control <?php echo $lastname_err ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($last_name); ?>"> <?php if ($lastname_err): ?>
                        <div class="invalid-feedback">
                            <?php echo $lastname_err; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group pb-3">
                        <label for="email">Company Email :</label>
                        <input type="text" name="email" class="form-control <?php echo $email_err ? 'is-invalid' : ''; ?>"value="<?php echo htmlspecialchars($company_email); ?>"> <?php if ($email_err): ?>
                        <div class="invalid-feedback">
                            <?php echo $email_err; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group pb-3">
                        <label for="phone_nos">Phone Number :</label>
                        <input name="phone_nos" type="text" class="form-control <?php echo $phonenos_err ? 'is-invalid' : ''; ?>"  value="<?php echo htmlspecialchars($phone_number); ?>">
                        <?php if ($phonenos_err): ?>
                        <div class="invalid-feedback">
                            <?php echo $phonenos_err; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group pb-3">
                        <label for="country">Country :</label>
                        <input type="text" name="country" class="form-control <?php echo $countryerr ? 'is-invalid' : ''; ?>"   value="<?php echo htmlspecialchars($country); ?>">
                        <?php if ($countryerr): ?>
                        <div class="invalid-feedback">
                            <?php echo $countryerr; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group pb-3">
                        <label for="message">Message:</label>
                        <textarea  name="message" class="form-control <?php echo $message_Err ? 'is-invalid' : ''; ?>" placeholder="Leave a comment here">
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
