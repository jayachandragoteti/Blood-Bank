<?php   
session_start(); //to ensure you are using same session
unset($_SESSION['ReceiverLogin']);
unset($_SESSION['HospitalLogin']);
session_unset();
session_destroy(); //destroy the session
header("location:../index.php"); //to redirect back to "index.php" after logging out
exit();
?>