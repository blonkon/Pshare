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
    <div class="login">
        <p><br></p>
        <form method="post">
            <br><br><br>
            <label name="email" class="label">Email</label><br><br>
            <input type="email" name="email" placeholder="Adresse@gmail.com" required>
            <br><br><br><br>
            <label name="pass" class="label">Mot de Passe</label><br><br>
            <input type="password" name="pass" placeholder="Password" required>
            <br><br><br><br>
            <input type="submit" name="sub" value="Login" class="button"><br><br>
        </form>
        <p><br></p>
        
        <?php
       

       if((isset($_POST['sub'])))
        //  echo"Bien jusque là!!";
        if( isset($_POST['email']) && isset($_POST['pass']))
        {
          if( !empty($_POST['email']) && !empty($_POST['pass']))
          {
           
            $email=htmlspecialchars($_POST['email']);
            $mdp=htmlspecialchars($_POST['pass']);
            $data=$con->Connexion($email,$mdp);
            if(count($data)>0)
            {
              foreach($data as $lidata)
                {
                   $vemail=$lidata['email_user'];
                   $vmdp=$lidata['mdp_user'];
                   $iduser=$lidata['num_users'];
                   $image=$lidata['img'];
                   $type=$lidata['type'];
                   $nom_complet=$lidata['nom_complet'];
                   $_SESSION["num_users"]=$iduser;
                   $_SESSION["competence"]=$competence;
                   $_SESSION["user"]=$nom_complet;
                   $_SESSION["profil"]=$image;
                   $_SESSION["type"]=$type;
                
                   if($vemail===$email && $vmdp===$mdp )
                      {
                        if($type==='individuel'){
                            header("location:index_indi.php");
                        }
                        elseif ($type==='commun') {
                            header("location:index_commun.php");
                        }
                              
                      }
                   
                }
            }
            else
                {
                    echo '<div class="erreur"><b><font color= "#ffff">Mauvais mail ou mot de passe</font></b></div>';
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