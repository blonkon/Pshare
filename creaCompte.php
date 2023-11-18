<?php
session_start();
include "config.php";
if(isset($_POST['send1'])){
    if(isset($_POST['nom']) AND isset($_POST['email']) AND isset($_POST['mdp']) AND isset($_POST['classe']) AND isset($_FILES['img1']) AND isset($_FILES['fichier'])){
       
        // Recuperation des infos postés
        $nom=$_POST['nom'];
        $email=$_POST['email'];
        $mdp=$_POST['mdp'];
        $level=$_POST['classe'];
        // Infos cv 
        $cv_name=$_FILES['fichier']['name'];
        $cv_extension=strrchr($cv_name, ".");
        $cv_tmp_name=$_FILES['fichier']['tmp_name'];
        $cv_destination='cv/'.$cv_name;
        $cv_extension_autorisees=  array('.pdf', '.PDF');
        if(in_array($cv_extension,$cv_extension_autorisees)){
            if(move_uploaded_file($cv_tmp_name,$cv_destination)){
               
            }else{
              echo"Une erreur est survenue lors de l'envoi";
            }

        }
        else{
            echo"Seuls les fichiers pdf sont autorisés!!";
        }

        // Fin cv
        // Info image
        
        $img_name=$_FILES['img1']['name'];
        $img_extension=strrchr($img_name, ".");
        $img_tmp_name=$_FILES['img1']['tmp_name'];
        $img_destination='profil/'.$img_name;
        $img_extension_autorisees=  array('.jpg', '.JPG','.jpeg','.JPEG','.png','.PNG');
       
        if(in_array($img_extension,$img_extension_autorisees)){
            if(move_uploaded_file($img_tmp_name,$img_destination)){
                // echo"Image envoyé avec succès!!";
            }else{
              echo"Une erreur est survenue lors de l'envoi de l image";
            }

        }
        else{
            echo"Seuls les images sont autorisés!!";
        }
         // Fin image
        
        // Appel de la fonction d ajout
        $con=new Operation();
        $type="individuel";
        $ajout=$con->Enregistrement_user($type,$nom,$email,$mdp,$level,$img_name,$cv_name);
        echo"Utilisateur ajouté avec succes!!";

    

    }
}


// Ajout d une entreprise/etablissement
if(isset($_POST['send2'])){
    if(isset($_POST['nom2']) AND isset($_POST['email2']) AND isset($_POST['mdp2']) AND isset($_FILES['img2'])){
       // Recuperation des infos postés
       $nom_e=$_POST['nom2'];
       $email_e=$_POST['email2'];
       $mdp_e=$_POST['mdp2'];
       $level_e='';
       $cv_name_e='';
       // Info image
       
       $img_name_e=$_FILES['img2']['name'];
       $img_extension_e=strrchr($img_name_e, ".");
       $img_tmp_name_e=$_FILES['img2']['tmp_name'];
       $img_destination_e='profil/'.$img_name_e;
       $img_extension_autorisees_e=  array('.jpg', '.JPG','.jpeg','.JPEG','.png','.PNG');
      
       if(in_array($img_extension_e,$img_extension_autorisees_e)){
           if(move_uploaded_file($img_tmp_name_e,$img_destination_e)){
               // echo"Image envoyé avec succès!!";
           }else{
             echo"Une erreur est survenue lors de l'envoi de l image";
           }

       }
       else{
           echo"Seuls les images sont autorisés!!";
       }
        // Fin image
       
       // Appel de la fonction d ajout
       $con=new Operation();
       $type="commun";
       $ajout_e=$con->Enregistrement_user($type,$nom_e,$email_e,$mdp_e,$level_e,$img_name_e,$cv_name_e);
       echo"Entreprise/Etablissement ajouté avec succes!!";

       
    

    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
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
    <div class="sidebar">
        <details class="list2-1">
            <summary>Compte individuel </summary>   
                <nav>
                    <ul>
                     <section id="contact">
                        <div class="login-form2">   
                        <form action="" method="post" id="form_2" enctype="multipart/form-data">
                           <input type="text" name="nom" placeholder="Entrer le nom complet" required><br>
                           <input type="text" name="email" placeholder="Adresse@gmail.com" required><br>
                           <input type="password" name="mdp" placeholder="Password" required><br>
                           <h5><label >Selectionner le niveau d'etude:</label>
                           <select name="classe" form="form_2">
                              <option value="Licence">Licence</option>
                              <option value="Master">Master</option>
                              <option value="Doctorat">Doctorat</option>
                           </select></h5><br><br>
                           <label>Ajouter une image</label>
                           <input type="file" name="img1" accept="profil/*" ><br> 
                           <label>Ajouter votre CV</label>   
                           <input type="file" name="fichier"><br>
                           <center><button type="submit" name="send1">Add</button></center>                       
                       </form>
                        </div>
                    </section>
    
                    </ul>
                </nav>             
    </details>
    <details class="list2-2">
            <summary>Compte Etablissement/Entreprise</summary>   
                <nav>
                    <ul>
                     <section id="contact">
                        <div class="login-form2">   
                            <form action="#" method="post" id="form-4" enctype="multipart/form-data">
                            <input type="text" name="nom2" placeholder="Nom Entreprise/Etablissement" required><br>
                           <input type="text" name="email2" placeholder="Adresse@gmail.com" required><br>
                           <input type="password" name="mdp2" placeholder="Password" required><br>
                           <label>Ajouter une image</label>
                           <input type="file" name="img2" ><br>    
                            <center><button type="submit" name="send2"><span class="las la-paper-plane" required>Send</span></button></center>
                                
                            </form>
                        </div>
                    </section>
    
                    </ul>
                </nav>
    </details>
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