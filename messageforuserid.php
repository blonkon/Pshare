<?php 

function maFonction(int $id) {
    session_start();
    try {
        $connexion = new PDO('mysql:host=localhost:3310;dbname=pshare;charset=utf8','root','');
        // Définir le mode d'erreur PDO à Exception
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
    
    
    $requete = " SELECT  * FROM message WHERE sender = 1 OR recever = $id and  sender = $id OR recever = 1
    ";
    $stmt = $connexion->prepare($requete);
    $stmt->execute();
    while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $utilisateurs[] = $ligne;
    }
    echo json_encode($utilisateurs); 
}

// Appelez la fonction si elle est demandée
if (isset($_GET['action']) && $_GET['action'] === 'messagebox') {
    if (isset($_GET['user_id'])) {
        maFonction($_GET['user_id']);
    }
   
}

?>