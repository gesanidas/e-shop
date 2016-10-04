<?php 
require('includes/config.php');

session_start();
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
          if (empty($_SESSION['user'])) {
            echo '<a class="nav-line"> || </a>
                  <a href="login.php">Σύνδεση</a>
                  <a href="register.php">Εγγραφή</a>';
          } else {
            echo '<a class="nav-line"> || </a>
                  <a href="profile.php">'.$_SESSION['name'].'</a>
                  <a href="logout.php">Αποσύνδεση</a>';
          }
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

	<!-- Cart Starts -->
    <section id="basket">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="painting-section-heading">
                        <h3>Το καλαθι αγορων</h3>
                    </div>
                </div>
                <div class="col-md-12">
			        <table id="myTable">
				        <thead>
					        <tr>
						        <th>Πινακας</th>
						        <th>Τιμη</th>
					        </tr>
				        </thead>
				        <tbody>
				        </tbody>
			        </table>
              <div class="cart-buttons-padd">
                    <a href="painting.php" class="btn btn-default">Επιστροφή</a>
                    <button type="button" id="button-clear" class="btn btn-default">Καθάρισμα καλαθιού</button>
              </div>
            </div>
            </div>
        </div>
    </section>
	<!-- Cart Ends -->


<?php 

if (isset($_SESSION['user']))
{
  echo "   <section id='login'\>
            <div class='container'>
              <div class='row'>
                <div class='col-md-12'>
                  <div class='login-section-heading'>
                          <button type='button' id='button-complete' class='btn btn-default'>Ολοκλήρωση Αγοράς</button>
                  </div>
                </div>
              </div>
            </div>
          </section>";

}



else
{


  echo "   <section id='login'\>
            <div class='container'>
              <div class='row'>
                <div class='col-md-12'>
                  <div class='login-section-heading'>
                      <h3>Συνδεση Χρηστη</h3>
                      <form action='includes/directchecklogin.php' method='post'>
                      <label for='Email'>E-mail :</label> <input type='text' name='email' required='required'/> <br/>
                      <label for='Password'>Κωδικός :</label> <input type='password' name='pass' required='required' /> <br/>
                      <input type='submit' class='myInputLogin btn btn-default' value='Σύνδεση'/>
                      </form>
                      <h3>ή εγγραφη</h3>
                      <a href='register.php' class='btn btn-default' role='button'>Εγγραφή</a>
                  </div>
                </div>
              </div>
            </div>
          </section>";
}



?>












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
    
    <script src="js/checkout.js"></script>
    <script src="js/showCart.js"></script>
    
  </body>
</html>