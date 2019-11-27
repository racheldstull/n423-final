<?php

$uri = "../";
$page_title = "Details";

require_once ('../includes/connect.php');
require_once ('../includes/head.php');

function sanitize($item){
    global $link;  //to use $link within the scope of this function, you must use the keyword "global"
    $item = html_entity_decode($item);
    $item = trim($item);
    $item = stripslashes($item);
    $item = strip_tags($item);
    $item = mysqli_real_escape_string( $link, $item );
    return $item;
}
$comment_by = $_SESSION['user_id'];
$reply = '';
if(isset($_REQUEST["reply-body"])) { $reply = sanitize($_REQUEST["reply-body"]); }
if(isset($_REQUEST["topic_com_id"])) { $comment_topic = sanitize($_REQUEST["topic_com_id"]); }

if(!$_SESSION['user_id'] || $_SESSION['user_id'] == 0)
{
    echo '
        <main>
            <div class="topic-details-reply-main-wrapper">
                You must be signed in to post a reply.
            </div>
        </main>';
}
else
{
    //a real user posted a real reply
    $sql = "INSERT INTO `comments` (`comment_id`, `comment_content`, `comment_topic`, `comment_by`) 
		VALUES (NULL, '".$reply."', '".$comment_topic."', '".$comment_by."')";

    $result = mysqli_query($link, $sql);

    if(!$result)
    {
        echo '
        <main>
            <div class="topic-details-reply-main-wrapper">
                Your reply has not been saved, please try again later.
            </div>
        </main>';
    }
    else
    {
        echo '
        <main>
            <div class="topic-details-reply-main-wrapper">
                Your reply has been saved, check out <a href="../details.php?id='. $comment_topic .'">the topic</a>
            </div>
        </main>';
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}