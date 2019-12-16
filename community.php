<?php

// create page title value and set uri
$uri = "";
$page_title = "Community";

// create requires for the header and database
require_once ('includes/connect.php');
require_once ('includes/head.php');

// query category id, name, and description from db
$sql = "SELECT
            cat_id,
            cat_name,
            cat_description
        FROM
            categories";

// retrieve and set results to var
$result = mysqli_query($link, $sql);

// draw page
require_once ('community_body.php');

// include footer
require_once ('includes/footer.php');

?>


