<?php

// Allow the config
define ('__CONFIG__', true);
// Require the config
require_once "../inc/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // alwasy returns json format (easier to read)
  header('Content-Type: application/json');

  $return = [];

  // Make sure the user does not exist

  // Make sure the user CAN be added AND is added

  // Return the proper information to javascript to redirect us

  $return['redirect'] = './index.php?this-was-a-redirect';

  echo json_encode($return, JSON_PRETTY_PRINT); exit;

} else {
  // Die and redirect the user.
  exit("test");
  }
?>
