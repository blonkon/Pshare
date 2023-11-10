<?php 
session_start();

if (!isset( $_SESSION["num_users"])) {
    header("Location: index.php");
    exit(); 
}


function maFonction(int $id,int $monid) {
    try {
        $connexion = new PDO('mysql:host=localhost:3310;dbname=pshare;charset=utf8','root','');
        // Définir le mode d'erreur PDO à Exception
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
    
    
    $requete = " SELECT *
    FROM message
    WHERE (sender = $monid AND recever = $id) OR (sender = $id AND recever = $monid)
    ORDER BY date DESC";
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
        maFonction($_GET['user_id'], $_SESSION["num_users"]);
    }
   
}

if (isset($_GET['action']) && $_GET['action'] === 'getmyid') {
    $id = $_SESSION["num_users"];
    echo json_encode($id); 
   
}

?>