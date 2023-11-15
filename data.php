<?php
session_start();
if (!isset( $_SESSION["num_users"])) {
    header("Location: index.php");
    exit(); 
}
try {
    $connexion = new PDO('mysql:host=localhost:3310;dbname=pshare;charset=utf8','root','');
    // Définir le mode d'erreur PDO à Exception
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

$monid =  $_SESSION["num_users"];
$requete = "SELECT *
FROM users
INNER JOIN (
    SELECT sender as id FROM message WHERE sender = $monid OR recever = $monid
    UNION 
    SELECT recever as id FROM message WHERE sender = $monid OR recever = $monid
) as result ON users.num_users = result.id
WHERE users.num_users !=$monid;

";
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



?>
