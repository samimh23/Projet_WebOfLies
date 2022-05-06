<?php
	include_once "../../config.php";
	require_once '../../model/Réponse.php';


 class réponseC {
   
    function afficherréponse($id)
    {
        $sql="SElECT * From réponse where id_reclamation=".$id;
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
    function afficherreponse()
    {
        $sql="SElECT * From réponse ";
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
        $sql2="UPDATE reclamation set etat = 1  where id =".$réponse->getid_reclamation(); 
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query2 = $db->prepare($sql2);
        
            $query->execute([
                'email' => $réponse->getemail(),
                'objet' => $réponse->getobjet(),
                'contenu' => $réponse->getcontenu(),
                'id_reclamation' => $réponse->getid_reclamation()
                
            ]);	
            $query2->execute();		
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }


     

    function supprimerréponse($id){
        $sql="DELETE FROM réponse WHERE id_réponse= :id";
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

    function recupererreclamation($id_réponse){
        $sql="SELECT * from reclamation where id_réponse=$id_réponse";
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

    
    function modifierréponse($réponse, $id_réponse){
       
        $sql="UPDATE réponse set email =:email ,objet=:objet ,contenu=:contenu where id_réponse=".$id_réponse;
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                'email' => $réponse->getemail(),
                'objet' => $réponse->getobjet(),
                'contenu' => $réponse->getcontenu()
                
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }	


        
    }

   

   

   

 
 

    
		
}

?>