<?php
include 'partials/header.php';

$firstname = $_SESSION['add-user-data']['firstname'] ?? null;
$lastname = $_SESSION['add-user-data']['lastname'] ?? null;
$username = $_SESSION['add-user-data']['username'] ?? null;
$email = $_SESSION['add-user-data']['email'] ?? null;
$createpassword = $_SESSION['add-user-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['add-user-data']['confirmpassword'] ?? null;

// delete session data
unset($_SESSION['add-user-data']);


?>




        <section class="form__section">
            <div class="container form__section-container">
                <h2>ADD User</h2>
                <?php if (isset($_SESSION['add-user'])) : ?>
                        <div class="alert__message error">
                            <p>
                                <?= $_SESSION['add-user'];
                                unset($_SESSION['add-user']);
                                ?>
                            </p>
                        </div>
                
                <?php endif ?>
                <form action="<?= ROOT_url ?>admin/add-user-logic.php"  enctype="multipart/form-data" method="post">
                    <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="First Name">
                    <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Last Name">
                    <input type="text" name="username" value="<?= $username ?>" placeholder="User Name">
                    <input type="email" name="email" value="<?= $email ?>" placeholder="Email">
                    <input type="password" name="createpassword" value="<?= $createpassword ?>" placeholder="Create Password">
                    <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Confirm Password">
                    <select name="userrole" >
                        <option value="0">Author</option>
                        <option value="1">Admin</option>
                    </select>
                    <div class="form__control">
                        <label for="avatar">Use Avatar</label>
                        <input type="file" id="avatar" name="avatar">
                    </div>
                    <button type="submit" name="submit" class="btn">Add User</button>
                </form>
            </div>
        </section>




<?php
include '../partials/footer.php';
?>