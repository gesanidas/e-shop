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

  <?php
    if (empty($_GET['paint_id'])): 
  ?>
  <!-- Paintings Starts -->
  <section id="paintings">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="painting-section-heading">
            <h3>Οι πινακες μας</h3>
          </div>
        <?php



            echo "<div class='col-md-4'>
                  <div class='painting-search-section-content'>
                  
                    <form action='painting.php' method='post' id='searchform'>
                      <h3> Αναζητηση</h3>
                      <label class='form-label'>Χαμηλή Τιμή:</label> <input type='text' name='low_price' /><br/><br/>
                      <label class='form-label'>Υψηλή Τιμή:</label> <input type='text' name='high_price' /><br/><br/>  
                      <label class='form-label'>Μικρό Πλάτος:</label> <input type='text' name='low_width' /><br/><br/>
                      <label class='form-label'>Μέγιστο Πλάτος:</label> <input type='text' name='high_width' /><br/><br/>  
                      <label class='form-label'>Μικρό Ύψος:</label> <input type='text' name='low_height' /><br/><br/>
                      <label class='form-label'>Μέγιστο Ύψος:</label> <input type='text' name='high_height' /><br/><br/>                                        
                      <label class='form-label'>Χρονιά: </label><input type='text' name='year' /><br/><br/>
                      <label class='form-label'>Κατηγορία: </label><select name='art_movement' form='searchform' >
                          <option disabled selected value>Κατηγορία</option>
                          <option value='Renaissance'>Renaissance</option>
                          <option value='Post-Impressionism'>Post-Impressionism</option>
                          <option value='Expressionism'>Expressionism</option>
                          <option value='Surrealism'>Surrealism</option>
                          <option value='Symbolism'>Symbolism</option>
                          <option value='Impressionism'>Impressionism</option>
                        </select><br><br>
                       <label class='form-label'>Διαθεσιμότητα: </label>
                       <input type='checkbox' name='availability'>Διαθεσιμότητα<br><br>
                       <label class='form-label'>Προβολή κατά: </label>
                       <input type='checkbox' name='up'>Τιμή <span class='glyphicon glyphicon-arrow-up' aria-hidden='true'></span>
                       <input type='checkbox' name='down'>Τιμή<span class='glyphicon glyphicon-arrow-down' aria-hidden='true'></span><br><br>

                      <input type='submit' value='Αναζήτηση' />
                    </form>

                  </div>
                  </div>";

          



          if (empty($_POST['low_price'])) {
            $low_price = '';
          } else {
            $low_price = $_POST['low_price'];
          }
          
          if (empty($_POST['high_price'])) {
            $high_price = '';
          } else {
            $high_price = $_POST['high_price'];
          }

          if (empty($_POST['low_width'])) {
            $low_width = '';
          } else {
            $low_width = $_POST['low_width'];
          }

          if (empty($_POST['high_width'])) {
            $high_width = '';
          } else {
            $high_width = $_POST['high_width'];
          }

          if (empty($_POST['low_height'])) {
            $low_height = '';
          } else {
            $low_height = $_POST['low_height'];
          }

          if (empty($_POST['high_height'])) {
            $high_height = '';
          } else {
            $high_height = $_POST['high_height'];
          }

          if (empty($_POST['year'])) {
            $year = '';
          } else {
            $year = $_POST['year'];
          }

          if (empty($_POST['art_movement'])) {
            $art_movement = '';
          } else {
            $art_movement = $_POST['art_movement'];
          }

          if (empty($_POST['availability'])) {
            $avail = '';
          } else {
            $avail = $_POST['availability'];
          }

          $query = mysqli_query($con, "SELECT * FROM painting where 
                                               if('$low_price'!='',price > '$low_price',1) 
                                          and  if('$high_price'!='',price < '$high_price',1) 
                                          and  if('$low_width'!='',width > '$low_width',1) 
                                          and  if('$high_width'!='',width < '$high_width',1)    
                                          and  if('$low_height'!='',height > '$low_height',1) 
                                          and  if('$high_height'!='',width < '$high_height',1) 
                                          and  if('$art_movement'!='',art_movement = '$art_movement',1) 
                                          and  if('$avail'!='' , curdate()>availability,1)                                                                             
                                          and  if('$year'!='',year_ = '$year',1)");
            
            if(isset($_POST['up']))
            {
                $query = mysqli_query($con, "SELECT * FROM painting where 
                                                     if('$low_price'!='',price > '$low_price',1) 
                                                and  if('$high_price'!='',price < '$high_price',1) 
                                                and  if('$low_width'!='',width > '$low_width',1) 
                                                and  if('$high_width'!='',width < '$high_width',1)    
                                                and  if('$low_height'!='',height > '$low_height',1) 
                                                and  if('$high_height'!='',width < '$high_height',1) 
                                                and  if('$art_movement'!='',art_movement = '$art_movement',1) 
                                                and  if('$avail'!='' , curdate()>availability,1)                                                                             
                                                and  if('$year'!='',year_ = '$year',1) order by price asc");
            }

            if(isset($_POST['down']))
            {
                $query = mysqli_query($con, "SELECT * FROM painting where 
                                                     if('$low_price'!='',price > '$low_price',1) 
                                                and  if('$high_price'!='',price < '$high_price',1) 
                                                and  if('$low_width'!='',width > '$low_width',1) 
                                                and  if('$high_width'!='',width < '$high_width',1)    
                                                and  if('$low_height'!='',height > '$low_height',1) 
                                                and  if('$high_height'!='',width < '$high_height',1) 
                                                and  if('$art_movement'!='',art_movement = '$art_movement',1) 
                                                and  if('$avail'!='' , curdate()>availability,1)                                                                             
                                                and  if('$year'!='',year_ = '$year',1) order by price desc");
            }         



            echo "<div class='col-md-8'>
                  <div class='masonry'>";
            while($row = mysqli_fetch_assoc($query)) 
            {
              echo "<div class='painting-section-content'>
                    <img class='img-responsive' src=". $row['image_painting'] .">
                    <h4><a href='painting.php?paint_id=" . $row['id'] . "'>" . $row['title'] . "</a></h4><span class='price-tage'> &euro;" . $row['price'] . "</span>
                    </div>";            
            }
            echo "</div>
                  </div>";  
        
        ?>
        </div>
      </div>
    </div>
  </section>
  <!-- Paintings Ends -->
  <?php
    endif; 
  ?>

  <?php
    if (isset($_GET['paint_id'])): 
        $paintID = $_GET['paint_id'];
        $query = mysqli_query($con, "SELECT * FROM painting WHERE id='$paintID'");
        $row = mysqli_fetch_assoc($query);
        $painter_query=mysqli_query($con, "select name,bio from (select name,bio,painting.id from painter,painting where painter.id=painter_id) as paints where paints.id='$paintID'");
        $painter_row = mysqli_fetch_assoc($painter_query);
  ?>
  <!-- Paint_id Starts -->
  <section id="paint_id">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="paint-section-heading">
            <h3 id="paint-name">        
            <?php
                echo $row['title'];
            ?>
            </h3>
          </div>
        </div>
        <?php
            $av_query = mysqli_query($con, "SELECT id FROM painting WHERE  curdate()>availability");
            $avail_paintings = array();

            while(($av_row =  mysqli_fetch_assoc($av_query))) 
            {
                $avail_paintings[] = $av_row['id'];
            }



           if (in_array($paintID, $avail_paintings)) 
            {
              echo "<div class='col-md-6'>
                    <div class='painting-whole-section-content'>
                    <img class='img-responsive' src=". $row['image_painting'] .">
                    </div>
                    </div>";
              echo "<div class='col-md-6'>
                    <div class='paint-description'>
                    <p>". $row['description'] ."</p>
                    <p><strong>Ζωγραφος :</strong> ". $painter_row['name'] ."</p>
                    <p><strong>Συντομο Βιογραφικο  :</strong> ". $painter_row['bio'] ."</p>
                    <p><strong>Χρονιά :</strong> ". $row['year_'] ."</p>
                    <p><strong>Κατηγορία :</strong> ". $row['art_movement'] ."</p>
                    <p><strong>Πλάτος :</strong> ". $row['width'] ."εκ</p>
                    <p><strong>Ύψος :</strong> ". $row['height'] ."εκ</p>
                    <p><strong>Τιμή : &euro;<span id='price'>". $row['price'] ."</span></strong></p>
                    <input type='button' id='purchase-button' class='btn btn-info' value='Προσθήκη στο καλάθι'>
                    </div>
                    </div>";
            }
             else
             {
                echo "<div class='col-md-6'>
                      <div class='painting-whole-section-content'>
                      <img class='img-responsive' src=". $row['image_painting'] .">
                      </div>
                      </div>";
                echo "<div class='col-md-6'>
                      <div class='paint-description'>
                      <p><strong>Ζωγραφος :</strong> ". $painter_row['name'] ."</p>
                      <p><strong>Συντομο Βιογραφικο  :</strong> ". $painter_row['bio'] ."</p>
                      <p>". $row['description'] ."</p>
                      <p><strong>Χρονιά :</strong> ". $row['year_'] ."</p>
                      <p><strong>Κατηγορία :</strong> ". $row['art_movement'] ."</p>
                      <p><strong>Πλάτος :</strong> ". $row['width'] ."εκ</p>
                      <p><strong>Ύψος :</strong> ". $row['height'] ."εκ</p>
                      <p><strong>Τιμή : &euro;<span id='price'>". $row['price'] ."</span></strong></p>
                      <p><strong>Ο πινακας δεν ειναι διαθεσιμος</strong></p>
                      </div>
                      </div>";              
             }

        ?>
      </div>
    </div>
  </section>
  <!-- Paint_id Ends -->
  <?php
    endif; 
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
    <script src="js/cart.js"></script>
    <script src="js/showCart.js"></script>
  </body>
</html>