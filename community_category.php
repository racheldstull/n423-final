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

$sql = "SELECT
            cat_id,
            cat_name,
            cat_description
        FROM
            categories
        WHERE
            cat_id = " . addslashes($_GET['id']);

$result = mysqli_query($link, $sql);

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
                    <a href="community.php">All</a>
                    <a href="community_category.php?id=1">Alcoholism</a>
                    <a href="community_category.php?id=2">Drug Addiction</a>
                    <a href="community_category.php?id=3">Friends and Family</a>
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



                    if(!$result)
                    {
                        echo 'The category could not be displayed, please try again later.';
                    }
                    else
                    {
                        if(mysqli_num_rows($result) == 0)
                        {
                            echo 'This category does not exist.';
                        }
                        else
                        {
                            //do a query for the topics
                            $sql = "SELECT  
                                        topic_id,
                                        topic_subject,
                                        topic_date,
                                        topic_cat,
                                        topic_by,
                                        user_id,
                                        user_name,
                                        cat_id,
                                        cat_name
                                    FROM
                                        topics
                                    LEFT JOIN
                                        users
                                    ON 
                                        topics.topic_by = users.user_id
                                    RIGHT JOIN
                                        categories
                                    ON  
                                        categories.cat_id = topics.topic_cat
                                    WHERE
                                        topic_cat = " . addslashes($_GET['id']) . "
                                    ORDER BY
                                        topics.topic_date DESC";

                            $result = mysqli_query($link, $sql);

                            if(!$result)
                            {
                                echo 'The topics could not be displayed, please try again later.';
                            }
                            else
                            {
                                if(mysqli_num_rows($result) == 0)
                                {
                                    echo 'There are no topics in this category yet.';
                                }
                                else
                                {
                                    while(($row = mysqli_fetch_array($result, MYSQLI_BOTH)) !== NULL){

                                        $pub = strtotime($row['topic_date']);
                                        $pub = date('d M, Y', $pub);

                                        echo '
                                            <div class="topics-list-row">
                                            <a href=details.php?id='. $row["topic_id"] .'>
                                                <div class="topics-details details-title">'. $row["topic_subject"] .'<br>
                                                    <span class="cite">
                                                        Posted <span class="italics">'. $pub .'</span>, by <span class="italics">'. $row["user_name"] .'</span>
                                                    </span>
                                                </div>
                                                <div class="topics-details">'. $row["cat_name"] .'</div>
                                                <div class="topics-details">0 replies</div>
                                                <div class="topics-details">3 hours ago</div>
                                            </a>
                                        </div>';
                                    }
                                }
                            }
                        }
                    }

                    ?>

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


