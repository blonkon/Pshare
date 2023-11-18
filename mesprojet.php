<?php
session_start();

if (!isset( $_SESSION["num_users"])) {
    header("Location: index.php");
    exit(); 
}
require "config.php";
$con=new Operation();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/mesproject.css">
    <title>Messages</title>
</head>
<body>
    <div class="container">
        <nav>
            <ul>   
                <div class="logo"><img src="image/pshare.png" alt=""></div>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="membres.php">Membres</a></li>
                <li><a href="projets.php">Projets</a></li>
                <?php 
                if(!isset($_SESSION['user'])){ echo'<a href="profil.php"><img src="image/Profile1.png"></a>';}
                 else{echo'<a href="profil.php"><img src="profil/'.$_SESSION['profil'].'"></a>';}
                ?>
             </ul>
            
        </nav>      
    </div>
    <div class="partie">
        <div class="left">
            <ul >
                <li >
                    <img src="./image/chat2.png">
                    <a href="profil.php" > Messages</a>
                </li>
                <li style="background-color: #fff ;">
                    <img src="./image/dossier_bleu.png">
                    <a href="#" style="color: #06708e;">Projets</a>
                </li>
                <li>
                    <img src="./image/profile.svg">
                    <a href="#">Profil</a>
                    
                </li>
                <li>
                    <img src="./image/deconnecter.png">
                    <a href="logout.php">Deconnexion</a>
                    
                </li>
            </ul>
        </div>
        <div class="right">
            <div class="content">
                <div class="liste">
                <h2>Liste</h2><br>
                <div style="display: flex; justify-content :center;">
                    <div style="display: flex;width: 30%;border-radius: 20px;height: 40px;justify-content: center;align-items: center;background: #06708e;">
                    <p style="color: #fff;" id="add">Ajouter</p>
                    </div>
                </div>
                <div style="display: flex; overflow-y: auto;flex-direction: column; justify-content: center; align-items: center;">
                    <ul id="ul" style="list-style: none; width : 100%; height : 60vh;">
                            <!-- <li class="liste1">Tetst</li>  -->
                          
                        </ul>
                </div>
                </div>
                <div class="details">
                    <h2 class="titre">Details</h2>
                    <div id="details">
                   <!-- <img src="./image/empty.png" alt="">
                   <h3>Ooops !!!!</h3>
                   <p><br><br>Vous n'avez pas encore de projets vous pouvez en creer un nouveau</p> -->

                </div>
                </div>
            </div>
        
        </div>
    </div>
    <?php
       

       if((isset($_POST['send1']))){
        //  echo"Bien jusque là!!";
        if( isset($_POST['nom']) && isset($_POST['statut']) && isset($_POST['desc']) && isset($_FILES['cahier']))
        {
         
           
            $nom=htmlspecialchars($_POST['nom']);
            $statut=htmlspecialchars($_POST['statut']);
            $description=htmlspecialchars($_POST['desc']);
         // Infos cahier de charge
            $cahier_name=$_FILES['cahier']['name'];
            $cahier_extension=strrchr($cahier_name, ".");
            $cahier_tmp_name=$_FILES['cahier']['tmp_name'];
            $cahier_destination='cv/'.$cahier_name;
            $cahier_extension_autorisees=  array('.pdf', '.PDF');
            if(in_array($cahier_extension,$cahier_extension_autorisees)){
                if(move_uploaded_file($cahier_tmp_name,$cahier_destination)){
                   
                }else{
                  echo"Une erreur est survenue lors de l'envoi";
                }
             }
           else{
            echo"Seuls les fichiers pdf sont autorisés!!";
            }
        //  Fin cahier de charges  
        $id_user=$_SESSION['num_users'];
       try {
            // Ajout du projet
            $lastInsertedId = $con->Ajout_projet($id_user, $nom, $statut, $description, $cahier_name);

                $con->Competences_requises($lastInsertedId, $_POST['selectedItems']);
        echo"Projet ajouté avec succès!!!";
       } catch (\Throwable $th) {
        echo"Message non envoyé!!!";
       }


    } 

}
     ?>

    <script src="./js/projet.js"></script>
</body>
<footer>
    <div class="pied-page">
        <div class="copy">
           <h4>Pshare</h4>
           <small>copyright @ 2023</small>
        </div>
        <div class="references">
           <div class="single">
            <img src="image/pointeur-de-localisation.png" alt="">
            <legend>ENI-ABT</legend>
           </div>
           <div class="single">
            <img src="image/enveloppe-de-courrier-electronique.png" alt="">
            <legend>Pshareforalltheworld</legend>
           </div>
             <div class="single">
                <img src="image/appel-telephonique.png" alt="">
                <legend>+22373492861</legend>
             </div>
        </div>
        <div class="reseaux">
           <p><h4>Nous suivre</h4></p>
          <div class="icones">
            <img src="image/facebook.png" alt="">
           <img src="image/instagram.png" alt="">
           <img src="image/logo-linkedin.png" alt="">
           <img src="image/twitter.png" alt="">
           </div>
        </div>
    
</footer>
</html>