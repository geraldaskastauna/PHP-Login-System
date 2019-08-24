<?php
  // If there is no constant define called __CONFIG__, do not load this file
    if(!defined('__CONFIG__')) {
      exit('You do not have a config file');
    }

  // Our config is below
  define('ALLOW_FOOTER', true);

  /* Allow errors
  error_reporting(-1);
  ini_set('display_errors', 'On');
  */

  // Include the db.php file;
  include_once "classes/db.php";
  include_once "classes/filter.php";

  $con = DB::getConnection();
?>
