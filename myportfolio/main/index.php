<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/calendar.css">
    <title>ejang.me</title>
</head>

<body>
    <header>
        <h1>ejang.me</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="qr.html">QR Codes</a></li>
                <li><a href="codespace.html">Projects</a></li>
            </ul>
        </nav>
    </header>
    <?php
    include '../calendar/calendar.html'
    ?>
    <div class="counter">
            <h2>Counter Value: <span id="count">0</span></h2>
            <button id="increment-btn">Increment</button>
            <button id="save-btn">Save</button>
            <button id="reset-btn">Reset</button>
            <p id="message"></p>
    </div>
</body>

</html>