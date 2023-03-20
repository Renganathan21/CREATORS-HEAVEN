<?php

require 'config/constants.php';

$username_email = $_SESSION['signin-data']['username_email'] ?? null;
$password = $_SESSION['signin-data']['password']?? null;
unset($_SESSION['signin-daata']);
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
        <link rel="stylesheet" href="css/Style.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <section class="form__section">
            <div class="container form__section-container">
                <h2>Sign in</h2>
                <?php if(isset($_SESSION['signup-success'])) : ?>
                    <div class="alert__message success">
                        <p>
                            <?= $_SESSION['signup-success']; 
                            unset($_SESSION['signup-success']) ?>
                        </p>
                    </div>
                
                <?php elseif (isset($_SESSION['signin'])) : ?>
                    <div class="alert__message error">
                        <p>
                            <?= $_SESSION['signin']; 
                            unset($_SESSION['signin']) ?>
                        </p>
                    </div>
                <?php endif ?>
                <form action="<?= ROOT_url?>signin-logic.php" method="post">
                    <input type="text" name="username_email" value="<?= $username_email?>" placeholder="UserName Or Email">
                    <input type="password" name="password" value="<?= $password ?>" placeholder="Password">
                    <button type="submit" name="submit" class="btn">Sign In</button>
                    <small>Don't have an account ? <a href="signup.php">Sign up</a></small>
                </form>
            </div>
        </section>
    </body>
</html>