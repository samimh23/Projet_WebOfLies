<?php
require_once 'config.php';
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
function ajouterutilisateur($utilisateur){
    // $code = rand(0, 1000);
    $sql="INSERT INTO user (nom, prenom, email, pwd) VALUES (:nom,:prenom,:email,:pwd)";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->execute([
           // 'id' => $utilisateur->getId(),
            'nom' => $utilisateur->getNom(),
            'prenom' => $utilisateur->getPrenom(),
            'email' => $utilisateur->getEmail(), 
            'pwd' => $utilisateur->getPassword()
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
function modifierutilisateur($utilisateur, $email){
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE user SET 
                nom= :nom, 
                prenom= :prenom, 
                pwd= :pwd 
            WHERE email= :email'
        );
        $query->execute([
            'nom' => $utilisateur->getNom(),
            'prenom' => $utilisateur->getPrenom(),
            'pwd' => $utilisateur->getPassword(),
            'email' => $email  
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";?>
        <script>
            alert('updated successfully');</script>
            <?php
    } catch (PDOException $e) {
        $e->getMessage();
    }
}
}
?>