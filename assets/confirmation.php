<?php
session_start();
$bdd = new PDO('mysql:dbname=;host=127.0.0.1','','');

if($_GET['']) {
    $mail = $_GET[''];
    $requser = $bdd->prepare("UPDATE membre SET confirmation = 1 WHERE mail = ?;");
    $requser->execute(array($mail));
    header("Location:autorisation.php");
}
?>