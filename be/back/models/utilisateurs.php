<?php

class utilisateur{
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $pwd;   

    function __construct($nom, $prenom, $email, $pwd){
		$this->nom=$nom;
		$this->prenom=$prenom;
        $this->pwd=$pwd;

        $this->email=$email;
            }
function getId(){
    return $this->id;
}
function getEmail(){
    return $this->email;
}
function getPassword(){
    return $this->pwd;
}
function getPrenom(){
    return $this->prenom;
}
function getNom(){
    return $this->nom;
}
}
?>