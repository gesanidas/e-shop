<?php
/**
* This is the check login file
*
* The checklogin.php file contains the validation
* for the user.
* 
* This file requires
* * @config.php :
* 
*/

require('config.php');

/** Escapes special characters for the email and the password */
$email = mysqli_real_escape_string($con, $_POST['email']);
$pass = mysqli_real_escape_string($con, $_POST['pass']);

/** This return the results from the query */
$query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email' AND password='$pass'");

/** We check the credentials and we login the user */
if(mysqli_num_rows($query) == 1) 
{
    /** We get the email and the password */
    while($row = mysqli_fetch_assoc($query)) {
        $table_user = $row['email']; 
        $table_password = $row['password']; 
        $table_myname = $row['name'];
        $table_row = $row['role'];
        }
    /** Check the credentials in order to login the user or display the error */
    if(($email == $table_user) && ($pass == $table_password) && $table_row == 'Admin') {
        session_start();
        $_SESSION['user'] = $email;
        $_SESSION['name'] = $table_myname;
        $_SESSION['role'] = 'Admin';
        header("Location: ../successCartLogin.php"); 
    }
    elseif(($email == $table_user) && ($pass == $table_password) && $table_row == 'Guest') {
        session_start();
        $_SESSION['user'] = $email;
        $_SESSION['name'] = $table_myname;
        
        header("Location: ../successCartLogin.php"); 
}}
else {
        echo '<script>alert("Κάτι πήγε στραβά. Προσπάθησε ξανά !");</script>'; 
        echo '<script>window.location.assign("../cart.php");</script>'; 
}
?>