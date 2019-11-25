<?php
include("../includes/connect.php");

function sanitize($item){
    global $link;  //to use $link within the scope of this function, you must use the keyword "global"
    $item = html_entity_decode($item);
    $item = trim($item);
    $item = stripslashes($item);
    $item = strip_tags($item);
    $item = mysqli_real_escape_string( $link, $item );
    return $item;
}

$user_name = '';
$user_email = '';
$user_pass = false;
$pwd_length = false;
$user_level = 0;
if(isset($_REQUEST["user_name"])) { $user_name = sanitize($_REQUEST["user_name"]); }
if(isset($_REQUEST["user_email"])) { $user_email = sanitize($_REQUEST["user_email"]); }
if(isset($_REQUEST["user_level"])) { $user_level = sanitize($_REQUEST["user_level"]); }

//handle the password
//1. don't sanitize the password -- encryption removes the need
if(isset($_REQUEST["user_pass"])){ $user_pass = $_REQUEST["user_pass"]; }
//2. check the length -- we want at least 8 characters

if(strlen($user_pass) > 7){$pwd_length = true; }
//3.encrypt the password -- no need to sanitize it if encryption is used
if($pwd_length){
    //sha1 encryption:
    //$password = sha1($password);
    //php's password_hash method: (note password_hash returns false if the encryption fails)
    $user_pass = password_hash($user_pass, PASSWORD_DEFAULT);
}else{
    $user_pass = false;
}
//FIX BUG MULTIPLE RECORD BUG HERE!!!!!!
$new_account = false;
if($user_pass){
    //this block can only run if we have an 8 char password
    //and password hash did not return false
    $sql = "SELECT * FROM users
			WHERE user_email = '".$user_email."'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) < 1){$new_account = true;}
} //if $password

$success=false;
if(($user_pass)&&($new_account)){
    $sql = "INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_level`) 
		VALUES (NULL, '".$user_name."', '".$user_email."', '".$user_pass."', '".$user_level."')";

    $result = mysqli_query($link, $sql);

    if (mysqli_affected_rows($link) == 1){
        $success = true;
    }else{
        $success = false;
    }
}

if ($success){
    $user_id = mysqli_insert_id($link); //this gets the most recent "AUTO INCREMENT" id value
    session_start();
    $_SESSION["user_id"] = $user_id;
    $_SESSION["user_level"] = $user_level;
}

session_write_close();

//redraw the page
$uri = "../";
include("../includes/head.php");

?>
<main>
    <div class="login-main-wrapper">
        <div class="form-content">

            <?php
            if($success){
                echo '
				<div id="message_body">
                	<h1>Welcome, '.$user_name.'! <br> Thank you for registering!</h1>
                    <p>You are now logged in.</p>
				</div> <!-- /message body -->
                <div id="return_link">
                    <a href="../logout.php">Log Out</a><br>
                    <a href="../index.php">Return Home</a> 
                </div>  <!-- "return_link"-->';
            } else if(!$pwd_length){
                echo '
				<div id="message_body">
                	<p>The password must be at least 8 characters long.</p>
				</div> <!-- /message body -->
                <div id="return_link">
                    <a href="../register.php">Return to Registration Form</a> 
                </div>  <!-- "return_link"-->';
            } else if(!$new_account){
                    echo '
                    <div id="message_body">
                        <p>An account with this name already exists. Either login or provide another email address.</p>
                    </div> <!-- /message body -->
                    <div id="return_link">
                        <a href="../register.php">Return to Registration Form</a><br>
                        <a href="../login.php">Login</a>
                    </div>  <!-- "return_link"-->';
            } else {
                echo '
				<div id="message_body">
                	<p>There was an issue creating your account.</p>
				</div> <!-- /message body -->
                <div id="return_link">
                    <a href="../register.php">Return to Registration Form</a> 
                </div>  <!-- "return_link"-->';
            }
            ?>

        </div>
    </div>
</main>
<?php

require_once ('../includes/footer.php');

?>