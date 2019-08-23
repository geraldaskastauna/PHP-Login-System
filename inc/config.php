<?php
  // If there is no constant define called __CONFIG__, do not load this file
    if(!defined('__CONFIG__')) {
      exit('You do not have a config file');
    }

  // Our config is below
  define('ALLOW_FOOTER', true);

  // Include the db.php file;
  include_once "classes/db.php";

  $con = DB::getConnection();
?>
