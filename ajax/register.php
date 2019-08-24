<?php

// Allow the config
define ('__CONFIG__', true);
// Require the config
require_once "../inc/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // alwasy returns json format (easier to read)
  header('Content-Type: application/json');

  $return = [];

  $email = Filter::String($_POST['email']);
  $email = strtolower($email);

  // Make sure the user does not exist
  $findUser = $con->prepare("SELECT user_id FROM users WHERE email = LOWER(:email) LIMIT 1");
  $findUser->bindParam(':email', $email, PDO::PARAM_STR); // Pull variable out of SQL
  $findUser->execute();

  if($findUser->rowCount() == 1) {
    // User exists
    $return['error'] = "You already have an account.";
  } else{
    // User doesnt exist
    $addUser = $con-prepare("INSERT INTO users(email, password) VALUES(:email, :password)");
    $addUser->bindParam(':email', $email, PDO::PARAM_STR);
    $addUser->bindParam(':password', $password, PDO::PARAM_STR);
    $addUser->execute();
  }
  // Make sure the user CAN be added AND is added

  // Return the proper information to javascript to redirect us

  $return['redirect'] = './index.php?this-was-a-redirect';

  echo json_encode($return, JSON_PRETTY_PRINT); exit;

} else {
  // Die and redirect the user.
  exit("test");
  }
?>
