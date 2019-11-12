<?php

// create page title value
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
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam corporis eum perferendis praesentium provident quae quidem ratione repellendus temporibus voluptatibus.</p>
        </div>
    </div>
    <div class="home-main-sections">
        <div class="section section1">
            <h1>Our Mission</h1>
            <p>Lorem ipsum dolor sit amet.</p>
        </div>
        <div class="section section2">
            <h1>Support</h1>
            <p>Lorem ipsum dolor sit amet.</p>
        </div>
        <div class="section section3">
            <h1>Your Journey</h1>
            <p>Lorem ipsum dolor sit amet.</p>
        </div>
    </div>
</main>

<?php

require_once ('includes/footer.php');

?>


