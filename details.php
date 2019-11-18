<?php

// create page title value
$uri = "";
$page_title = "Details";

// create requires for the header and database
require_once ('includes/connect.php');
require_once ('includes/head.php');

?>

<main>
    <div class="topic-details-main-wrapper">
        <div class="topic-details-sub-nav">
            <div class="sub-nav-top">
                <h1>Morbi rutrum ligula sed ante porta, vel luctus adipiscing elit?</h1>
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


