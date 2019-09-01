<?php

	// Allow the config
	define('__CONFIG__', true);

	// Require the config
	require_once "../inc/config.php";

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Always return JSON format
		// header('Content-Type: application/json');

		$return = [];
		$username = Filter::String( $_POST['username'] );
		$email = Filter::String( $_POST['email'] );

		// Make sure the user does not exist.
		$user_found = User::Find($email, true);
		$username_found = User::FindUsername($username, true);

		if($user_found) {
			// User exists
			// We can also check to see if they are able to log in.

			$return['error'] = "You already have an account";
			$return['is_logged_in'] = false;
		} else if($username_found) {
			// Username exists

			$return['error'] = "This username already exists";
			$return['is_logged_in'] = false;
		} else {

			// User does not exist, add them now.

			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

			$addUser = $con->prepare("INSERT INTO users(username, email, password) VALUES(:username, LOWER(:email), :password)");
			$addUser->bindParam(':username', $username, PDO::PARAM_STR);
			$addUser->bindParam(':email', $email, PDO::PARAM_STR);
			$addUser->bindParam(':password', $password, PDO::PARAM_STR);
			$addUser->execute();

			$user_id = $con->lastInsertId();

			$_SESSION['user_id'] = (int) $user_id;

			$return['redirect'] = '/dashboard.php';
			$return['is_logged_in'] = true;
		}

		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	} else {
		// Die. Kill the script. Redirect the user. Do something regardless.
		exit('Invalid URL');
	}
?>
