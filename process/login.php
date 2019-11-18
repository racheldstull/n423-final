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

$email = '';
$password = '';
if(isset($_REQUEST["email"])) { $email = sanitize($_REQUEST["email"]); }
if(isset($_REQUEST["password"])) { $password = $_REQUEST["password"]; }

$user_id = 0; //this will be the id from the user table record
$role = 0; //this will be the role value from the user table record

$query = "SELECT user_id, user_name, user_level from users
		  WHERE user_email = '".$email."'
		  AND user_pass = '".$password."'";
$result = mysqli_query($link, $query);



//$success = false;
//if (mysqli_num_rows($result) == 1){
//    echo '<p>not broken here</p>';
//    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
//    $pwd_hash = $row["user_pass"];
//    if(password_verify($password, $pwd_hash)){
//        $success = true;
//    } else {
//        $success = false;
//    }
//}


if (mysqli_num_rows($result) == 1){
    $success = true;
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
    $pwd_hash = $row["user_pass"];
    echo '<p>not broken here</p>';
}else{
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
    if($user_id){
        echo '
				<div id="message_body">
                	<h1>Welcome, '.$user_name.'!</h1>
                    <p>You are now logged in.</p>
				</div> <!-- /message body -->
                <div id="return_link">
                    <a href="../logout.php">Log Out</a> 
                </div>  <!-- "return_link"-->';
    }else{
        echo '
				<div id="message_body">
                	<p>Email or password does not match our records.</p>
				</div> <!-- /message body -->
                <div id="return_link">
                    <a href="../login.php">Try Again</a> 
                </div>  <!-- "return_link"-->';
    }

    ?>

        </div>
    </div>
</main>
<?php

require_once ('../includes/footer.php');

?>