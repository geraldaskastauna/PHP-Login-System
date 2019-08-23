<?php

// Allow the config
define ('__CONFIG__', true);
// Require the config
require_once "inc/config.php"

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Register new account</title>

    <meta charset="utf-8"/>
    <meta http-equiv="Cache-Control" content="public" />
    <meta name="robots" content="index,follow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.7/css/uikit.min.css" />
  </head>
  <body>

    <div class="uk-section uk-container">
        <div class="uk-grid uk-child-width-1-3@s uk child-width-1-1" uk-grid>
          <form class="uk-form-stacked js-register">

            <h2>Register</h2>

            <div class="uk-margin">
              <label class="uk-form-label" for="form-stacked-text">Email</label>
              <div class="uk-form-controls">
                <input class="uk-input" id="form-stacked-text" type="email" required placeholder="email@email.com">
              </div>
            </div>

            <div class="uk-margin">
              <label class="uk-form-label" for="form-stacked-text">Password</label>
              <div class="uk-form-controls">
                <input class="uk-input" id="form-stacked-text" type="password" required placeholder="Your Password">
              </div>
            </div>

            <div class="uk-margin uk-alert uk-alert-danger js-error" style='display: none'>

            </div>

            <div class="uk-margin">
              <button class="uk-button uk-button-default" type="submit">Register</button>
            </div>

          </form>
        </div>
    </div>
    <?php require_once "inc/footer.php";?>
  </body>
</html>
