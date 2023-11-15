<?php
session_start();

if (!isset( $_SESSION["num_users"])) {
    header("Location: index.php");
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/profil.css">
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
                <li style="background-color: #fff ;">
                    <img src="./image/chat2.svg">
                    <a href="#" style="color: #06708e;"> Messages</a>
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
                    <img src="./image/profile.svg">
                    <a href="logout.php">Deconnexion</a>
                    
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
    <script src="./js/chat.js"></script>
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