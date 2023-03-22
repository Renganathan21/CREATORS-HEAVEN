<?php
require 'config/constants.php';
// $firstname = $_SESSION['signup-data']['firstname'];
$firstname = $_SESSION['signup-data']['firstname'] ?? null;
$lastname = $_SESSION['signup-data']['lastname'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;

unset($_SESSION['signup-data']);


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>
            Blog Website
        </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?= ROOT_url ?>css/Style.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <section class="form__section">
            <div class="container form__section-container">
                <h2>Sign Up</h2>
                <?php
                    if(isset($_SESSION['signup'])): ?>
                    <div class="alert__message error">
                        <p> <?= $_SESSION['signup'];
                        unset($_SESSION['signup']);
                            ?> 
                        </p>


                    </div>
    
                <?php endif ?>
                <form action="<?=ROOT_url ?>signup-logic.php" method="post" enctype="multipart/form-data">
                    <input type="text" placeholder="First Name" value="<?= $firstname ?>" name="firstname">
                    <input type="text" placeholder="Last Name" value="<?= $lastname?>" name="lastname">
                    <input type="text" name="username" value="<?= $username?>" placeholder="User Name" >
                    <input type="email" name="email" value="<?= $email?>" placeholder="Email">
                    <input type="password" name="createpassword" value="<?= $createpassword?>" placeholder="Create Password">
                    <input type="password" name="confirmpassword" value="<?= $confirmpassword?>" placeholder="Confirm Password">
                    <div class="form__control">
                        <label for="avatar">Use Avatar</label>
                        <input type="file" name="avatar"   id="avatar">
                    </div>
                    <button type="submit" name="submit" class="btn">Sign Up</button>
                    <small>Already have an account ? <a href="signin.php">Sign In</a></small>
                </form>
            </div>
        </section>
    </body>
</html>