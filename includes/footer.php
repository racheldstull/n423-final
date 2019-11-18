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
            <a href="#">About Us</a>
            <a href="#">Our Mission</a>
            <a href="#">Website Feedback</a>
        </div>
        <div class="col">
            <h1>Navigation</h1>
            <a href="#">Home</a>
            <a href="#">Learn</a>
            <a href="#">Community</a>
            <a href="#">Events</a>
            <a href="#">Meetings</a>
            <a href="#">MyAccount</a>
            <a href="#">MyMomentum</a>
            <a href="#">Sitemap</a>
        </div>
        <div class="col">
            <h1>Legal</h1>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Use</a>
        </div>
        <div class="col">
            <h1>Contact</h1>
            <a href="#">Contact Us</a>
            <a href="#">Press and Media</a>
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
?>
</body>
</html>