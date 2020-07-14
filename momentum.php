<?php

// create page title value
$uri = "";
$page_title = "Learn";

// create requires for the header and database
require_once('includes/connect.php');
require_once('includes/head.php');

?>

<main>
    <div class="learn-main-wrapper">
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <p>MyMomentum is a special feature for those looking to recover to track their recovery progress, receive motivation and support, and receive “rewards” for their personal accomplishments.</p>
        <p>Features:</p>
        <ul>
            <li>Time tracker and display, to keep track of the days sober and/or clean</li>
            <li>Correct daily reading from the “Daily Reflections” book</li>
            <li>Input and display for the user's personal reasons for staying sober/clean</li>
            <li>Digital sobriety coins awarded for time related milestones and displayed for the user’s motivation. Link to purchase a physical corresponding coin are displayed</li>

        </ul>
    </div>
</main>

<?php

require_once('includes/footer.php');

?>


