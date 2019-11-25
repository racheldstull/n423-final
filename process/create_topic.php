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
$topic_by = $_SESSION['user_id'];
$reply = '';
if(isset($_REQUEST["subject"])) { $topic_subject = sanitize($_REQUEST["subject"]); }
if(isset($_REQUEST["content"])) { $topic_text = sanitize($_REQUEST["content"]); }
if(isset($_REQUEST["category"])) { $category = sanitize($_REQUEST["category"]); }

if(!$_SESSION['user_id'] || $_SESSION['user_id'] == 0)
{
    echo '
        <main>
            <div class="topic-create-main-wrapper">
                You must be signed in to post a topic.
            </div>
        </main>';
}
else
{
    //a real user posted a real reply
    $sql = "INSERT INTO `topics` (`topic_id`, `topic_subject`, `topic_text`, `topic_cat`, `topic_by`) 
		VALUES (NULL, '".$topic_subject."', '".$topic_text."', '".$category."', $topic_by)";

    $result = mysqli_query($link, $sql);

    if(!$result)
    {
        echo '
        <main>
            <div class="topic-create-main-wrapper">
                Your topic has not been saved, please try again later.
            </div>
        </main>';
    }
    else
    {
        $topic_id = mysqli_insert_id($link);
//        echo '
//        <main>
//            <div class="topic-create-main-wrapper">
//                Your topic has been saved, check out <a href="../details.php?id='. $topic_id .'"> the topic</a>
//            </div>
//        </main>';

        header('Location: ../details.php?id='. $topic_id );
    }
}