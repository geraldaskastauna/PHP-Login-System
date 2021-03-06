<?php

// If there is no constant defined called __CONFIG__, do not load this file
if(!defined('__CONFIG__')) {
	exit('You do not have a config file');
}

//calling static classes:
//User::Find();

class User {

	private $con;

	public $user_id;
	public $email;
	public $reg_time;

	public function __construct($user_id) {
		$user_id = (int) $user_id;
		$this->con = DB::getConnection();

		$user_id = Filter::Int($user_id);

		$user = $this->con->prepare("SELECT user_id, username, firstname, lastname, email, reg_time FROM users WHERE user_id = :user_id LIMIT 1");
		$user->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		$user->execute();

		if($user->rowCount() == 1) {
			// User exists
			$user = $user->fetch(PDO::FETCH_OBJ);

			$this->username =(string) $user->username;
			$this->firstname=(string) $user->firstname;
			$this->lastname =(string) $user->lastname;
			$this->email		=(string) $user->email;
			$this->user_id	=(int) $user->user_id;
			$this->reg_time	=(string) $user->reg_time;
		} else {
			// No user. Redirect
			header("Location: /logout.php"); exit;
		}
	}

	public static function Find($email, $return_assoc = false) {

			$con = DB::getConnection();

			$email = (string) Filter::String($email);

		  $findUser = $con->prepare("SELECT user_id, username, firstname, lastname, password FROM users WHERE email = LOWER(:email) LIMIT 1");
		  $findUser->bindParam(':email', $email, PDO::PARAM_STR);
		  $findUser->execute();

		  if($return_assoc) {
		    return $findUser->fetch(PDO::FETCH_ASSOC);
		  }

		  $user_found = (boolean) $findUser->rowCount();
		  return $user_found;
		}

		public static function FindUsername($username, $return_assoc = false) {

				$con = DB::getConnection();

				$username = (string) Filter::String($username);

			  $findUsername = $con->prepare("SELECT user_id, email, password FROM users WHERE username = :username LIMIT 1");
			  $findUsername->bindParam(':username', $username, PDO::PARAM_STR);
			  $findUsername->execute();

			  if($return_assoc) {
			    return $findUsername->fetch(PDO::FETCH_ASSOC);
			  }

			  $username_found = (boolean) $findUsername->rowCount();
			  return $username_found;
			}
}
?>
