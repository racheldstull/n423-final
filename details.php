<?php

// create page title value
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
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);;

function sanitize($item){
    global $link;  //to use $link within the scope of this function, you must use the keyword "global"
    $item = html_entity_decode($item);
    $item = trim($item);
    $item = stripslashes($item);
    $item = strip_tags($item);
    $item = mysqli_real_escape_string( $link, $item );
    return $item;
}

$query = "SELECT * FROM topics";
$result = mysqli_query($link, $query);

$success = false;
if (mysqli_num_rows($result) >= 1){
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
    $success = true;
} else {
    $success = false;
}

?>

<main>
    <div class="topic-details-main-wrapper">
        <div class="topic-details-sub-nav">
            <div class="sub-nav-top">
                <h1><?php echo $row['topic_subject'] ?></h1>
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
            <div class="details-expanded"></div>
            <div class="details-reply"></div>
            <div class="details-comments"></div>
        </div>
    </div>
</main>

<?php

require_once ('includes/footer.php');

?>


