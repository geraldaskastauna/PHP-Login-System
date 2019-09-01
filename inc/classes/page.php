<?php

// If there is no constant defined called __CONFIG__, do not load this file
if(!defined('__CONFIG__')) {
	exit('You do not have a config file');
}

class Page {

  // Force the user to log in, or redirect.
  static function ForceLogin() {
    if(isset($_SESSION['user_id'])) {
    // user is logged in
  } else {
    // user is not logged in
    header("Location: /login.php"); exit;
    }
  }

  static function ForceDashboard() {
    if(isset($_SESSION['user_id'])) {
    // user is logged in
    header("Location: /dashboard.php"); exit;
  } else {
    // user is not logged in
    }
  }

	static function ForceHome() {
		if(isset($_SESSION['user_id'])) {
		// user is logged in
			header("Location: /home.php"); exit;
	} else {
		// user is not logged in

		}
	}

	static function ForceIndex() {
		if(isset($_SESSION['user_id'])) {
		// user is logged in
	} else {
		// user is not logged in
		header("Location: /index.php"); exit;
		}
	}

}
?>
