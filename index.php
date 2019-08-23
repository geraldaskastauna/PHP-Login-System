<?php

// Allow the config
define ('__CONFIG__', true);
// Require the config
require_once "inc/config.php"

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Index Page</title>

    <meta charset="utf-8"/>
    <meta http-equiv="Cache-Control" content="public" />
    <meta name="copyrights" content="Geraldas Kastauna"/>
    <meta name="language" content="EN"/>
    <meta name="robots" content="index,follow"/>
    <meta name="description" content="Personal website of experience, projects and life of Geraldas Kastuana"/>
    <meta name="keywords" content="blog, technology, personal, fullstack, developer"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.7/css/uikit.min.css" />
  </head>
  <body>

    <div class="uk-section uk-container">
        <?php
          echo "Hello World. Today is: ";
          echo date("Y m d");
        ?>
        <p>
          <a href="/login.php">Login</a>
          <a href="/register.php">Register</a>
        </p>
    </div>
    <?php require_once "inc/footer.php";?>
  </body>
</html>
