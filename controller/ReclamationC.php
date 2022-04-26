<?php
	include_once "../../config.php";
	require_once '../../model/Reclamation.php';


 class reclamationC {
   
    function afficherreclamation()
    {
        $sql="SElECT * From reclamation";
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

    function ajouterreclamation($reclamation){
        $sql="INSERT INTO reclamation (email,objet,contenu) 
        VALUES (:email,:objet,:contenu)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                'email' => $reclamation->getemail(),
                'objet' => $reclamation->getobjet(),
                'contenu' => $reclamation->getcontenu()
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }


     function supprimerreclamation($id){
        $sql="DELETE FROM reclamation WHERE id= :id";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id',$id);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function modifierreclamation($reclamation, $id){
        try {

            $query=null;
            $db = config::getConnexion();


            if($reclamation->getEmail()==null)
            {
                $query = $db->prepare(
                    'UPDATE produit SET 
                        email = :email, 
                        objet = :objet,
                        contenu = :contenu,
                        
                        
                    WHERE id = :id'
                );

                $query->execute([
                    'email' => $reclamation->getEmail(),
                    'objet' => $reclamation->getObjet(),
                    'contenu' => $reclamation->getContenu(),
                    
                    'id' => $id  
                    
                     ]);

            }
            else {


                $query = $db->prepare(
                    'UPDATE reclamation SET 
                        email = :email, 
                        objet = :objet,
                        contenu = :contenu,
                    WHERE id = :id'
                );
                $query->execute([
                    'email' => $reclamation->getEmail(),
                    'objet' => $reclamation->getObjet(),
                    'contenu' => $reclamation->getContenu(),
                    'id' => $id  , 
                   
                     ]);

            }
            
            
            

            echo $query->rowCount() . " records UPDATED successfully <br>";

        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function recupererreclamation($id)
    {
        $sql = "SELECT * from  reclamation where id=$id";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererReclamation1($id){
        $sql="SELECT * from reclamation where id=$id";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();
            
            $reclamation = $query->fetch(PDO::FETCH_OBJ);
            return $reclamation;
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
                   
                   
    //             WHERE id = :id'
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
 function modifierreclamation($reclamation, $id){
    try {

        $query=null;
        $db = config::getConnexion();


        if($reclamation->getImg()==null)
        {
            $query = $db->prepare(
                'UPDATE reclamation SET 
                    email = :email, 
                    objet = :objet,
                    contenu = :contenu,
                   
                    
                WHERE id = :id'
            );

            $query->execute([
                'email' => $reclamation->getemail(),
                'objet' => $reclamation->getobjet(),
                'contenu' => $reclamation->getcontenu(),
                'id' => $id  
                
                 ]);

        }
        else {


            $query = $db->prepare(
                'UPDATE reclamation SET 
                    email = :email, 
                    objet = :objet,
                    contenu = :contenu,
                   
                WHERE id = :id'
            );
            $query->execute([
                'email' => $reclamation->getemail(),
                'objet' => $reclamation->getobjet(),
                'contenu' => $reclamation->getcontenu(),
                    
                'id' => $id  , 
               
                 ]);

        }
        
        
        

        echo $query->rowCount() . " records UPDATED successfully <br>";

    } catch (PDOException $e) {
        $e->getMessage();
    }
}

function recupererreclamation($id)
		{
			$sql = "SELECT * from  reclamation where id=$id";
			$db = config::getConnexion();
			try {
				$liste = $db->query($sql);
				return $liste;
			} catch (Exception $e) {
				die('Erreur: ' . $e->getMessage());
			}
		}

		function recupererreclamation1($id){
			$sql="SELECT * from reclamation where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$reclamation = $query->fetch(PDO::FETCH_OBJ);
				return $reclamation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}


?>