<?php

if (session_status() == PHP_SESSION_NONE){
    session_start();
}

if (!isset($_SESSION["user_level"])){
    $_SESSION["user_level"] = 0;
}

$user_level = $_SESSION["user_level"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="author" content="Rachel Stull">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=1, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css"
          integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $uri ?>css/styles.css">

    <title>Momentum | <?php echo "$page_title" ?></title>
</head>
<body>

<nav>
    <div class="nav-left">
        <div class="nav-logo">
            <a href="<?php echo $uri ?>index.php">
                <img class="big-logo" src="<?php echo $uri ?>images/logo-min-temp.png" alt="momentum logo">
                <img class="small-logo" src="<?php echo $uri ?>images/logo-text-temp.png" alt="momentum logo">
            </a>
        </div>
    </div>
    <div class="nav-right">
        <div class="nav-links">
            <a href="<?php echo $uri ?>index.php">Home</a>
            <a href="<?php echo $uri ?>learn.php">Learn</a>
            <a href="<?php echo $uri ?>community.php">Forum</a>
            <a href="<?php echo $uri ?>events.php">Events</a>
            <a href="<?php echo $uri ?>meetings.php">Meetings</a>
            <a href="<?php echo $uri ?>momentum.php">MyMomentum</a>

            <?php
            if($_SESSION["user_level"] > 0){ echo '
				<a href="' .$uri. 'logout.php">Logout</a>
			';
            } else{
                echo '
      			<a href="' .$uri. 'login.php">Login</a>
			';
            }

            ?>

<!--            <a href="#"><i class="fas fa-user-circle"></i></a>-->
        </div>
    </div>
</nav>