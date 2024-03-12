<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            overflow: hidden;
            display: flex;
            height: 100vh;
        }

        #login-panel {
            width: 25%;
            height: 100%;
            position: fixed;
            left: 0;
            top: 0;
            background-color: #f1f1f1;
            padding: 20px;
            box-sizing: border-box;
        }

        #content-panel {
            width: 75%;
            height: 100%;
            overflow-y: auto;
            margin-left: 25%;
            box-sizing: border-box;
            padding: 20px;
        }

        #scrollable-content {
            max-height: 100%;
            overflow-y: auto;
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
    </style>
    <title>Welcome</title>
</head>
<body>

<div id="login-panel">
    <!-- Include your login form or content here -->
    <form>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Login" class="portal-button">
    </form>
</div>

<div id="content-panel">
    <div id="scrollable-content">
        <!-- Scrollable content goes here -->
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...</p>
        <p>Another paragraph...</p>
        <!-- Add more paragraphs as needed -->
    </div>
</div>

</body>
</html>
