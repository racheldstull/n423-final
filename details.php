<?php

// create page title value and set uri
$uri = "";
$page_title = "Details";

// create requires for the header and database
require_once ('includes/connect.php');
require_once ('includes/head.php');

// retrieve id from a query string
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Error: product id was not found.";
    require_once ('includes/footer.php');
    exit();
}

// get and sanitize id
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// query topic and user info from db
$sql = "SELECT
            topic_id,
            topic_by,
            topic_date,
            topic_subject,
            topic_text,
            user_id,
            user_name
        FROM
            topics
        LEFT JOIN
            users
        ON 
            topics.topic_by = users.user_id
        WHERE
            topics.topic_id = " . addslashes($_GET['id']);

// retrieve and set results to var
$result = mysqli_query($link, $sql);

// draw page
?>

<main>
    <div class="topic-details-main-wrapper">
        <?php

        // if there is an issue with db query
        if(!$result)
        {
            echo '<p class="err">The topic could not be displayed, please try again later.</p>';
        }
        else
        {
            // if topic does not exist
            if(mysqli_num_rows($result) == 0)
            {
                echo '<p class="err">This topic does not exist.</p>';
            }
            else
            {
                // if topic exists:
                // do a query for the topics
                $sql = "SELECT  
                            topic_id,
                            topic_subject,
                            topic_date,
                            topic_cat,
                            topic_text,
                            topic_by,
                            user_id,
                            user_name
                        FROM
                            topics
                        LEFT JOIN
                            users
                        ON 
                            topics.topic_by = users.user_id
                        WHERE
                            topic_id = " . addslashes($_GET['id']);

                // retrieve and set results to var
                $result = mysqli_query($link, $sql);

                // count number of comments in topic
                $sql = "SELECT COUNT comment_topic FROM comments WHERE " . addslashes($_GET['id']);
                $count = mysqli_query($link, $sql);

                // if there is an issue with the db query
                if(!$result)
                {
                    echo '<p class="err">The topic could not be displayed, please try again later.</p>';
                }
                else
                {
                        $row = mysqli_fetch_array($result, MYSQLI_BOTH);
                        echo '
                                <div class="topic-details-sub-nav">
                                        <div class="sub-nav-top">
                                            <h1>'. $row["topic_subject"] .'</h1>
                                        </div>
                                        <div class="sub-nav-bottom">
                                            <div class="sub-nav-left">
                                                <a href="community.php">< Back to Discussions</a href="#">
                                            </div>
                                            <div class="sub-nav-right">
                                                <a href="#"><i class="fas fa-exclamation-circle"></i> Report this Topic</a>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="topic-details-body">
                                        <div class="details-expanded">
                                            <div class="user-info">
                                                <h3>'. $row["user_name"] .'</h3>
                                                <h4>'. $row["topic_date"] .'</h4>
                                            </div>
                                            <div class="topic-text">
                                                <p>'. $row["topic_text"] .'</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="details-reply">
                                        <form method="get" action="process/reply.php"> 
                                            <textarea name="reply-body" id="reply-body" cols="80" rows="5" placeholder="Write your reply here..." required></textarea>
                                            <br>
                                            <input type="hidden" name="topic_com_id" value="'. $row["topic_id"] .'">
                                            <input type="submit" value="Reply">
                                        </form>
                                    </div>
                                    <div class="details-comments">
                                        <div class="sec-begin">
                                            <p>'. $count .' comments</p>
                                            <hr>
                                        </div>';
                }
            }
        }

        // if there is an issue with the db query
        if(!$result)
        {
            echo '<p class="err">The topic could not be displayed, please try again later.</p>';
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                echo '<p class="err">This topic does not exist.</p>';
            }
            else
            {
                // if category exists:
                // do a query for the comments
                $sql = "SELECT  
                            comment_id,
                            comment_topic,
                            comment_by,
                            comment_content,
                            comment_date,
                            user_id,
                            user_name
                         FROM
                            comments
                        LEFT JOIN
                            users
                        ON 
                            comments.comment_by = users.user_id
                        WHERE
                            comment_topic = " . addslashes($_GET['id']) . "
                        ORDER BY
                            comments.comment_date DESC";

                // retrieve and set results to var
                $result = mysqli_query($link, $sql);

                // if there is an issue with the db query
                if(!$result)
                {
                    echo '<p class="err">The comments could not be displayed, please try again later.</p>';
                }
                else
                {
                    if(mysqli_num_rows($result) == 0)
                    {
                        echo '<p class="err">There are no comments for this topic yet.</p>';
                    }
                    else
                    {
                        while(($row = mysqli_fetch_array($result, MYSQLI_BOTH)) !== NULL) {

                            $pub = strtotime($row['comment_date']);
                            $pub = date('d M, Y | h:i A', $pub);
                            echo ' 
                                        <div class="comments">
                                            <div class="comment">
                                                <div class="comment-top">
                                                    <h3>'. $row["user_name"] .'</h3>
                                                    <h4>'. $pub .'</h4>
                                                </div>
                                                <div class="comment-body">
                                                    <p>'. $row["comment_content"] .'</p>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>';
                        }
                    }
                }
            }
        }

        ?>
        </div>
    </div>
</main>

<?php

// include footer
require_once ('includes/footer.php');

?>


