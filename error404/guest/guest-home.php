<?php

// Check if the user is logged in
$loggedIn = isset($_SESSION['user_id']); // Assuming you set 'user_id' in the session when a user logs in

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Welcome</title>
    <style>
        .guest-home-body {
            width: 100%;
            display: flex;
            flex-direction: column;
        }
        .most-viewed-title {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .most-viewed {
            display: flex;
            flex-direction: row;
            text-align: center;
            justify-content: space-between;
            padding: 5rem;
            padding-top: 0;
        }

        .home-body-most-viewed {
            padding-left: 7rem;
            padding-right: 7rem;
            padding-top: 5rem;
            padding-bottom: 5rem;
            border: 2px solid #333;
            text-align: center  ;
        }

        /* Add a media query for screens less than 720px */
        @media only screen and (max-width: 920px) {
            .most-viewed {
                flex-direction: column; /* Stack elements vertically on smaller screens */
                padding: 2rem; /* Adjust padding for smaller screens */
            }

             .home-body-most-viewed {
                padding: 2rem; /* Adjust padding for smaller screens */
            }
        }

    </style>
</head>
<body class="main-body">
    <div class="guest-home-body">
    <?php
        include("header.html");
    ?>
        <!-- User shows most viewed/visit subjects -->
        <h2 class="most-viewed-title">Most Viewed</h2>
        <div class="most-viewed">
            <div class="home-body-most-viewed">Box 1</div>
            <div class="home-body-most-viewed">Box 1</div>
            <div class="home-body-most-viewed">Box 1</div>
        </div>
    </div>
</body>
</html>

<?php
include("footer.html");
?>
