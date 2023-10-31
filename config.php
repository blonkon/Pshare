<?php

class Operation
{
    private $con;
    public function __construct(){
    try {
        $this->con=new PDO('mysql:host=localhost;dbname=pshare;charset=utf8','root','');
        // echo"La connexion est etablie!!!";
    } catch (PDOException $error1) 
    {
        // echo "La connexion a echouée";
    }
    }
    public function Enregistrement_user(string $nom,string $email,string $mdp,string $competence,string $niveau,string $img,string $cv)
       {
         if($this->con)
         {
            $con=$this->con->prepare("INSERT INTO users VALUES('',?,?,?,?,?,?,?)");
            $con->execute(array($nom,$email,$mdp,$competence,$niveau,$img,$cv));
            $con->closeCursor();
         }
       }

       public function Stocks_iduser(string $nom_complet,string $mail)
       {
         if($this->con)
         {
            $con=$this->con->prepare("SELECT num_users FROM users WHERE nom_complet=? AND email_user=?");
            $data=$con->execute(array($nom_complet,$mail));
            $data=$con->fetchAll(PDO::FETCH_ASSOC);
            if(count($data)>0)
             {
               foreach($data as $lidata)
               {
                  $id_user=$lidata['num_users'];
  
               }    

             }
             return $id_user;
             $con->closeCursor();
           
         }
       
       }

       public function Suppression_compte(string $nom_complet,string $email)
       {
         if($this->con)
         {
            $con=$this->con->prepare("DELETE  FROM users WHERE nom_complet=? AND email_user=?");
            $con->execute(array($nom_complet,$email));
            $con->closeCursor();
         }
       }


       public function Afficher_compte()
       {
         if($this->con)
         {
            $con=$this->con->prepare("SELECT * FROM users");
            $data=$con->execute(array());
            $data=$con->fetchAll(PDO::FETCH_ASSOC);
            return $data;
            $con->closeCursor();
         }
       }

       public function Ajout_projet(int $id_user,string $nom_projet,string $domaine,string $statut,string $description,string $cahier)
       {
         if($this->con)
         {
            $con=$this->con->prepare("INSERT INTO users VALUES('',?,?,?,?,?,?)");
            $con->execute(array($id_user,$nom_projet,$domaine,$statut,$description,$cahier));
            $con->closeCursor();
         }
       }

       
       public function Suppression_projet(string $nom_projet,string $cahier)
       {
         if($this->con)
         {
            $con=$this->con->prepare("DELETE  FROM projet WHERE nom_pt=? AND cahier=?");
            $con->execute(array($nom_projet,$cahier));
            $con->closeCursor();
         }
       }

       public function Modifier_infos(string $nom_complet, string $email,string $mdp,string $competence,string $niveau,string $img,string $cv,string $last_email,string $last_mdp)
       {
         if($this->con)
         {
            $con=$this->con->prepare("UPDATE users SET nom_complet=?,email_user=?,mdp_user=?,competence=?,niveau=?,img=?,cv=? WHERE email_user=?,mdp_user=?");
            $con->execute(array($nom_complet,$email,$mdp,$competence,$niveau,$img,$cv,$last_email,$last_mdp));
            $con->closeCursor();
         }
       }


      
       public function Modifier_projet(int $id_user,string $nom_projet,string $domaine,string $statut,string $description,string $cahier,string $last_nom_projet,string $last_cahier)
       {
         if($this->con)
         {
            $con=$this->con->prepare("UPDATE projet SET num_users=?,nom_pt=?,domaine=?,statut=?,description=?,cahier=? WHERE nom_pt=?,cahier=?");
            $con->execute(array($id_user,$nom_projet,$domaine,$statut,$description,$cahier,$last_nom_projet,$last_cahier));
            $con->closeCursor();
         }
       }

  
    
       public function Connexion(string $mail,string $mdp)
       {
         if($this->con)
         {
            $con=$this->con->prepare("SELECT * FROM users WHERE email_user=? AND mdp_user=?");
            $con->execute(array($mail,$mdp));
            $data=$con->fetchAll(PDO::FETCH_ASSOC);
            return $data;
            $con->closeCursor();
         }
       }
        
       public function Afficher_projet()
       {
         if($this->con)
         {
            $con=$this->con->prepare("SELECT * FROM projet");
            $data=$con->execute(array());
            $data=$con->fetchAll(PDO::FETCH_ASSOC);
            return $data;
            $con->closeCursor();
         }
       }

      }

?>