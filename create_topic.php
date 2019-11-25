<?php

// create page title value and set uri
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

?>

<main>
    <div class="create-topic-main-wrapper">
        <div class="form-content">
            <form id="create_topic_form" class="form-horizontal" method="post" action="process/create_topic.php">
                <h1>Create Topic</h1>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>

                <div class="form-group">
                    <textarea name="content" id="content" cols="80" rows="6" placeholder="Your text here..."></textarea>
                </div>

                <div class="cat-select">
                    <label for="category" class="label-container">Category:</label>
                    <label><input type="radio" id="cat_1" name="category" value="1" checked> Alcoholism</label>
                    <label><input type="radio" id="cat_2" name="category" value="2" > Drug Addiction</label>
                    <label><input type="radio" id="cat_3" name="category" value="3"> Friends and Family</label>
                </div>

                <div class="submit">
                    <a href="community.php">Cancel</a>
                    <input type="submit" />
                </div>
            </form>
        </div>
    </div>
</main>

<?php

require_once ('includes/footer.php');

?>