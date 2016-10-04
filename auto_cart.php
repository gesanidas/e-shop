<?php

require('includes/config.php');
session_start();

	$email=$_SESSION['user'];

	mysqli_query($con, "insert into cart(customer_id) values('$email');");
	$name = $_GET['var_p'];
	foreach ($name as $value) 
	{
		# code...
	
	$query = mysqli_query($con, "SELECT id FROM painting WHERE title='$value'");
	$qres = mysqli_fetch_array($query,MYSQLI_NUM);
	$painting = $qres[0];
	
	

	$cart_query=mysqli_query($con, "Select max(id) from cart ");
	$cart_result = mysqli_fetch_array($cart_query,MYSQLI_NUM);
	$cart = $cart_result[0];
	$amount_query=mysqli_query($con, "Select price from painting where id='$painting'");
	$amount_result=mysqli_fetch_array($amount_query,MYSQLI_NUM);
	$amount=$amount_result[0];


	mysqli_query($con, "INSERT INTO single_purchase(cart_id,painting_id,amount,purchase_time)
	VALUES('$cart','$painting','$amount',now());");


	
	$total_query=mysqli_query($con, "Select sum(amount) from single_purchase where cart_id='$cart'");
	$total_result = mysqli_fetch_array($total_query,MYSQLI_NUM);
	$total = $total_result[0];	
	$final_pur = mysqli_query($con, "update cart set cart.total ='$total' where cart.id='$cart'");	

	if ($final_pur) {
		echo "Η αγορά ολοκληρώθηκε επιτυχώς";
	} else {
		echo "Κάτι πήγε στραβά. Δοκιμάστε ξανά.";
	}

}
?>