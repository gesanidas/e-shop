<?php 
require('../includes/config.php');

session_start();
if (isset($_SESSION['user']) && isset($_SESSION['role'])):
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

	<!-- Painter Starts -->
    <section id="add">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="add-section-heading">
            <h3>Προσθηκη Πινακα</h3>
          <form action="insertpainting.php" method="post" enctype="multipart/form-data">
          <label>Όνομα :</label><input type="text" name="name" /><br/><br/> 
          <label>Περιγραφή :</label><textarea name="description"></textarea><br/><br/> 
          <label>Έτος :</label><input type="text" name="year" /><br/><br/> 
          <label>Τιμη :</label><input type="text" name="price" /><br/><br/>     
          <label>Ζωγράφος :</label><input type="text" name="painter" /><br/><br/> 
          <label>Τεχνική :</label><input type="text" name="art_movement" /><br/><br/> 
          <label>Πλατος :</label><input type="text" name="width" /><br/><br/> 
          <label>Υψος :</label><input type="text" name="height" /><br/><br/> 
          <label>Διαθεσιμοτητα :</label><input type="date" name="availability" /><br/><br/> 
          <label>Εικονα :</label><input type="file" name="image" /><br/><br/> 
                         
		  <input type="submit" class="myInputLogin btn btn-default" value="Προσθήκη"/>
          </form>
         </div>
        </div>
      </div>
    </div>
    </section>
	<!-- Painter Ends -->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
<?php
else:
    header('Location: ../index.php');
endif;
?>