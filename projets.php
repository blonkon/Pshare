<?php
session_start();
require "config.php";
$con=new Operation();
$total=$con->Total_card();
$actif=$con->Actif_card();
$clos=$con->Close_card();
$data=$con->Afficher_projet();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/projets.css">
    <title>Document</title>
   <?php  
        $p_actif=($actif/$total)*100;
        $p_clos=($clos/$total)*100;
      
   echo "
   <style type='text/css'>
   .br{
    width: $p_actif%;
    animation: br 3s;
   }
    .cl{
    width: $p_clos%;
    animation: br 4s;
   }
   
   @keyframes br{
       0%{
           width: 0%;
       }
       $p_actif%{
           width: $p_actif%;
       }
       
   }
   @keyframes cl{
       0%{
           width: 0%;
       }
       $p_clos%{
           width: $p_clos%;
       }
   }
    </style> "
  ?>
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
    
    <div  class="recherche">
                  <form action="" method="post">
                    <input type="search" name="nom"class="r" placeholder="Recherche suivant les noms des proprietaires ">
                    <input type="submit" name="send"  class="s" value="Valider">
                  </form>
           
    </div>

    <section class="parties">
      <div class="gauche">
        <div class="rech">
            <div class="conteneur1">
                <div class="conent1">
                    <div class="card1">
                        <div class="card-content1">
                            <div class="competence1">
                                <h4>Competences</h4><br>
                                <h6>Toutes</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Listes des competences -->
          
        <div class="listes">
            <div class="conteneur2">
                <div class="conent2">
                    <div class="card2">
                        <div class="card-content2">
                            <div class="competence2">
                                <h4>Listes Competences</h4><br>          
                                <h6>Django</h6>
                                <h6>Node JS</h6>
                                <h6>Angular</h6>
                                <h6>Java</h6>
                                <h6>Python</h6>
                                <h6>Ajax</h6>
                                <h6>C++</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Fin des competences -->
    </div>



        <div class="tout">
        <div class="conteneur">
            <div class="conent">
                <div class="card">
                    <div class="card-content">
                        <div class="total">
                            <h4>Total</h4>
                            <h4><?php echo $total; ?></h4>
                        </div>
                        <div class="image">
                            <img src="image/dossier_bleu.png" alt=""> 
                        </div>
                    </div>
                </div>
            </div>


                <div class="conent">
                    <div class="card">
                        <div class="card-content">
                            <div class="total">
                                <h4>Actif: <?php echo $actif; ?></h4>
                                <div class="fo">
                                    <div class="skill">
                                       <span class="bar"><span class="br"></span></span>
                                    </div>    
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>


                    <div class="conent">
                        <div class="card">
                            <div class="card-content">
                                <div class="total">
                                    <h4>Clos: <?php echo $clos; ?></h4>
                                    <div class="fo">
                                        <div class="skill">
                                           <span class="bar"><span class="cl"></span></span>
                                        </div>    
                                     </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>

                  
              <!-- Debut de la recherche -->
              <?php
              if(isset($_POST['send']))
              {
                 if(isset($_POST['nom']) && !empty($_POST['nom']))
                {
                  
                 $donnee=htmlspecialchars($_POST['nom']);
                 $data=$con->Recherche_by_name($donnee);
                 echo'<div class="cards">';
                 if(count($data)>0)
                 {
                  foreach($data as $lidata) {    
                    $nom_pt=$lidata['nom_pt']; $nom_pros=$con->Afficher_projet_proprio($nom_pt);
                     $id_projet=$con->Stocks_idprojet($nom_pt);  $competences=$con->Afficher_competences_requises($id_projet);  
                  echo   '<div class="card-single">
                          <div class="card-flex">
                              <div class="card-info">
                                 <div class="card-head">';
                         echo'<img src="image/dossier.png" class="proad">';                
                           echo'</div>
                                 <div class="title">
                                 <p><h4>Propriétaire:</h4></p>
                                 <p><h6>'.$lidata['nom_complet'].'</h6></p>
                                 <p><h4>Nom du Projet:</h4></p>
                                 <p><h6>'.$lidata['nom_pt'].'</h6></p>
                                 <p><h4>Competences necessaires:</h4></p>
                                 <p><h6>';
                                 foreach ($competences as $competence) {
                                     echo $competence['nom_comp'].' ';}   
                                  echo'</h6></p>
                                   </div>';
                                   echo'</div>
                                   <div class="statut">
                                       <p><h4>Statuts';
                                    if($lidata['statut']=='actif'){ echo'<img src="image/bouton-denregistrement.png">';}
                                else{echo'<img src="image/bouton-denregistrement (1).png">';}
                               echo' : '.$lidata['statut'].'</h4></p>
                                   </div>
                               </div>
                               <section class="contacter"> <button>';
                              
                               if(!isset($_SESSION['user'])){ echo'<a href="login.php">Contactez-Nous</a>';}
                                else{
                                   $id = $lidata['num_users'];
                                   echo"<a href='profil.php?iduser=$id'>Contactez-Nous</a>"; }
                              echo'
                               </button></section>
                           </div> 
                       </div>
                       </div>';
                   }
           echo '</div>';
                 
                   
                } 
            
              }
         }


              ?>
              <!-- Fin de la recherche -->
            <div class="slider">
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
                 else{
                    $id = $lidata['num_users'];
                    echo"<a href='profil.php?el=$id'>Contactez-Nous</a>"; }
               
                ?>
                </button></section>
            </div>
            <?php endforeach; ?>  
        </div>
        </div>

    </section>



    
</body>
<footer>
    <div class="pied-page">
        <div class="copy">
           <h4>Pshare</h4>
          <small><h4>copyright @ 2023</h4></small>
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