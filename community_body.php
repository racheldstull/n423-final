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
                    <a href="create_topic.php">Create Post</a>
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

                    // if there is an issue with db query
                    if(!$result)
                    {
                        echo '<p class="err">The category could not be displayed, please try again later.</p>';
                    }
                    else
                    {
                        // if category does not exist
                        if(mysqli_num_rows($result) == 0)
                        {
                            echo '<p class="err">The category does not exist.</p>';
                        }
                        else
                        {
                            // if category exists:
                            // do a query for the topics
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
                                    ORDER BY
                                        topics.topic_date DESC";

                            // retrieve results
                            $result = mysqli_query($link, $sql);

                            // if there is an issue with the db query
                            if(!$result)
                            {
                                echo '<p class="err">The topics could not be displayed, please try again later.</p>';
                            }
                            else
                            {
                                // if there are no topics within the chosen category
                                if(mysqli_num_rows($result) == 0)
                                {
                                    echo '<p class="err">There are no topics in this category yet.</p>';
                                }
                                else
                                {
                                    // if there are topics in the chosen category
                                    // loop through table rows
                                    while(($row = mysqli_fetch_array($result, MYSQLI_BOTH)) !== NULL){

                                        // made 'topic_date' a string to manipulate and format the desired way
                                        $pub = strtotime($row['topic_date']);
                                        $pub = date('d M, Y', $pub);

                                        $sql = "SELECT * 
                                                FROM comments 
                                                WHERE comment_topic = ". addslashes($row['topic_id']);
                                        $count = mysqli_query($link, $sql);
                                        $count = mysqli_num_rows($count);

//                                        $now = new DateTime("now");
//                                        $then = $row["comment_date"];
//                                        $interval= $now->diff($then);

                                        if($count == 0){
                                            $plural = "ies";
                                            $activity = "No Activity Yet";
                                        } else if ($count == 1) {
                                            $plural = "y";
                                            $activity = "# Min Ago";
                                        } else {
                                            $plural = "ies";

//                                            $activity = $interval->days . " days";
                                        }

//                                        $date1 = new DateTime("2007-03-24");
//                                        $date2 = new DateTime("2009-06-26");
//                                        $interval = $date1->diff($date2);
//                                        echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days ";
//
//                                        // shows the total amount of days (not divided into years, months and days like above)
//                                        echo "difference " . $interval->days . " days ";


                                        // echo results to page
                                        echo '
                                            <div class="topics-list-row">
                                            <a href=details.php?id='. $row["topic_id"] .'>
                                                <div class="topics-details details-title">'. $row["topic_subject"] .'<br>
                                                    <span class="cite">
                                                        Posted <span class="italics">'. $pub .'</span>, by <span class="italics">'. $row["user_name"] .'</span>
                                                    </span>
                                                </div>
                                                <div class="topics-details">'. $row["cat_name"] .'</div>
                                                <div class="topics-details">'. $count .' repl'. $plural .'</div>
                                                <div class="topics-details">'. $activity .'</div>
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
<!--                    <button>2</button>-->
<!--                    <button>3</button>-->
<!--                    <button>Next ></button>-->
                </div>
            </div>
        </div>
    </div>
</main>