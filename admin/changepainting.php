<?php 
require('../includes/config.php');

session_start();

if (isset($_SESSION['user']) && isset($_SESSION['role'])):

$paintID = $_GET['id'];
$name = mysqli_real_escape_string($con, $_POST['name']);   
$description = mysqli_real_escape_string($con, $_POST['description']);
$year = mysqli_real_escape_string($con, $_POST['year']);
$price = mysqli_real_escape_string($con, $_POST['price']);
$painter_name = mysqli_real_escape_string($con, $_POST['painter']);
$art_movement = mysqli_real_escape_string($con, $_POST['art_movement']);
$width = mysqli_real_escape_string($con, $_POST['width']);
$height = mysqli_real_escape_string($con, $_POST['height']);
$availability = mysqli_real_escape_string($con, $_POST['availability']);

$sel = mysqli_query($con, "select  id from  painter where name='$painter_name';"); 
$qres = mysqli_fetch_array($sel,MYSQLI_NUM);
$painter_id = $qres[0];

$target = "../images/";  
$target = $target . basename( $_FILES['image']['name']); 
$pic=($_FILES['image']['name']);
$tar="images/";


$query = mysqli_query($con, "UPDATE painting 
                             SET title='$name',description='$description',year_='$year',price='$price',painter_id='$painter_id',
                             art_movement='$art_movement',width='$width',height='$height',availability='$availability',image_painting='$tar$pic' 
                             WHERE id='$paintID'"); 



if(move_uploaded_file($_FILES['image']['tmp_name'], $target))  
  {    
    echo "<script>alert('Το αρχείο ". basename( $_FILES['uploadedfile']['name']). " ανέβηκε επιτυχώς');</script>";  
  }  
else 
  {   echo "<script>alert('Συγγνώμη, υπήρξε πρόβλημα με το ανέβασμα του αρχείου. Δοκιμάστε ξανά.');</script>";  } 

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
            <h3>Επιτυχης Ενημερωση Πινακα</h3>
            <p>Επιτυχής <strong>ενημερωση</strong> πινακα. Θα ανακατευθυνθείς σε λίγο πίσω...</p>
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
            <h3>Μη Επιτυχης Ενημερωση Πινακα</h3>
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
    <script>window.setTimeout(function() {window.location.href = 'admin_painting.php';} ,3000);</script>
  </body>
</html>
<?php
else:
    header('Location: ../index.php');
endif;
?>