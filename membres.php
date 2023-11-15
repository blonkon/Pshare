<?php
session_start();
require "config.php";
$con=new Operation();
$data=$con->Afficher_compte();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/membres.css">
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
                <!-- <li><a href="index.php">Accueil</a></li> -->
                <li><a href="membres.php">Membres</a></li>
                <li><a href="projets.php">Projets</a></li>
                <?php 
                if(!isset($_SESSION['user'])){ echo'<a href="login.php"><img src="image/Profile1.png"></a>';}
                 else{echo'<a href="profil.php"><img src="profil/'.$_SESSION['profil'].'"></a>';}
                ?>
             </ul>
            
        </nav>      
    </div>
    
    <!-- <section class="corps"> -->
        <!-- <div class="toutes">
            <h5>toutes</h5>
        </div>
        <div class="ligne1"> -->
           
            <div class="cards1">
            <?php foreach($data as $lidata):?>
                <div class="card-single1">
                    <div class="card-flex1">
                        <div class="card-info1">
                           <div class="card-head1">
                            <?php echo'<img src="profil/'.$lidata['img'].'" class="proad">'; ?>
                           </div>
                           <div class="title1"><p><h4><?= $lidata['nom_complet'] ?></h4></p>
                                      <p><h6></h6></p>
                           </div>
                        </div><br><br>
                        <div class="info1">
                            <center><img src="image/enveloppe.png" alt="" id="i1" width="16px" height="16px">
                            <img src="image/telecharger.png" alt="" id="i2" width="16px" height="16px"></center>
                        </div>   
                        <div class="statut1">
                            <button><h3>Details</h3></button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                
            </div> 
                  
        <!-- </div> -->
    </section>
    


   
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