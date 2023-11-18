<?php

session_start();

if (!isset( $_SESSION["num_users"])) {
    header("Location: index.php");
    exit(); 
}

 if (isset($_GET['action']) && $_GET['action'] === 'liste') {
        try {
            $connexion = new PDO('mysql:host=localhost:3310;dbname=pshare;charset=utf8','root','');
            // Définir le mode d'erreur PDO à Exception
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
        $monid = $_SESSION['num_users'];
        $requete = "SELECT * FROM `projet` WHERE num_users=$monid";
        $stmt = $connexion->prepare($requete);
        $stmt->execute();
        while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $utilisateurs[] = $ligne;
          }
          if (!empty($utilisateurs)) {
            echo json_encode($utilisateurs); 
        }else{
            echo json_encode(['nothing' => true]);
        }
    }

    if (($_GET['action']) && $_GET['action'] === 'comp') {
        try {
            $connexion = new PDO('mysql:host=localhost:3310;dbname=pshare;charset=utf8','root','');
            // Définir le mode d'erreur PDO à Exception
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
        
        $requete = "SELECT * FROM `competence`";
        $stmt = $connexion->prepare($requete);
        $stmt->execute();
         while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $utilisateurs[] = $ligne;
         }
         if (!empty($utilisateurs)) {
            echo json_encode($utilisateurs); 
        }else{
            echo json_encode(['nothing' => true]);
        }
    }
   
?>