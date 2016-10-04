<?php 
require('includes/config.php');

session_start();
if (isset($_SESSION['user'])):
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

	<!-- Profile Starts -->
  <section id="profile">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="profile-section-heading">
           <div class="text-center">
            <h3>Προφιλ</h3>
            </div>
              <?php 
              $userID = $_SESSION['user'];
              $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$userID'");
              $row = mysqli_fetch_assoc($query); 
              ?>
            <?php echo '<form action="successProfile.php?id='.$userID.'" method="post">'; ?>
            <label>Όνομα :</label><?php echo '<input type="text" name="name" value="'.$row['name'].'"/>'; ?><br/><br/>
            <label>Password :</label><?php echo '<input type="text" name="password" value="'.$row['password'].'"/>'; ?><br/><br/> 
            <label>Τηλέφωνο :</label><?php echo '<input type="text" name="phone" value="'.$row['phone'].'"/>'; ?><br/><br/> 
            <label>Δουλειά :</label><?php echo '<input type="text" name="job" value="'.$row['job'].'"/>'; ?><br/><br/> 
            <label>Πιστ. Κάρτα :</label><?php echo '<input type="text" name="cc" value="'.$row['credit_card'].'"/>'; ?><br/><br/> 
            <input type="submit" class="myInputLogin btn btn-default" value="Αλλαγή"/>
          </form>
          </div>
        </div>
      </div>
    </div>
  </section>
	<!-- Profile Ends -->

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
else:
    header('Location: index.php');
endif;
?>
