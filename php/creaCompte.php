<?php
  if(isset($_POST['send1'])){
    if(isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['comp']) && isset($_POST['classe']) && isset($_FILES['img']) && isset($_FILES['cv'])){
       
            $file_name = $_FILES['cv']['name'];
            $file_extension = strrchr($file_name, ".");
            echo 'Nom: '.$file_name.'</br>';
            echo 'Extension: '.$file_extension.'</br>';
       
       
        
    }
    var_dump($_FILES);
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
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
    <div class="sidebar">
        <details class="list2-1">
            <summary>Compte individuel </summary>   
                <nav>
                    <ul>
                     <section id="contact">
                        <div class="login-form2">   
                        <form action="" method="post" id="form_2">
                           <input type="text" name="nom" placeholder="Entrer le nom complet"><br>
                           <input type="text" name="email" placeholder="Adresse@gmail.com"><br>
                           <input type="password" name="mdp" placeholder="Password"><br>
                           <input type="text" name="comp" placeholder="Renseigner les competences"><br><br>
                           <h5><label >Selectionner le niveau d'etude:</label>
                           <select name="classe" form="form_2">
                              <option value="Licence">Licence</option>
                              <option value="Master">Master</option>
                              <option value="Doctorat">Doctorat</option>
                           </select></h5><br><br>
                           <label>Ajouter une image</label>
                           <input type="file" name="img" ><br> 
                           <label>Ajouter votre CV</label>   
                           <input type="file" name="cv" ><br>
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
                            <form action="#" method="post" id="form-4">
                            <input type="text" name="nom" placeholder="Nom Entreprise/Etablissement"><br>
                           <input type="text" name="email" placeholder="Adresse@gmail.com"><br>
                           <input type="password" name="mdp" placeholder="Password"><br>
                           <label>Ajouter une image</label>
                           <input type="file" name="img" ><br>    
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