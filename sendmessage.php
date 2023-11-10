<?php 

session_start();

if (!isset( $_SESSION["num_users"])) {
    header("Location: index.php");
    exit(); 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérez les données JSON du corps de la requête
    $donnees_json = file_get_contents('php://input');

    // Convertissez les données JSON en tableau associatif PHP
    $donnees = json_decode($donnees_json, true);

    try {
        $connexion = new PDO('mysql:host=localhost:3310;dbname=pshare;charset=utf8','root','');
        // Définir le mode d'erreur PDO à Exception
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
    
            $monid =  $_SESSION["num_users"];
            $requete = "INSERT INTO `message` (`num_mes`, `sender`, `contenu`, `date`, `recever`) 
                       VALUES (NULL, $monid, :content, NOW(), :receiver)";
            $stmt = $connexion->prepare($requete);
            $stmt->bindParam(':content', $donnees['content']);
            $stmt->bindParam(':receiver', $donnees['id']);
            $stmt->execute();

    // Réponse JSON en cas de succès
    echo json_encode(['success' => true]);
} else {
    // Réponse JSON en cas d'erreur
    echo json_encode(['error' => 'Méthode non autorisée']);
}


?>