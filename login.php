<?php

// create page title value
$uri = "";
$page_title = "Login";

// create requires for the header and database
require_once ('includes/connect.php');
require_once ('includes/head.php');

?>

<main>
    <div class="login-main-wrapper">
        <div class="form-content">
            <form id="login_form" class="form-horizontal" method="post" action="process/login.php">
                <h1>Sign In</h1>
                <div class="form-group">
                    <label for="user_email" class="label-container"><i class="fas fa-envelope"></i></label>
                    <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Email" required/ >
                </div>

                <div class="form-group">
                    <label for="user_pass" class="label-container"><i class="fas fa-key"></i></label>
                    <input type="password" class="form-control" name="user_pass" id="user_pass" placeholder="Password" required/ >
                </div>

                <div class="submit">
                    <input type="submit" />
                </div>

                <div class="register">
                    <p>Not a member?&nbsp;<a href="register.php">Sign up now!</a></p>
                    <p>Forgot password?&nbsp;<a href="forgot.php">Reset password.</a></p>
                </div>
            </form>
        </div>
    </div>
</main>

<?php

require_once ('includes/footer.php');

?>



