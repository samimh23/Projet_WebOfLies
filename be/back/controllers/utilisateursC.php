<?php
require_once '../config.php';
include_once '../models/utilisateurs.php';
class utilisateurc{
    function recupererutilisateur(){
        $sql="SELECT * FROM user";
        $db = config::getConnexion();
        try{
            $listeutilisateurs = $db->query($sql);
            return $listeutilisateurs;
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMessage());
    }
    
}
function ajouterutilisateur($user){
    $sql="INSERT INTO user (nom, prenom, email, pwd) VALUES (:nom,:prenom,:email,:pwd)";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->execute([
           // 'id' => $user->getId(),
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'email' => $user->getEmail(), 
            'pwd' => $user->getPassword()
        ]);			
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }			
}
function supprimerutilisateur($id){
    $sql="DELETE FROM user WHERE id=:id";
    $db = config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(':id', $id);
    try{
        $req->execute();
    }
    catch(Exception $e){
        die('Erreur:'. $e->getMessage());
    }
}
function recupererutilisateurinfo($id){
    $sql="SELECT * from user where id=$id";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute();

        $utilisateur=$query->fetch();
        return $utilisateur;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}
function modifierutilisateur($user, $id){
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE user SET 
                nom= :nom, 
                prenom= :prenom, 
                email= :email,
                pwd= :pwd 
            WHERE id= :id'
        );
        $query->execute([
            'id' => $id,
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'email' => $user->getEmail(),
            'pwd' => $user->getPassword()
            
        ]);



        //echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        $e->getMessage();
    }
}



}
?>