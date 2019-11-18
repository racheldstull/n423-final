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
$user_pass = '';
$user_level = 0;
if(isset($_REQUEST["user_name"])) { $user_name = sanitize($_REQUEST["user_name"]); }
if(isset($_REQUEST["user_email"])) { $user_email = sanitize($_REQUEST["user_email"]); }
if(isset($_REQUEST["user_pass"])) { $user_pass = sanitize($_REQUEST["user_pass"]); }
if(isset($_REQUEST["user_level"])) { $user_level = sanitize($_REQUEST["user_level"]); }

$sql = "INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_level`) 
		VALUES (NULL, '".$user_name."', '".$user_email."', '".$user_pass."', '".$user_level."')";

$result = mysqli_query($link, $sql);

if (mysqli_affected_rows($link) == 1){
    $success = true;
}else{
    $success = false;
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
            if($user_id){
                echo '
				<div id="message_body">
                	<h1>Welcome, '.$user_name.'! Thank you for registering!</h1>
                    <p>You are now logged in.</p>
				</div> <!-- /message body -->
                <div id="return_link">
                    <a href="../logout.php">Log Out</a> 
                    <a href="../index.php">Return Home</a> 
                </div>  <!-- "return_link"-->';
            }else{
                echo '
				<div id="message_body">
                	<p>There was an issue creating you\'re account</p>
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