<?php

// create page title value
$uri = "";
$page_title = "Home";

// create requires for the header and database
require_once ('includes/connect.php');
require_once ('includes/head.php');

?>

<main>
    <div class="login-main-wrapper">
        <div class="form-content">
            <form id="register_form" class="form-horizontal" method="post" action="process/register.php">
                <h1>Register</h1>
                <div class="form-group">
                    <label for="user_name" class="label-container"><i class="fas fa-user"></i></label>
                    <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Username" required/ >
                </div>
                <p class="notice">You're username should not be you're real name and should not contain any personal information.</p>

                <div class="form-group">
                    <label for="user_email" class="label-container"><i class="fas fa-envelope"></i></label>
                    <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Email" required/ >
                </div>

                <div class="form-group">
                    <label for="user_pass" class="label-container"><i class="fas fa-key"></i></label>
                    <input type="password" class="form-control" name="user_pass" id="user_pass" placeholder="Password" required/ >
                </div>

                <div class="role-select">
                    <label for="user_level" class="label-container">Who Are You?</label>
                    <label><input type="radio" id="role_3" name="user_level" value="3" checked> Looking for recovery</label>
                    <label><input type="radio" id="role_1" name="user_level" value="1" > Friend/Family</label>
                    <label><input type="radio" id="role_2" name="user_level" value="2"> Community Contributor</label>
                </div>

                <div class="submit">
                    <input type="submit" />
                </div>

                <div class="register">
                    <p>Already have an account? &nbsp;</p>
                    <a href="register.php">Sign in!</a>
                </div>
            </form>
        </div>
    </div>
</main>

<?php

require_once ('includes/footer.php');

?>

