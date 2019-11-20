<?php

// create page title value
$uri = "";
$page_title = "Community";

// create requires for the header and database
require_once ('includes/connect.php');
require_once ('includes/head.php');

function sanitize($item){
    global $link;  //to use $link within the scope of this function, you must use the keyword "global"
    $item = html_entity_decode($item);
    $item = trim($item);
    $item = stripslashes($item);
    $item = strip_tags($item);
    $item = mysqli_real_escape_string( $link, $item );
    return $item;
}

$query = "SELECT topics.topic_id, topics.topic_subject, topics.topic_text, topics.topic_date, topics.topic_cat, topics.topic_by, users.user_id, users.user_name, categories.cat_id, categories.cat_name
          FROM topics, users, categories
          WHERE topics.topic_by = users.user_name
          AND topics.topic_cat = categories.cat_name";
$result = mysqli_query($link, $query);

$subject = "";
$text = "";
$date = "";
$cat = 0;
$author = 0;

$success = false;
if (mysqli_num_rows($result) >= 1){
    $success = true;
} else {
    $success = false;
}

?>

<main>
    <div class="community-main-wrapper">
        <div class="community-sub-nav">
            <div class="sub-nav-top">
                <h1>Community Discussions</h1>
            </div>
            <div class="sub-nav-bottom">
                <div class="sub-nav-left">
                    <a href="#"><i class="fas fa-search"></i></a>
                    <p>&nbsp; | &nbsp;</p>
                    <input type="text">
                </div>
                <div class="sub-nav-middle">
                    <a href="#">All</a>
                    <a href="#">Alcoholism</a>
                    <a href="#">Drug Addiction</a>
                    <a href="#">Friends and Family</a>
                </div>
                <div class="sub-nav-right">
                    <button>Create Post</button>
                </div>
            </div>
            <hr>
        </div>
        <div class="community-content">
            <div class="topics-list">
                <div class="topics-legend">
                    <div class="topics-legend-row">
                        <div class="legend-item legend-title">Title</div>
                        <div class="legend-item">Topic</div>
                        <div class="legend-item">Comments</div>
                        <div class="legend-item">Latest Activity</div>
                    </div>
                </div>
                <div class="topics-list-items">
                    <?php

                    if($success){
                        while(($row = mysqli_fetch_array($result, MYSQLI_BOTH)) !== NULL){
                            echo '
                            <div class="topics-list-row">
                            <a href=details.php?id='. $row["topic_id"] .'>
                                <div class="topics-details details-title">'. $row["topic_subject"] .'<br>
                                    <span class="cite">
                                        Posted <span class="italics">'. $row["topic_date"] .'</span>, by <span class="italics">'. $row["topic_by"] .'</span>
                                    </span>
                                </div>
                                <div class="topics-details">'. $row["topic_cat"] .'</div>
                                <div class="topics-details">0 replies</div>
                                <div class="topics-details">3 hours ago</div>
                            </a>
                        </div>';
                        }
                    } else {
                        echo '
                            <p>error</p>';
                    }

                    ?>
<!--                    <div id="topic-topicDetailsTemplate" class="topics-list-row">-->
<!--                        <a href="#">-->
<!--                            <div class="topics-details details-title">Lorem ipsum dolor sit amet, consectetur adip... <br>-->
<!--                                <span class="cite">-->
<!--                                Posted <span class="italics">3 hours ago</span>, by <span class="italics">JohnDoe2019</span>-->
<!--                            </span>-->
<!--                            </div>-->
<!--                            <div class="topics-details">Alcoholism</div>-->
<!--                            <div class="topics-details">0 replies</div>-->
<!--                            <div class="topics-details">3 hours ago</div>-->
<!--                        </a>-->
<!--                    </div>-->
                </div>
                <div class="topics-pagination">
                    <button class="currentPage">1</button>
                    <button>2</button>
                    <button>3</button>
                    <button>Next ></button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php

require_once ('includes/footer.php');

?>


