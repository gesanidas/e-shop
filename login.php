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

	<!-- Login Starts -->
  <section id="login">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="login-section-heading">
            <h3>Συνδεση Χρηστη</h3>
              <form action="includes/checklogin.php" method="post">
			        <label for="Email">E-mail :</label> <input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Γράψτε σωστά το email σας. Πρέπει να περιλαμβάνει @ και να έχει σωστή μορφή !" required="required"/> <br/>
			        <label for="Password">Κωδικός :</label> <input type="password" name="pass" required="required" /> <br/>
			        <input type="submit" class="myInputLogin btn btn-default" value="Σύνδεση"/>
		          </form>
          </div>
        </div>
      </div>
    </div>
  </section>
	<!-- Login Ends -->

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
    <script src="js/showCart.js"></script>
  </body>
</html>

<?php
else :
      header('Location: index.php');
endif;
?>
