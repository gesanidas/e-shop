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

	<!-- Contact Starts -->
  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="contact-section-heading">
            <h3>Επικοινωνια</h3>
              <?php 
              $query = mysqli_query($con, "SELECT title FROM painting");
              if (isset($_SESSION['user'])) {
                  echo '<fieldset id="contact-form">
                  <div id="result"></div>
                  <div class="form-group">
                  <label for="m_Name">Όνομα :</label>
                  <input type="text" class="form-control" name="m_Name" value="'.$_SESSION['name'].'" placeholder="Πληκτρολογήστε το όνομα σας">
                  </div>
                  <div class="form-group">
                  <label for="m_Email">E-mail :</label>
                  <input type="email" class="form-control" name="m_Email" value="'.$_SESSION['user'].'" placeholder="Πληκτρολογήστε το email σας">
                  </div>
                  <div class="form-group">
                  <label for="m_Paint">Πίνακας :</label>
                  <select name="m_Paint" class="form-control">';
                  while($row = mysqli_fetch_assoc($query)) 
                  {
                      echo '<option>'.$row['title'].'</option>';            
                  }
                  echo '
                  </select>
                  </div>
                  <div class="form-group">
                  <label for="m_Message">Μήνυμα :</label>
                  <textarea name="m_Mess" class="form-control" rows="3"></textarea>
                  </div>
                  <br>
                  <button type="submit" id="submit_btn" class="btn btn-default">Αποστολή</button>
                  </fieldset>';
              } else {
                  echo '<fieldset id="contact-form">
                  <div id="result"></div>
                  <div class="form-group">
                  <label for="m_Name">Όνομα :</label>
                  <input type="text" class="form-control" name="m_Name" placeholder="Πληκτρολογήστε το όνομα σας">
                  </div>
                  <div class="form-group">
                  <label for="m_Email">E-mail :</label>
                  <input type="email" class="form-control" name="m_Email" placeholder="Πληκτρολογήστε το email σας">
                  </div>
                  <div class="form-group">
                  <label for="m_Paint">Πίνακας :</label>
                  <select name="m_Paint" class="form-control">';
                  while($row = mysqli_fetch_assoc($query)) 
                  {
                      echo '<option>'.$row['title'].'</option>';            
                  }
                  echo '
                  </select>
                  </div>
                  <div class="form-group">
                  <label for="m_Message">Μήνυμα :</label>
                  <textarea name="m_Mess" class="form-control" rows="3"></textarea>
                  </div>
                  <br>
                  <button type="submit" id="submit_btn" class="btn btn-default">Αποστολή</button>
                  </fieldset>';
              }
              ?>
          </div>
        </div>
      </div>
    </div>
  </section>
	<!-- Contact Ends -->

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
    <script src="js/messageContact.js"></script>
  </body>
</html>
