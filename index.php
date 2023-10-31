<?php
session_start();
require "config.php";
$con=new Operation();
$data=$con->Afficher_projet();
foreach($data as $lidata){
    $nom=$lidata['nom_pt'];
    $statut=$lidata['statut'];
    $domaine=$lidata['domaine'];
    $description=$lidata['description'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https : //fonts.googleapis.com/css2?family= Poppins :wght@300 & display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
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
                <a href="profil.php"><img src="image/2.jpg" alt=""></a>
             </ul>
            
        </nav>      
    </div>
    <section class="part">
        <div class="presentation">
              <p><h2>Réalisez vos Projets, </h2></p>
              <p><h2>Developpez vos compétences !!!</h2></p><br><br>
              <p><h3>Decouvrer notre plateforme unique qui</h3></p>
              <p><h3>connecte les établissements,les individus</h3></p>
              <p><h3>et les entreprises à des projets passionnants.</h3></p>
        </div>
        <section>
  
        <div class="cards">
        <?php foreach($data as $lidata):?> 
            <div class="card-single">
                <div class="card-flex">
                    <div class="card-info">
                       <div class="card-head">
                        <img src="image/dossier.png" class="proad">
                       </div>
                       <div class="title"><p><h4>Propriétaire:</h4></p>
                                  <p><h6><?= $lidata['nom_pt']?></h6></p>
                       </div>
                    </div>
                    <div class="info">
                        <p><h4>Domaine:</h4></p>
                        <p><h6><?= $lidata['domaine'] ?></h6></p>
                    </div>   
                    <div class="statut">
                        <p><h4>Statuts <img src="image/bouton-denregistrement.png" alt=""> :<?= $lidata['statut'] ?></h4></p>
                    </div>
                </div>
                <section class="contacter"> <button><a href="login.php">Contactez-Nous</a></button></section>
            </div>
            <?php endforeach; ?>  
        </div>
                <!-- 2 -->
                <!-- <div class="card-single">    
                    <div class="card-flex">
                        <div class="card-info">
                           <div class="card-head">
                            <img src="image/dossier.png" class="proad">
                           </div>
                           <div class="title"><p><h4>Propriétaire:</h4></p>
                                      <p><h6>Orange Digital Center</h6></p>
                           </div>
                        </div>
                        <div class="info">
                            <p><h4>Domaine:</h4></p>
                            <p><h6>Informatique</h6></p>
                        </div>   
                        <div class="statut">
                            <p><h4>Statuts <img src="image/bouton-denregistrement.png" alt=""> :active</h4></p>
                        </div>
                    </div>
                    <section class="contacter"> <button><a href="login.php">Contactez-Nous</a></button></section>
               </div> -->
              
</section>
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
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="script.js"></script>
</html>