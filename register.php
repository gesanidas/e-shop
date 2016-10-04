<?php 
require('includes/config.php');

session_start();
if (!isset($_SESSION['user'])):
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Title -->
    <title>Painting - Το καλύτερο e-shop με πίνακες ζωγραφικής</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Abril+Fatface' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
 	
    <!-- Header Starts -->
    <header>
     <div class="container">
      <div class="row">
       <div class="col-md-2">
	      <div class="logo">
	      <!-- Logo -->
          <a href="index.php">
            <h2>Painting</h2>
          </a>
	      </div>
	     </div>
       <div class="col-md-8">
	      <nav>
	      <!-- Menu -->
          <a href="index.php">Αρχική</a>
          <a href="painting.php">Πίνακες</a>
          <a href="contact.php">Επικοινωνία</a>
          <?php 
            echo '<a class="nav-line"> || </a>
                  <a href="login.php">Σύνδεση</a>
                  <a href="register.php">Εγγραφή</a>';
          ?>
	      </nav>
	     </div>
       <div class="col-md-2">
	      <div class="cart">
	      <!-- Cart -->
          <a href="cart.php">
            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Καλάθι
            <div id="cart-circle">
              0
            </div>
          </a>
	      </div>
	     </div>
	    </div>
	 </div>
	</header>
	<!-- Header Ends -->

	<!-- register Starts -->
  <section id="login">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="login-section-heading">
            <h3>Εγγραφη Χρηστη</h3>
              <form action="includes/checkregister.php" method="post">
              		<label for="UName">Όνομα :</label> <input type="text" id="clearName" name="uname" pattern="[a-zA-Z]{8,20}" title="Το όνομα πρέπει να έχει παραπάνω από 8 χαρακτήρες και να είναι στα λατινικά !" required="required" /> <br/>
			        <label for="UEmail">E-mail :</label> <input type="text" id="clearEmail" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Γράψτε σωστά το email σας. Πρέπει να περιλαμβάνει @ και να έχει σωστή μορφή !" required="required"/> <br/>
			        <label for="UPassword">Κωδικός :</label> <input type="text" id="clearPass" name="pass" pattern="[0-9]{6,15}" title="Ο κωδικός πρέπει να έχει παραπάνω από 6 αριθμούς !" required="required" /> <br/>
                    <label for="UTelephone">Τηλέφωνο :</label> <input type="text"id="clearTel" name="telephone" pattern="[0-9]{6,10}" title="Το τηλέφωνο πρέπει να έχει μόνο αριθμούς και πάνω από 8 !" required="required" /> <br/>
              		<label for="UJob">Επάγγελμα :</label> <input type="text" id="clearJob" name="job" pattern="[a-zA-Z]{2,15}" title="Το επάγγελμα πρέπει να έχει μόνο γράμματα και στα λατινικά" required="required" /> <br/>
              		<label for="UCC"><abbr title="Αριθμός Πιστωτικής Κάρτας">Πιστ. Κάρτα</abbr> :</label> <input type="text" id="clearCC" name="cc" pattern="[0-9]{16}" title="Ο αριθμός πιστωτικής πρέπει να έχει μόνο 16 αριθμούς !" required="required" /> <br/>
			        <button type="button" id="clearForm" class="btn btn-danger">Ακύρωση</button>
              <input type="submit" class="myInputLogin btn btn-default" value="Εγγραφή"/>
		          </form>
          </div>
        </div>
      </div>
    </div>
  </section>
	<!-- Register Ends -->

	<!-- Footer Starts -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="footer-copyright">
            <?php 
              echo "<p>&copy; Copyright Painting | E-shop " . date("Y") . "</p>"; 
            ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="footer-payment">
            <img src="images/payment.png" alt="Payments we accept">
          </div>
        </div>
      </div>
    </div>
  </footer>
	<!-- Footer Ends -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/clearRegister.js"></script>
    <script src="js/showCart.js"></script>
  </body>
</html>

<?php
else :
      header('Location: index.php');
endif;
?>
