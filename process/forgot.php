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

$user_id = 0;
$user_email = '';
//get the email address
if(isset($_REQUEST["user_email"])) { $email = sanitize($_REQUEST["user_email"]); }

$query = "SELECT * from users 
          WHERE user_email = '.$user_email.'";
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
    $user_id = $row["user_id"];
    //make unique token
    $token = sha1($email.time());


    //put a record in the password reset log that includes the user_id and token
    $sql = "INSERT INTO `password_reset_log` (`id`, `user_id`, `reset_token`, `timestamp`) 
                 VALUES (NULL, '".$user_id."', '".$token."', NOW())";
    $result = mysqli_query($link, $sql);

    //compose and send an e-mail to the user
    //*note* this MUST be done from a server that can send email
    if(mysqli_affected_rows($link) == 1){
        $reset_link = "https://in-info-web4.informatics.iupui.edu/~rdstull/momentum/reset.php?token=".$token;
        $to = $_REQUEST["user_email"];
        $subject = 'Password Reset Request';
        $message = '
                A password reset request has been made for your Momentum account that uses this e-mail address.  If you did not initiate this request, please notify the security team at once.
			
                If you made the request, please click on the link below to reset your password.  This link will expire one hour from the time this e-mail was sent.
			
                '.$reset_link;

        //be sure the /r/n (carriage return) characters are in DOUBLE QUOTES!
        //PHP treats single quoted escaped characters differently, and things will break
        $headers = 'From: rdstull@in-info-web4.informatics.iupui.edu' . "\r\n" .
            'Reply-To:rdstull@in-info-web4.informatics.iupui.edu' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        //send the mail
        mail($to, $subject, $message, $headers);
    }else{
        //otherwise send an error message
        $email_error = "There was a problem with the database.  Your password cannot be reset.";
    }

}else{
    //not found error
    $email_error = "The e-mail address you entered was not found in the database.<br/>
         Check to be sure the e-mail address is correct and try again.";
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
                if($user_email > 0){
                    echo '
                        <div id="message_body">
                            <p>A link to reset your password has been mailed to your e-mail address.</p>
                        </div>';
                } else {
                    echo '
                    <div id="message_body">
                        <p>There was an issue.</p>
                    </div>';
                }

                ?>
            </div>
        </div>
    </main>
<?php

require_once ('../includes/footer.php');

?>