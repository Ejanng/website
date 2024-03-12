

<?php

// Check if the username is set in the session
if (isset($_SESSION["username"])) {
    // Access the username
    $username = $_SESSION["username"];
    // Set a dynamic title with the username
    $pageTitle = "Welcome, $username - Home";
}

$loggedIn = isset($_SESSION['user_id']); // Assuming you set 'user_id' in the session when a user logs in
require_once 'config-variables.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <title><?php echo $pageTitle; ?></title>
    <style>
        .user-home-body {
            width: 100%;
            display: flex;
            flex-direction: column;
        }
        .recommendation-title, .most-viewed-title, .recent-tabs-title {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .recommendation, .most-viewed, .recent-tabs {
            display: flex;
            flex-direction: row;
            text-align: center;
            justify-content: space-between;
            padding: 5rem;
            padding-top: 0;
        }

        .home-body-recommendation, .home-body-most-viewed, .home-body-recent-tabs {
            padding-left: 7rem;
            padding-right: 7rem;
            padding-top: 5rem;
            padding-bottom: 5rem;
            border: 2px solid #333;
            text-align: center  ;
        }

        /* Add a media query for screens less than 720px */
        @media only screen and (max-width: 920px) {
            .recommendation, .most-viewed, .recent-tabs {
                flex-direction: column; /* Stack elements vertically on smaller screens */
                padding: 2rem; /* Adjust padding for smaller screens */
            }

            .home-body-recommendation, .home-body-most-viewed, .home-body-recent-tabs {
                padding: 2rem; /* Adjust padding for smaller screens */
            }
        }

    </style>
</head>
<body class="main-body">
    
    <div class="user-home-body">
    <?php
        include("header.html");
    ?>
        <!-- User shows preferences subjects -->
        <h2 class="recommendation-title">Recommendation</h2>
        <div class="recommendation">
            <div class="home-body-recommendation">Box 1</div>
            <div class="home-body-recommendation">Box 1</div>
            <div class="home-body-recommendation">Box 1</div>
        </div>

        <!-- User shows most viewed/visit subjects -->
        <h2 class="most-viewed-title">Most Viewed</h2>
        <div class="most-viewed">
            <div class="home-body-most-viewed">Box 1</div>
            <div class="home-body-most-viewed">Box 1</div>
            <div class="home-body-most-viewed">Box 1</div>
        </div>

        <!-- User recent tabs -->
        <h2 class="recent-tabs-title">Recent Tabs</h2>
        <div class="recent-tabs">
            <div class="home-body-recent-tabs">Box 1</div>
            <div class="home-body-recent-tabs">Box 1</div>
            <div class="home-body-recent-tabs">Box 1</div>
        </div>
    </div>

<?php
include("footer.html");
?>
