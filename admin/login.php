<?php 
require('../includes/config.php');

session_start();

if (isset($_SESSION['user']) && isset($_SESSION['role'])) {
    header('Location: admin.php');
} else {
    header('Location: ../index.php');
}
?>