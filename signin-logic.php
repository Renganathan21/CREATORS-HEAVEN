<?php
require 'config/database.php';
if(isset($_POST['submit'])){

    $username_email = filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $passsword = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$username_email){
        $_SESSION['signin'] = "Username or email is required ";

    }elseif(!$passsword){
        $_SESSION['signin'] = "Password Required";
    }
    else{
        $fetch_user_query = "SELECT * FROM users WHERE username='$username_email' OR email='$username_email'";
        $fetch_user_result = mysqli_query($connection, $fetch_user_query);

        if(mysqli_num_rows($fetch_user_result) == 1){
            //conversion 
            $user_record = mysqli_fetch_assoc($fetch_user_result);
            $db_password = $user_record['password'];
            //comparision
            if(password_verify($passsword,$db_password)){
                //user found set session 
                $_SESSION['user-id'] = $user_record['id'];
                //admin or not 
                if($user_record['is_admin'] == 1) {
                    $_SESSION['user_is_admin'] = true;

                } 


                // log in 

                header('location: ' . ROOT_url . 'admin/');

            } else{
                $_SESSION['signin'] = "Password doesn't match ";
            }

        }else{
            $_SESSION['signin'] = "User not found";
        }
    }

    //if any problem redirect 

    if(isset($_SESSION['signin'])){
        $_SESSION['signin-data'] = $_POST;
        header('location: ' . ROOT_url . 'signin.php');
        die();
    }

}else {
    header('location: ' . ROOT_url . 'signin.php');
    die();
}
?>