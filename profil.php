<?php
session_start();

<<<<<<< HEAD
=======
if (!isset( $_SESSION["num_users"])) {
    header("Location: index.php");
    exit(); 
}
>>>>>>> 3f28d7c2e375d105899c718288e444ba2596ed23
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <link rel="stylesheet" href="css/profil.css">
=======
    <link rel="stylesheet" href="./css/profil.css">
>>>>>>> 3f28d7c2e375d105899c718288e444ba2596ed23
    <title>Messages</title>
</head>
<body>
    <div class="container">
        <nav>
            <ul>   
                <div class="logo"><img src="image/pshare.png" alt=""></div>
<<<<<<< HEAD
                <?php 
                if(isset($_SESSION['type']) && $_SESSION['type'] ==='individuel' ){ echo'<li><a href="index_indi.php">Accueil</a></li>';}
                 elseif( isset($_SESSION['type']) && $_SESSION['type']==='commun'){echo'<li><a href="index_commun.php">Accueil</a></li>';}
                 elseif(!isset($_SESSION['type'])){echo'<li><a href="index.php">Accueil</a></li>';}
                 
                ?>
                <li><a href="membres.php">Membres</a></li>
                <li><a href="projets.php">Projets</a></li>
                <?php 
                if(!isset($_SESSION['user'])){ echo'<a href="login.php"><img src="image/Profile1.png"></a>';}
=======
                <li><a href="index.php">Accueil</a></li>
                <li><a href="membres.php">Membres</a></li>
                <li><a href="projets.php">Projets</a></li>
                <?php 
                if(!isset($_SESSION['user'])){ echo'<a href="profil.php"><img src="image/Profile1.png"></a>';}
>>>>>>> 3f28d7c2e375d105899c718288e444ba2596ed23
                 else{echo'<a href="profil.php"><img src="profil/'.$_SESSION['profil'].'"></a>';}
                ?>
             </ul>
            
        </nav>      
    </div>
    <div class="partie">
        <div class="left">
            <ul >
                <li>
                    <img src="./image/chat.svg">
                    <a href="#"> Messages</a>
                   
                </li>
                <li>
                    <img src="./image/project.svg">
                    <a href="#">Projets</a>
                </li>
                <li>
                    <img src="./image/profile.svg">
                    <a href="#">Profil</a>
                    
                </li>
                <li>
                    <!-- <img src="./image/profile.svg"> -->
                    <a href="deconnexion.php">Deconnexion</a>
                    
                </li>
            </ul>
        </div>
        <div class="right">
            <div class="contact" id="contactes"> 
            </div>
            <h1>Messages</h1>
            <div class="chat">
                <div class="chatp" id="chatp">
                    <img src="./image/user.png" alt="">
                    <p>Users</p>
                </div>
                <div class="content" id="content">
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
    <script src="js/chat.js"></script>
=======
    <script src="./js/chat.js"></script>
>>>>>>> 3f28d7c2e375d105899c718288e444ba2596ed23
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