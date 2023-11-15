<?php
// Démarrez la session
session_start();

// Détruire toutes les variables de session
session_destroy();

// Rediriger vers la page d'accueil (ou toute autre page de votre choix)
header("Location: index.php");
exit();
?>