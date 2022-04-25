<?php
	class voiture{
		private $matricule=null;
		private $marque=null;
		private $model=null;
        private $couleur=null;
        private $kilometrage=null;
		private $prix=null;
        private $etat=null;
		
	
		private $password=null;
		function __construct($matricule, $marque, $model,$couleur,$kilometrage,$prix,$etat){
			$this->matricule=$matricule;
			$this->marque=$marque;
			$this->model=$model;
            $this->couleur=$couleur;
            $this->kilometrage=$kilometrage;
			$this->prix=$prix;
            $this->etat=$etat;
		}
			
		function getmatricule(){
			return $this->matricule;
		}
		function getmarque(){
			return $this->marque;
		}
		function getmodel(){
			return $this->model;
		}
        function getcouleur(){
			return $this->couleur;
		}
        function getkilometrage(){
			return $this->kilometrage;
		}
		
		function getprix(){
			return $this->prix;
		}
        function getetat(){
			return $this->etat;
		}
		
		function setmatricule(string $matricule){
			$this->matricule=$matricule;
		}
		function setmarque(string $marque){
			$this->marque=$marque;
		}
		function setmodel(string $model){
			$this->model=$model;
		}
        function setcouleur(string $couleur){
			$this->couleur=$couleur;
		}
        function setkilometrage(float $kilometrage){
			$this->kilometrage=$kilometrage;
		}
		function setprix(float $prix){
			$this->prix=$prix;
		}
        function setetat(string $etat){
			$this->etat=$etat;
		}
		
		}


?>