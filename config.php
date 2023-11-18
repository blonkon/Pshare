<?php

class Operation
{
    private $con;
    public function __construct(){
    try {
        $this->con=new PDO('mysql:host=localhost:3310;dbname=pshare;charset=utf8','root','');
        // echo"La connexion est etablie!!!";
    } catch (PDOException $error1) 
    {
        // echo "La connexion a echouée";
    }
    }
    public function Enregistrement_user(string $type,string $nom,string $email,string $mdp,string $niveau,string $img,string $cv)
       {
         if($this->con)
         {
            $con=$this->con->prepare("INSERT INTO users VALUES('',?,?,?,?,?,?,?)");
            $con->execute(array($type,$nom,$email,$mdp,$niveau,$img,$cv));
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

       public function Competences_requises(int $id_projet,int $id_competence)
       {
         if($this->con)
         {
            $con=$this->con->prepare("INSERT INTO competences_requises VALUES(?,?)");
            $con->execute(array($id_projet,$id_competence));
            $con->closeCursor();
         }
       }


       public function Ajout_projet(int $id_user,string $nom_projet,string $statut,string $description,string $cahier)
       {
         if($this->con)
         {
            $con=$this->con->prepare("INSERT INTO projet VALUES('',?,?,?,?,?)");
            $con->execute(array($id_user,$nom_projet,$statut,$description,$cahier));
            $lastInsertedId = $this->con->lastInsertId();

            $con->closeCursor();
    
            // Retourner l'id du dernier enregistrement inséré
            return $lastInsertedId;         }
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
            $con=$this->con->prepare("SELECT * FROM projet,users WHERE projet.num_users=users.num_users");
            $data=$con->execute(array());
            $data=$con->fetchAll(PDO::FETCH_ASSOC);
            return $data;
            $con->closeCursor();
         }
       }

       public function Afficher_projet_by_competence($id_user)
       {
         if($this->con)
         {
            $con=$this->con->prepare("SELECT DISTINCT users.num_users,users.nom_complet,competence.nom_comp,projet.nom_pt,projet.statut 
            FROM users,competence,avoir_competence,projet,competences_requises  WHERE  avoir_competence.num_users=users.num_users 
            AND avoir_competence.id_comp=competence.id_comp AND competence.id_comp=competences_requises.id_comp 
            AND competences_requises.idd_pt=projet.idd_pt AND users.num_users=?");
            $data=$con->execute(array($id_user));
            $data=$con->fetchAll(PDO::FETCH_ASSOC);
            //si le data est emtpy
            return $data;
            $con->closeCursor();
         }
       }

       public function Afficher_projet_proprio($nom_projet)
       {
         if($this->con)
         {
            $con=$this->con->prepare("SELECT projet.nom_pt,users.nom_complet FROM users,projet 
            WHERE projet.num_users=users.num_users AND projet.nom_pt=?");
            $data=$con->execute(array($nom_projet));
            $data=$con->fetchAll(PDO::FETCH_ASSOC); 
            return $data;
            $con->closeCursor();
            }
            
             
       }
      
       public function Stocks_idprojet($nom)
       {
         if($this->con)
         {
            $con=$this->con->prepare("SELECT idd_pt FROM projet WHERE nom_pt=? ");
            $data=$con->execute(array($nom));
            $data=$con->fetchAll(PDO::FETCH_ASSOC);
            if(count($data)>0)
             {
               foreach($data as $lidata)
               {
                  $id_projet=$lidata['idd_pt'];
  
               }    

             }
             return $id_projet;
             $con->closeCursor();
           
         }
       
       }

       public function Stocks_competenceid($nom)
       {
         if($this->con)
         {
            $con=$this->con->prepare("SELECT id_comp FROM competence WHERE nom_comp=? ");
            $data=$con->execute(array($nom));
            $data=$con->fetchAll(PDO::FETCH_ASSOC);
            if(count($data)>0)
             {
               foreach($data as $lidata)
               {
                  $id_competence=$lidata['id_comp'];
  
               }    

             }
             return $id_competence;
             $con->closeCursor();
           
         }
       
       }

       public function Afficher_competences_requises($id_projet)
       {
         if($this->con)
         {
            $con=$this->con->prepare("SELECT competence.nom_comp FROM competence,competences_requises,projet 
            WHERE competence.id_comp=competences_requises.id_comp 
            AND projet.idd_pt=competences_requises.idd_pt AND projet.idd_pt=?");
            $data=$con->execute(array($id_projet));
            $data=$con->fetchAll(PDO::FETCH_ASSOC);   
             return $data;
             $con->closeCursor();
         }
       }
    

       public function Total_card()
       {
         if($this->con)
         {
            $con=$this->con->prepare("SELECT COUNT(projet.statut) AS total FROM projet ");
            $data=$con->execute(array());
            $data=$con->fetchAll(PDO::FETCH_ASSOC);
            $con->closeCursor();
            if(count($data)>0)
             {
               foreach($data as $lidata)
               {
                  $total=$lidata['total'];
  
               }    

             }
             return $total;
             $con->closeCursor();
         }
       }

       public function Actif_card()
       {
         if($this->con)
         {
            $con=$this->con->prepare("SELECT COUNT(projet.statut) AS actif FROM projet WHERE projet.statut='actif'");
            $data=$con->execute(array());
            $data=$con->fetchAll(PDO::FETCH_ASSOC);
            $con->closeCursor();
            if(count($data)>0)
             {
               foreach($data as $lidata)
               {
                  $actif=$lidata['actif'];
  
               }    

             }
             return $actif;
             $con->closeCursor();
         }
       }

       public function Close_card()
       {
         if($this->con)
         {
            $con=$this->con->prepare("SELECT COUNT(projet.statut) AS clos FROM projet WHERE projet.statut='clos'");
            $data=$con->execute(array());
            $data=$con->fetchAll(PDO::FETCH_ASSOC);
            $con->closeCursor();
            if(count($data)>0)
             {
               foreach($data as $lidata)
               {
                  $clos=$lidata['clos'];
  
               }    

             }
             return $clos;
             $con->closeCursor();
         }
       }

       public function Recherche_by_name($donnee)
       {
         if($this->con)
         {
          $con=$this->con->prepare("SELECT * FROM projet,users WHERE projet.num_users=users.num_users AND users.nom_complet LIKE ?");
          $data=$con->execute(array($donnee));
          $data=$con->fetchAll(PDO::FETCH_ASSOC);
          return $data;
          $con->closeCursor();
         }
       }

      }

?>