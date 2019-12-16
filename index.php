<?php

// create page title value
$uri = "";
$page_title = "Home";

// create requires for the header and database
require_once ('includes/connect.php');
require_once ('includes/head.php');

?>

<main>
    <div class="home-main-wrapper">
        <div class="home-main-text">
            <h1>Empowering Your <br> Journey to <span>Recovery</span>.</h1>
            <div class="line"></div>
            <p>Recovery is possible. And you don't have to do it alone.</p>
            <p>Begin your journey or get a boost of help along the way.</p>
        </div>
    </div>
    <div class="home-main-sections">
        <div class="section section1">
            <h1>Our Mission</h1>
            <p>Help you successfully walk down your road to recovery.</p>
        </div>
        <div class="section section2">
            <h1>Support</h1>
            <p>Get support from those who understand.</p>
        </div>
        <div class="section section3">
            <h1>Your Journey</h1>
            <p>Track your journey through recovery.</p>
        </div>
    </div>
</main>

<?php

require_once ('includes/footer.php');

?>


