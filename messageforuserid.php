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
    
    $requete = " 
    Delete 
    FROM newmessage
    WHERE sender = $id AND recever = $monid";
    $stmt = $connexion->prepare($requete);
    $stmt->execute();
    
    $requete = " 
    SELECT *
    FROM message
    WHERE ((sender = $monid AND recever = $id) OR (sender = $id AND recever = $monid)) 
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

if (isset($_GET['action']) && $_GET['action'] === 'newmessage') {
    if (isset($_GET['user_id'])) {
        try {
            $connexion = new PDO('mysql:host=localhost:3310;dbname=pshare;charset=utf8','root','');
            // Définir le mode d'erreur PDO à Exception
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
        $id=$_GET['user_id'];
        $monid = $_SESSION["num_users"];
        
        $requete = " SELECT *
        FROM  message 
        INNER JOIN (
            SELECT message_id
                FROM newmessage
                WHERE recever = $monid and sender = $id
        ) as result ON message.num_mes = result.message_id
        ORDER BY date DESC";
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
   
}

if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    if (isset($_GET['del'])) {
        try {
            $connexion = new PDO('mysql:host=localhost:3310;dbname=pshare;charset=utf8','root','');
            // Définir le mode d'erreur PDO à Exception
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
        $id=$_GET['del'];
        $requete = "Delete
        FROM  newmessage
         Where message_id=$id";
        $stmt = $connexion->prepare($requete);
        $stmt->execute();
        // // // while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // //      $utilisateurs[] = $ligne;
        // //  }
        echo json_encode(['success' => true]);
    }
   
}

?>