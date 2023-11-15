<?php 

session_start();
require "config.php";
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    echo 'test';
    if (isset($_POST['content']) && isset($_POST['id'])) {
        // $monid =  $_SESSION["num_users"];
        $requete = "INSERT INTO `message` (`num_mes`, `sender`, `contenu`, `date`, `recever`) 
                   VALUES (NULL, :sender, :content, NOW(), :receiver)";
        $stmt = $connexion->prepare($requete);
        $stmt->bindParam(':sender', $_SESSION["num_users"]);
        $stmt->bindParam(':content', $_POST['content']);
        $stmt->bindParam(':receiver', $_POST['id']);
        $stmt->execute();
    }
    header('Location : profil.php');
}


?>