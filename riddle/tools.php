<?php
session_start();
include("header.html");
?>
<div class="tools">
  <div class="all-tools">
    <form action="tools.php" method="get">
      <label for="description">Enter a riddle</label><br>
      <textarea name="description" id="description" cols="30" rows="10"></textarea><br>
      <input type="submit" name="find" value="Find">
    </form>
  </div>
  <div class="result">
    <?php
    if (isset($_GET["description"])) {
      // Access the key
      $value = $_GET["description"];
    } else {
      // Handle the case where the key does not exist
      $value = null; // or provide a default value
    }

    if (array_key_exists("description", $_GET)) {
      // Access the key
      $value = $_GET["description"];
    } else {
      // Handle the case where the key does not exist
      $value = null; // or provide a default value
    }

    echo $value;
    ?>
  </div>
</div>




<?php

include("footer.html");
?>