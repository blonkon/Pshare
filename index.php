<?php
session_start();
require "config.php";
$con=new Operation();
$data=$con->Afficher_projet();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
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
            <?php  $nom_pt=$lidata['nom_pt']; $nom_pros=$con->Afficher_projet_proprio($nom_pt);
                   $id_projet=$con->Stocks_idprojet($nom_pt);  $competences=$con->Afficher_competences_requises($id_projet);
            ?>
            <div class="card-single">
                <div class="card-flex">
                    <div class="card-info">
                       <div class="card-head">
                        <img src="image/dossier.png" class="proad">
                       </div>
                       <div class="title">
                                 <p><h4>Propriétaire:</h4></p>
                                  <p><h6><?= $lidata['nom_complet']?></h6></p>
                                 <p><h4>Nom du Projet:</h4></p>
                                  <p><h6><?= $lidata['nom_pt']?></h6></p>
                                  <p><h4>Competences necessaires:</h4></p>
                                  <p><h6><?php foreach ($competences as $competence) {
                                    echo $competence['nom_comp'].' ';}   
                                  ?></h6></p>
                       </div>
                    </div>
                    <div class="statut">
                        <p><h4>Statuts <?php 
                if($lidata['statut']=='actif'){ echo'<img src="image/bouton-denregistrement.png">';}
                 else{echo'<img src="image/bouton-denregistrement (1).png">';}
                ?> :<?= $lidata['statut'] ?></h4></p>
                    </div>
                </div>
                <section class="contacter"> <button>
                <?php 
                if(!isset($_SESSION['user'])){ echo'<a href="login.php">Contactez-Nous</a>';}
                 else{ $id = $lidata['num_users'];
                    echo"<a href='profil.php?el=$id'>Contactez-Nous</a>"; }
               
                ?>
                </button></section>
            </div>
            <?php endforeach; ?>  
        </div>
              
              
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
            <legend><h6>ENI-ABT</h6></legend>
           </div>
           <div class="single">
            <img src="image/enveloppe-de-courrier-electronique.png" alt="">
            <legend><h6>Pshareforalltheworld</h6></legend>
           </div>
             <div class="single">
                <img src="image/appel-telephonique.png" alt="">
                <legend><h6>+22373492861</h6></legend>
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