<?php
session_start();
$bdd = new PDO('mysql:dbname=;host=127.0.0.1','','');

if(empty($_SESSION['Nom'])){
  header("Location:autorisation.php");
}

?>