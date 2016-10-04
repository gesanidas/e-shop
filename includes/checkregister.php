<?php
/**
* This is the check register file
*
* The checkregister.php file contains the validation
* for the user.
* 
* This file requires
* * @config.php :
* 
*/

require('config.php');

/** Escapes special characters for the email and the password */
 	$name = mysqli_real_escape_string($con, $_POST['uname']); 
 	$email = mysqli_real_escape_string($con, $_POST['email']); 
 	$pass = mysqli_real_escape_string($con, $_POST['pass']); 
 	$phone = mysqli_real_escape_string($con, $_POST['telephone']); 
 	$job = mysqli_real_escape_string($con, $_POST['job']); 
 	$card = mysqli_real_escape_string($con, $_POST['cc']); 

/** This return the results from the query */
	$query_email = mysqli_query($con, "SELECT email FROM customer WHERE email='$email'");

/** We check the credentials and we login the user */
	if(mysqli_num_rows($query_email) == 1) {
		echo '<script>alert("Το email υπάρχει ήδη. Δοκιμάστε να συνδεθείτε ή κάντε εγγραφή με άλλο email");</script>';
		echo '<script>window.location.href = "../register.php";</script>';
	} else {        
    	$query_result = mysqli_query($con, "INSERT INTO customer(name, email, password, phone, job, credit_card, role) 
    	VALUES('$name','$email','$pass','$phone','$job','$card', 'Guest');"); 

        
		if ($query_result == TRUE) {
			header("Location: ../successRegister.php");
		} else {
			echo "<script>alert('Κάτι πήγε στραβά. Δοκίμασε ξανά.');</script>";
		}	}
?>