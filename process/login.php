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

$user_email = '';
$user_pass = '';
if(isset($_REQUEST["user_email"])) { $user_email = sanitize($_REQUEST["user_email"]); }
if(isset($_REQUEST["user_pass"])) { $user_pass = $_REQUEST["user_pass"]; }

$user_id = 0; //this will be the id from the user table record
$role = 0; //this will be the role value from the user table record

$sql = "SELECT * FROM users
			WHERE user_email = '".$user_email."'";
$result = mysqli_query($link, $sql);

$existing_account = false;
$success = false;
if (mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
    $pwd_hash = $row["user_pass"];
    $success = password_verify($user_pass, $pwd_hash);
    $existing_account = true;
} else {
    $success = false;
}

if ($success){
    $user_id = $row["user_id"]; //we will use this to determine if there is a log-in
    $user_name = $row["user_name"];
    $user_level = $row["user_level"];
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
                	<h1>Welcome, '.$user_name.'!</h1>
                    <p>You are now logged in.</p>
				</div> <!-- /message body -->
                <div id="return_link">
                    <a href="../logout.php">Log Out</a> 
                </div>  <!-- "return_link"-->';
    }else if(!$existing_account) {
        echo '
				<div id="message_body">
                	<p>Email does not match our records.</p>
				</div> <!-- /message body -->
                <div id="return_link">
                    <a href="../register.php">Create an account</a> <br>
                    <a href="../login.php">or try again.</a> 
                </div>  <!-- "return_link"-->';
    } else if(!$success) {
        echo '
				<div id="message_body">
                	<p>Password does not match our records.</p>
				</div> <!-- /message body -->
                <div id="return_link">
                    <a href="../login.php">Try again.</a> 
                </div>  <!-- "return_link"-->';
    } else {
        echo '
				<div id="message_body">
                	<p>There was an error on our end. Please try again.</p>
				</div> <!-- /message body -->
                <div id="return_link">
                    <a href="../login.php">Try again.</a> 
                </div>  <!-- "return_link"-->';
    }

    ?>

        </div>
    </div>
</main>
<?php

require_once ('../includes/footer.php');

?>