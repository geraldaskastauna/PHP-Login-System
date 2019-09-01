<?php

// Force the user to log in, or redirect.
function ForceLogin () {
  if(isset($_SESSION['user_id'])) {
  // user is logged in
} else {
  // user is not logged in
  header("Location: /login.php"); exit;
  }
}

function ForceDashboard() {
  if(isset($_SESSION['user_id'])) {
  // user is logged in
  header("Location: /dashboard.php");
} else {
  // user is not logged in
  }
}

function FindUser($con, $email, $return_assoc = false) {
  $email = (string) Filter::String( $email );

  $findUser = $con->prepare('SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1');
  $findUser->bindParam(':email', $email, PDO::PARAM_STR);
  $findUser->execute();

  if($return_assoc) {
    return $findUser->fetch(PDO::FETCH_ASSOC);
  }

  $user_found = (boolean) $findUser->rowCount();
  return $user_found;
}
?>
