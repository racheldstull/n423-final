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
            <form id="login_form" class="form-horizontal" method="post" action="process/forgot.php">
                <h1>Reset Password</h1>
                <div class="form-group">
                    <label for="email" class="label-container"><i class="fas fa-envelope"></i></label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required/ >
                </div>

                <div class="submit">
                    <input type="submit" />
                </div>

                <div class="register">
                    <p>Remember?&nbsp;<a href="login.php">Sign in.</a></p>
                </div>
            </form>
        </div>
    </div>
</main>

<?php

require_once ('includes/footer.php');

?>



