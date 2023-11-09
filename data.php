<?php
session_start();
try {
    $connexion = new PDO('mysql:host=localhost:3306;dbname=pshare;charset=utf8','root','');
    // Définir le mode d'erreur PDO à Exception
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// $monid =  $_SESSION["num_users"];
$requete = "SELECT *
FROM users
INNER JOIN (
    SELECT sender as id FROM message WHERE sender = 1 OR recever = 1
    UNION 
    SELECT recever as id FROM message WHERE sender = 1 OR recever = 1
) as result ON users.num_users = result.id
WHERE users.num_users !=1;

";
$stmt = $connexion->prepare($requete);
$stmt->execute();
while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $utilisateurs[] = $ligne;
}
echo json_encode($utilisateurs); 


?>
