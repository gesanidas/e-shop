<?php
/**
* This is the base configuration file
*
* The config.php file contains the constants
* we use in order to connecct with our database.
* 
* This file contains the following configurations :
* 
* * MySQL settings
* * Connection with the database
*  
*/

/** The name of the database */
define('DB_NAME', 'third');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL database hostname */
define('DB_HOST', 'localhost');

/** For test reasons only we set the display errors true */
ini_set('display_errors', true);

/** We connect with the database */
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
mysqli_set_charset($con, "utf8");
if (mysqli_connect_errno()) {
  echo 'Failed to connect ' . mysqli_connect_error();
}

?>