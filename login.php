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
            <form id="login_form" class="form-horizontal" method="post" action="process/login.php">
                <h1>Sign In</h1>
                <div class="form-group">
                    <label for="email" class="label-container"><i class="fas fa-envelope"></i></label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required/ >
                </div>

                <div class="form-group">
                    <label for="password" class="label-container"><i class="fas fa-key"></i></label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required/ >
                </div>

                <div class="submit">
                    <input type="submit" />
                </div>

                <div class="register">
                    <p>Not a member? &nbsp;</p>
                    <a href="register.php">Sign up now!</a>
                </div>
            </form>
        </div>
    </div>
</main>

<?php

require_once ('includes/footer.php');

?>



