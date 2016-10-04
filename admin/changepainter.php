<?php 
require('../includes/config.php');

session_start();

if (isset($_SESSION['user']) && isset($_SESSION['role'])):

$painterID = $_GET['id'];
$name = mysqli_real_escape_string($con, $_POST['name']);   
$bio = mysqli_real_escape_string($con, $_POST['bio']); 
$query = mysqli_query($con, "UPDATE painter SET name='$name',bio='$bio' WHERE id='$painterID'"); 

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
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-theme.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

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
       <div class="col-md-6">
	      <div class="logo">
	      <!-- Logo -->
          <a href="admin.php">
            <h2>Painting</h2>
          </a>
	      </div>
	     </div>
       <div class="col-md-6">
	      <div class="admin-message">
            <p>Καλώς ορίσες, Διαχεριστή</p>
	      </div>
	     </div>
       </div>
	 </div>
	</header>
	<!-- Header Ends -->

    <?php 
    if ($query === TRUE) {
        	echo '<!-- Login Starts -->
    <section id="login">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="login-section-heading">
            <h3>Επιτυχης Ενημερωση Ζωγραφου</h3>
            <p>Επιτυχής <strong>ενημερωση</strong> ζωγραφου. Θα ανακατευθυνθείς σε λίγο πίσω...</p>
          </div>
        </div>
      </div>
    </div>
    </section>
	<!-- Login Ends -->';
    } else {
	echo '<!-- Login Starts -->
    <section id="login">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="login-section-heading">
            <h3>Μη Επιτυχης Ενημερωση Ζωγραφου</h3>
            <p>Κάτι πήγε στραβά. Προσπάθησε ξανά. Θα ανακατευθυνθείς σε λίγο πίσω...</p>
          </div>
        </div>
      </div>
    </div>
    </section>
	<!-- Login Ends -->';
    }
    ?>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script>window.setTimeout(function() {window.location.href = 'admin_painters.php';} ,3000);</script>
  </body>
</html>
<?php
else:
    header('Location: ../index.php');
endif;
?>