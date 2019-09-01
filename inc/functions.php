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
?>
