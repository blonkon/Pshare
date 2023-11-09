<?php
session_start();
require "config.php";
$con=new Operation();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/add.css">
    <title>Document</title>
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
    <div class="login">
        <p><br></p>
        <form action="" method="post" id="formp" enctype="multipart/form-data">
                           <input type="text" name="nom" class="input" placeholder="Entrer le nom du projet" required><br><br>
                           <label><h5>Le statut du projet</h5></label><br>
                           <input type="radio" name="statut" id ="statut" value="actif" required>Actif
                           <input type="radio" name="statut" id ="statut" value="clos" required>Clos <br><br>
                           <input type="text" name="comp_n" class="input" placeholder="Entrer les languages necessaires" required><br><br>
                           <textarea name="desc"  cols="40" rows="10" placeholder="Un résumé de votre projet" required></textarea><br>
                           <label ><h5>Ajout le pdf du cahier de charge:</h5></label> <br>
                           <input type="file" class="input" name="cahier"><br>
                           <center><button type="submit" name="send1" class="button">Add</button></center>                       
                       </form>
        <p><br></p>
        
        <?php
       

       if((isset($_POST['send1']))){
        //  echo"Bien jusque là!!";
        if( isset($_POST['nom']) && isset($_POST['statut']) && isset($_POST['comp_n']) && isset($_POST['desc']) && isset($_FILES['cahier']))
        {
         
           
            $nom=htmlspecialchars($_POST['nom']);
            $statut=htmlspecialchars($_POST['statut']);
            $comp_necessaire=$_POST['comp_n'];
            $description=htmlspecialchars($_POST['desc']);
            $domaine='Informatique';
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
        $con->Ajout_projet($id_user,$nom,$domaine,$statut,$comp_necessaire,$description,$cahier_name);
        echo"Projet ajouté avec succès!!!";
       } catch (\Throwable $th) {
        echo"Message non envoyé!!!";
       }


    } 

}
     ?>


    </div>



   
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