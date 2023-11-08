<?php 

session_start();
try {
    $connexion = new PDO('mysql:host=localhost:3310;dbname=pshare;charset=utf8','root','');
    // Définir le mode d'erreur PDO à Exception
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    echo 'test';
    if (isset($_POST['content']) && isset($_POST['id'])) {
        // $monid =  $_SESSION["num_users"];
        $requete = "INSERT INTO `message` (`num_mes`, `sender`, `contenu`, `date`, `recever`) 
                   VALUES (NULL, '1', :content, NOW(), :receiver)";
        $stmt = $connexion->prepare($requete);
        $stmt->bindParam(':content', $_POST['content']);
        $stmt->bindParam(':receiver', $_POST['id']);
        $stmt->execute();
    }
    header('Location : profile.php');
}


?>