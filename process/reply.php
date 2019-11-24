<?php

$uri = "..";
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

if(!$_SESSION['user_id'])
{
    echo 'You must be signed in to post a reply.';
}
else
{
    //a real user posted a real reply
    $sql = "INSERT INTO 
                    comments(comment_content,
                          comment_date,
                          comment_topic,
                          comment_by) 
                VALUES ('" . $_POST['reply-content'] . "',
                        NOW(),
                        " . addslashes($_GET['id']) . ",
                        " . $_SESSION['user_id'] . ")";

    $result = mysqli_query($link, $sql);

    if(!$result)
    {
        echo 'Your reply has not been saved, please try again later.';
    }
    else
    {
        echo 'Your reply has been saved, check out <a href="../details.php?id=' . htmlentities($_GET['id']) . '">the topic</a>.';
    }
}