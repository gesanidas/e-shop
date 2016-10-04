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
      <div class="row">
       <div class="col-md-12">
	    <div class="header-message">
	      <h2>Βρειτε μερικους απο τους καλυτερους πινακες</h2>
        <p>Εδώ θα βρείτε τρομερούς πίνακες που θα καλύψουν όλα σας τα γούστα και θα μείνετε με τις καλύτερες εντυπώσεις από τις άριστες τιμές μας.</p>
	    </div>
	   </div>
	  </div>
      <div class="row">
       <div class="col-md-12">
	      <div class="header-move-down">
          <a href="#painting" data-toggle="tooltip" title="Click to discover our website"><span class="glyphicon glyphicon-chevron-down"></span></a>
	      </div>
	    </div>
	  </div>
	 </div>
	</header>
	<!-- Header Ends -->

	<!-- About Starts -->
  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="about-section-heading">
            <h3>Σχετικα με εμας</h3>
          </div>
        </div>
        <div class="col-md-6">
          <div class="about-section-image">
            <img src="images/about-us-logo.png" alt="Smiley face">
          </div>
        </div>
        <div class="col-md-6">
          <div class="about-section-description">
            <p>
                Το Painting e-shop είναι το ηλεκτρονικό κατάστημα με την μεγαλύτερη συλλογή από πίνακες ζωγραφικής και τις καλύτερες προσφορές. Οι τιμές μας τόσο στους αυθεντικούς πίνακες ζωγραφικής όσο και στις αναπαραγωγές έργων τέχνης σε καμβά είναι εξαιρετικά χαμηλές. Ακόμη διαθέτουμε πλούσια συλλογή από δίπτυχα – τρίπτυχα.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
	<!-- About Ends -->

	<!-- Paintings Starts -->
  <section id="painting">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="painting-section-heading">
            <h3>Οι τελευταιοι πινακες μας</h3>
          </div>
        </div>
        <div class='col-md-12'>
          <div class='masonry'>
        <?php
          $query = mysqli_query($con, "SELECT * FROM painting ORDER BY id DESC LIMIT 6");
          
          while($row = mysqli_fetch_assoc($query)) {
              echo "<div class='painting-section-content'>
                    <img class='img-responsive' src=". $row['image_painting'] .">
                    <h4><a href='painting.php?paint_id=" . $row['id'] . "'>" . $row['title'] . "</a></h4><span class='price-tage'> &euro;" . $row['price'] . "</span>
                    </div>";
            }
        ?>
        </div>
       </div>
      </div>
    </div>
  </section>
	<!-- Paintings Ends -->

	<!-- Footer Starts -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="footer-section-features">
            <h5>Δωρεαν αποστολη στο σπιτι σας</h5>
            <span class="glyphicon glyphicon-plane"></span>
            <p>Τα μεταφορικά είναι δωρεάν ανεξαρτήτως ύψους παραγγελίας.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="footer-section-features">
            <h5>Εγγυηση επιστροφης χρηματων</h5>
            <span class="glyphicon glyphicon-eur"></span>
            <p>Γνωρίζοντας και σεβόμενοι τον φόβο των χρηστών για αγορά πινάκων ζωγραφικής μέσω του internet, δίνουμε την δυνατότητα σε εσάς να επιστρέψετε το προϊόν που παραλάβατε. Προηγουμένως, πρέπει να έχετε έρθει σε επικοινωνία και συνεννόηση με το προσωπικό μας μέσω e-mail.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="footer-section-features">
            <h5>Privacy Policy</h5>
            <span class="glyphicon glyphicon-bullhorn"></span>
            <p>Το Painting e-shop τηρεί και εφαρμόζει υπεύθυνα την νομοθεσία περί Προσωπικών Δεδομένων. Τα στοιχεία που μας δηλώνετε, δεν αποκαλύπτονται σε τρίτους (με εξαίρεση όπου προβλέπεται από το νόμο στις αρμόδιες και μόνο αρχές) και με κανένα τρόπο δεν δημοσιοποιούνται ή αποτελούν αντικείμενο εκμετάλλευσης.</p>
          </div>
        </div>
        <div class="col-md-12">
          <div class="footer-hr-top">
            <hr>
          </div>
        </div>
        <div class="col-md-12">
          <div class="footer-social">
            <a href="http://www.facebook.com">Facebook</a>
            <a href="http://www.twitter.com">Twitter</a>
            <a href="http://www.instagram.com">Instagram</a>
            <a href="http://www.google.com">Google Plus</a>
          </div>
        </div>
        <div class="col-md-12">
          <div class="footer-hr-bottom">
            <hr>
          </div>
        </div>
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
  
  <?php
  /* Admin Panel */
  if (isset($_SESSION['user']) && isset($_SESSION['role'])) {
          echo '<div class="col-md-12">
                <div class="text-center">
                <a href="admin/login.php">Admin Panel</a>
                </div>
                </div>';
  }
  ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/showCart.js"></script>
  </body>
</html>