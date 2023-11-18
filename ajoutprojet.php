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
                <?php 
                if( isset($_SESSION['type']) && $_SESSION['type'] ==='individuel' ){ echo'<li><a href="index_indi.php">Accueil</a></li>';}
                 elseif( isset($_SESSION['type']) && $_SESSION['type']==='commun'){echo'<li><a href="index_commun.php">Accueil</a></li>';}
                 elseif(!isset($_SESSION['type'])){echo'<li><a href="index.php">Accueil</a></li>';}
                 
                ?>
                <li><a href="membres.php">Membres</a></li>
                <li><a href="projets.php">Projets</a></li>
                <?php 
                if(!isset($_SESSION['user'])){ echo'<a href="login.php"><img src="image/Profile1.png"></a>';}
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
                           <textarea name="desc"  cols="40" rows="10" placeholder="Un résumé de votre projet" required></textarea><br>
                           <label ><h5>Ajout le pdf du cahier de charge:</h5></label> <br>
                           <input type="file" class="input" name="cahier"><br>
                           <center><button type="submit" name="send1" class="button">Ajouter</button></center>                       
                       </form>
        <p><br></p>
        
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
        $con->Ajout_projet($id_user,$nom,$statut,$description,$cahier_name);
        echo"Projet ajouté avec succès!!!";
       } catch (\Throwable $th) {
        echo"Message non envoyé!!!";
       }


    } 

}
     ?>


    </div>
    <h4>Veuillez toujours renseigner le premier formulaire d'abord!!</h4>
    <div class="login">
        <p><br></p>
           <summary>Les competences requises</summary>
        <form method="post">
            <br><br><br>
            <label name="nom_pro" class="input">Nom du projet</label><br><br>
            <input type="text" name="nom_pro" class="input" placeholder="le nom du projet que vous venez d'ajouter" required><br>
             <h5><label >Selectionner le niveau d'etude:</label>
                <select name="comp" form="form_2"  multiple>
                   <option value="PHP">PHP</option>
                   <option value="Python">Python</option>
                   <option value="Java">Java</option>
                   <option value="C++">C++</option>
                   <option value="Ajax">Ajax</option>
                   <option value="Angular">Angular</option>
                   <option value="Node Js">Node Js</option>
                </select></h5><br><br>
                <center><button type="submit" class="button" name="send2">Ajouter</button></center>  

        </form>
        <p><br></p>
        
        <?php
           if((isset($_POST['send2']))){
            
        if( isset($_POST['nom_pro']) && isset($_POST['comp']))
        {
        //     header("location:index_commun.php");
           
            $nom_projet=$_POST['nom_pro'];
            // $choix=$_POST['comp'];
            // $id_projet=$con->Stocks_idprojet($nom_projet);
            echo $nom_projet;
            
            //   foreach($choix as $elmt)
            //     {
            //        $id_competence=$con->Stocks_competenceid($elmt);
            //        $insert=$con->Competences_requises($id_projet,$id_competence);
            //        echo"competence ajoutées!!!";
                   
            //       }
           
        //   }

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