<?php
	class Logement{
		private $code_log=null;
		private $type_log=null;
		private $date_debut=null;
		private $nb_jours=null;

		private $email=null;

		
		
		
		
		function __construct($code_log, $type_log, $date_debut, $nb_jours,$email){
			$this->code_log=$code_log;
			$this->type_log=$type_log;
			$this->date_debut=$date_debut;
			$this->nb_jours=$nb_jours;
			$this->email=$email;
			
		}
		function getCode_log(){
			return $this->code_log;
		}
		function getType_log(){
			return $this->type_log;
		}
		function getDate_debut(){
			return $this->date_debut;
		}
		function getNb_jours(){
			return $this->nb_jours;
		}
		function getEmail(){
			return $this->email;
		}

		
        function setCode_log(string $code_log){
			$this->code_log=$code_log;
		}
	
		function setType_log(string $type_log){
			$this->type_log=$type_log;
		}
		function setDate_debut(string $date_debut){
			$this->date_debut=$date_debut;
		}
		function setNb_jours(float $nb_jours){
			$this->nb_jours=$nb_jours;
		}
		function setEmail(string $email){
			$this->email=$email;
		}
		
		
		
	}


?>