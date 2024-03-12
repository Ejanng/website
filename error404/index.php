<?php
session_start();

unset($_SESSION["email"]);
// Unset the email session variable
require_once "config-variables.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome</title>
    <style>
        .index-body {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            justify-content: space-between;
            margin-top: 2rem;
            background-color: #35374b;
            margin: 0;
            padding: 0;
            overflow: hidden;
            }

        .login-panel {
            max-height: 50vh; /* Adjust the max-height based on your design */
            overflow-y: auto; /* Enable vertical scrolling */
            position: static;
            background-color: #50727B;
            padding: 10px; /* Adjust padding for smaller screens */
            box-sizing: border-box;
            margin: 0; /* Remove margin on smaller screens */
        }
        
        .content-panel {
            width: 100%;
            margin: 0;
            padding-bottom: 0;
            flex-grow: 1;
            overflow-y: auto;
            box-sizing: border-box;
            padding: 10px; /* Adjust padding for smaller screens */
            max-height: 90vh; /* Adjust the max-height based on your design */
        }
        
        .scrollable-content , .login-panel{
            max-height: 100%;
            overflow-y: auto;
            align-items: center;
            text-align: center;
        }
        
        .portal-button {
            display: block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }

        .portal-button {
            margin-top: 2rem;
            padding: 0.5rem 1.5rem;
            max-height: 1rem;
            text-align: center;
            text-decoration: none;
            background-color: #201658;
            color: white;
            border: 1px solid #201658;
            border-radius: 2rem;
            transition: background-color 0.3s;
        }

        .portal-button-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .portal-button:hover {
            background-color: #1d24ca; /* Darker green on hover */
        }
        
        @media only screen and (min-width: 600px) {
        /* Adjust styles for screens wider than 600 pixels */
        .login-panel {
            width: 25%;
            max-height: 100%; /* Full height for larger screens */
            position: fixed;
            left: 0;
            top: 0;
            padding: 20px; /* Original padding for larger screens */
        }

        /* Adjust styles for screens wider than 600 pixels */
        .content-panel {
            width: 75%;
            margin-bottom: 0;
            margin-left: 25%;
            padding: 20px; /* Original padding for larger screens */
            padding-bottom: 0;
            height: auto; /* Allow the content panel to adjust its height based on content */
        }
    }
    @media only screen and (max-width: 599px) {
        /* Adjust styles for screens narrower than 600 pixels (smaller screens) */
        .login-panel {
            width: 80%; /* Adjust the width for smaller screens */
        }
    }
    </style>
<body class="index-body">
    <div class="login-panel">
        <?php
        // Include any login-related content here
        include 'login.php';
        ?>
        <div class="portal-button-wrapper">
            <a href="home.php" class="portal-button">Enter as a  Guest?</a>
        </div>  
        </div>
        <div class="content-panel">
            <div class="scrollable-content">
                <h1>Virus has been downloaded to your device</h1>
                <br>
                <h2>Virus has been succesfully loaded<br></h2>
                <h2>You've been hacked!</h2>
                <h3>To remove the virus <a href="troll/troll.mp4">Click me!</a></h3>
                <p>Title: "The Impact of Technology on Education: Navigating the Digital Frontier"
                <br><br>
                &nbsp;In the 21st century, the rapid evolution of technology has brought about profound changes in various aspects of
                our lives, and perhaps nowhere is its influence more evident than in the field of education. The integration of
                technology in educational settings has revolutionized traditional teaching methods, offering new opportunities
                and challenges. This essay explores the multifaceted impact of technology on education, analyzing its benefits,
                drawbacks, and the imperative of finding a balance in this digital frontier.
                <br>
                &nbsp;One of the most significant advantages of technology in education is its ability to enhance the learning
                experience. Digital tools and platforms provide students with access to a wealth of information, enabling them
                to explore subjects in-depth and at their own pace. Interactive educational apps, virtual simulations, and
                online resources cater to diverse learning styles, fostering a more inclusive and personalized learning
                environment. Moreover, technology has expanded the scope of education beyond geographical boundaries, connecting
                students with global perspectives and fostering a sense of interconnectedness.
                <br>
                &nbsp;Another positive aspect of technology in education is its role in preparing students for the future workforce.
                As the job market becomes increasingly digitized, technological literacy is no longer a mere asset but a
                prerequisite. Integrating coding, digital literacy, and other tech-focused skills into the curriculum equips
                students with the tools they need to thrive in a rapidly evolving job landscape. Educational technology also
                facilitates the development of critical thinking, problem-solving, and collaboration skills – essential
                attributes in the contemporary workplace.
                <br>
                &nbsp;However, the integration of technology in education is not without its challenges. One of the primary concerns
                is the digital divide, where disparities in access to technology create inequalities in educational
                opportunities. Students from economically disadvantaged backgrounds may lack the necessary devices or reliable
                internet access, hindering their ability to fully engage with digital learning resources. Bridging this gap is
                crucial to ensuring that the benefits of technology are accessible to all students, regardless of their
                socio-economic status.
                <br>
                &nbsp;Moreover, the pervasive use of technology in education raises questions about its impact on human interaction
                and social skills. The shift towards online learning, particularly in the wake of global events such as the
                COVID-19 pandemic, has led to a reduction in face-to-face interactions. Critics argue that this may impede the
                development of essential interpersonal skills, such as communication, empathy, and teamwork. Striking a balance
                between technological integration and preserving the human element in education is vital to nurturing
                well-rounded individuals.
                <br>
                &nbsp;In conclusion, the impact of technology on education is both profound and complex. While it brings numerous
                benefits, such as improved access to information, personalized learning experiences, and preparation for the
                future workforce, it also presents challenges such as the digital divide and potential social implications. As
                we navigate the digital frontier in education, it is imperative to address these challenges collaboratively,
                ensuring that technology serves as a powerful tool for empowerment rather than a source of inequality. By
                embracing innovation responsibly, we can harness the transformative potential of technology to shape a more
                inclusive, dynamic, and effective educational landscape for generations to come.
                </p>
            </div>
        </div>
