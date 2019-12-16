<footer>
    <div class="footer-top">
        <div class="col">
            <h1>Stay Connected</h1>
            <div class="social">
                <a href="#"><i class="fab fa-facebook-square"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
            <a href="mailto:info@momentum.org">info@momentum.org</a>
        </div>
        <div class="col">
            <h1>Momentum</h1>
            <a href="<?php echo $uri ?>about.php">About Us</a>
            <a href="<?php echo $uri ?>mission.php">Our Mission</a>
            <a href="<?php echo $uri ?>feedback.php">Website Feedback</a>
        </div>
        <div class="col">
            <h1>Navigation</h1>
            <a href="<?php echo $uri ?>index.php">Home</a>
            <a href="<?php echo $uri ?>learn.php">Learn</a>
            <a href="<?php echo $uri ?>community.php">Forum</a>
            <a href="<?php echo $uri ?>events.php">Events</a>
            <a href="<?php echo $uri ?>meetings.php">Meetings</a>
            <a href="<?php echo $uri ?>profile.php">MyAccount</a>
            <a href="<?php echo $uri ?>momentum.php">MyMomentum</a>
            <a href="<?php echo $uri ?>sitemap.php">Sitemap</a>
        </div>
        <div class="col">
            <h1>Legal</h1>
            <a href="<?php echo $uri ?>privacy.php">Privacy Policy</a>
            <a href="<?php echo $uri ?>terms.php">Terms of Use</a>
        </div>
        <div class="col">
            <h1>Contact</h1>
            <a href="<?php echo $uri ?>contact.php">Contact Us</a>
            <a href="<?php echo $uri ?>press.php">Press and Media</a>
        </div>
    </div>
    <div class="footer-bottom">
        <hr>
        <p>&copy; 2019 Momentum</p>
    </div>
</footer>

<script src="<?php echo $uri ?>lib/jquery-3.4.1.min.js"></script>
<script src="<?php echo $uri ?>app/app.js"></script>

<?php

echo '<script> console.log("' .$_SESSION["user_level"]. '");</script>';

?>
</body>
</html>