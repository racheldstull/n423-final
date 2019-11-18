<?php

session_start(); //open the session to identify it
unset($_SESSION);//delete any session variables
session_destroy();//kill the session

// create page title value
$uri = "";
$page_title = "Home";

// create requires for the header and database
require_once ('includes/connect.php');
require_once ('includes/head.php')

?>

<main>
    <div class="login-main-wrapper">
        <div class="form-content">
            <div id="message_body">
                <p>You are now logged out.</p>
                <p>Have a nice day!</p>
            </div> <!-- /message body -->
            <div id="return_link">
                <a href="login.php">Return to Login Form</a>
            </div>  <!-- "return_link"-->
        </div>
    </div>
</main>

<?php

require_once ('includes/footer.php');

?>



