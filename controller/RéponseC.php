<?php
	include_once "../../config.php";
	require_once '../../model/Réponse.php';


 class réponseC {
   
    function afficherréponse()
    {
        $sql="SElECT * From réponse";
        $db = config::getConnexion();
        try
        {
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }   
    }

    function ajouterréponse($réponse){
        $sql="INSERT INTO réponse (email,objet,contenu,id_reclamation) 
        VALUES (:email,:objet,:contenu,:id_reclamation)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                'email' => $réponse->getemail(),
                'objet' => $réponse->getobjet(),
                'contenu' => $réponse->getcontenu(),
                'id_reclamation' => $réponse->getid_reclamation()
                
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }


     function supprimerréponse($id_réponse){
        $sql="DELETE FROM réponse WHERE id_réponse= :id_réponse";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id_réponse',$id_réponse);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function modifierréponse($réponse, $id_réponse){
        try {

            $query=null;
            $db = config::getConnexion();


            if($réponse->getEmail()==null)
            {
                $query = $db->prepare(
                    'UPDATE produit SET 
                        email = :email, 
                        objet = :objet,
                        contenu = :contenu,
                        id_reclamation= : id_reclamation,
                        
                    WHERE id_réponse= :id_réponse'
                );

                $query->execute([
                    'email' => $réponse->getEmail(),
                    'objet' => $réponse->getObjet(),
                    'contenu' => $réponse->getContenu(),
                    'id_reclamation' => $réponse->getid_reclamation(),
                   
                    
                     ]);

            }
            else {


                $query = $db->prepare(
                    'UPDATE réponse SET 
                        email = :email, 
                        objet = :objet,
                        contenu = :contenu,
                    WHERE id_réponse= :id_réponse'
                );
                $query->execute([
                    'email' => $réponse->getEmail(),
                    'objet' => $réponse->getObjet(),
                    'contenu' => $réponse->getContenu(),
                    'id_reclamation' => $réponse->getid_reclamation(),
                   
                    'id_réponse' => $id_réponse , 
                   
                     ]);

            }
            
            
            

            echo $query->rowCount() . " records UPDATED successfully <br>";

        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function recupererréponse($id_réponse)
    {
        $sql = "SELECT * from  réponse where id_réponse=$id_réponse";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererréponse1($id_réponse){
        $sql="SELECT * from réponse where id_réponse=$id_réponse";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();
            
            $réponse = $query->fetch(PDO::FETCH_OBJ);
            return $réponse;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    // function modifiercommande($commande, $id){
    //     try {
    //         $db = config::getConnexion();
    //         $query = $db->prepare(
    //             'UPDATE commande SET 
    //                 prenom = :prenom, 
    //                 nom = :nom, 
    //                 tel = :tel,
    //                 adresse = :adresse,
                   
                   
    //                 email = :email
                   
                   
    //             WHERE id_réponse= :id'
    //         );
    //         $query->execute([
    //             'prenom' => $commande->getprenom(),
    //             'nom' => $commande->getnom(),
    //             'tel' => $commande->gettel(),
    //             'adresse' => $commande->getadresse(),
         
                
    //             'email' => $commande->getemail(),

               

    //             'id' => $id
    //         ]);
    //         echo $query->rowCount() . " records UPDATED successfully <br>";
    //     } catch (PDOException $e) {
    //         $e->getMessage();
    //     }
    // }
    // function recupereretat($id)
    // {
    //     $sql="SELECT * from commande where id=$id";
    //     $db = config::getConnexion();
    //     try{
    //         $query=$db->prepare($sql);
    //         $query->execute();

    //         $user=$query->fetch();
    //         return $user;
    //     }
    //     catch (Exception $e){
    //         die('Erreur: '.$e->getMessage());
    //     }
    // }

   

   

   

 }
 function modifierréponse($réponse, $id_réponse){
    try {

        $query=null;
        $db = config::getConnexion();


        if($réponse->getImg()==null)
        {
            $query = $db->prepare(
                'UPDATE réponse SET 
                    email = :email, 
                    objet = :objet,
                    contenu = :contenu,
                    id_reclamation = :id_reclamation,
                   
                    
                WHERE id_réponse= :id_réponse'
            );

            $query->execute([
                'email' => $réponse->getemail(),
                'objet' => $réponse->getobjet(),
                'contenu' => $réponse->getcontenu(),
                'id_reclamation' => $réponse->getid_reclamation(),
                'id_réponse' => $id_réponse 
                
                 ]);

        }
        else {


            $query = $db->prepare(
                'UPDATE réponse SET 
                    email = :email, 
                    objet = :objet,
                    contenu = :contenu,
                    id_reclamation = :id_reclamation,
                WHERE id_réponse= :id_réponse'
            );
            $query->execute([
                'email' => $réponse->getemail(),
                'objet' => $réponse->getobjet(),
                'contenu' => $réponse->getcontenu(),
                'id_reclamation' => $réponse->getid_reclamation(),
                    
                'id_réponse' => $id_réponse , 
               
                 ]);

        }
        
        
        

        echo $query->rowCount() . " records UPDATED successfully <br>";

    } catch (PDOException $e) {
        $e->getMessage();
    }
}

function recupererréponse($id_réponse)
		{
			$sql = "SELECT * from  réponse where id_réponse=$id_réponse";
			$db = config::getConnexion();
			try {
				$liste = $db->query($sql);
				return $liste;
			} catch (Exception $e) {
				die('Erreur: ' . $e->getMessage());
			}
		}

		function recupererréponse1($id_réponse){
			$sql="SELECT * from réponse where id_réponse=$id_réponse";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$réponse = $query->fetch(PDO::FETCH_OBJ);
				return $réponse;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}


?>