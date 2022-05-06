<?php
	class Logementres{
		private $id_log=null;
		private $type_log=null;
		private $prix=null;
		private $nbr_eto=null;

		

		
		
		
		
		function __construct($type_log, $nbr_eto, $prix){
			$this->type_log=$type_log;
			$this->nbr_eto=$nbr_eto;
			$this->prix=$prix;
			
		}
		function getId_log(){
			return $this->id_log;
		}
		function gettype_log(){
			return $this->type_log;
		}
		function getNbreto(){
			return $this->nbr_eto;
		}
		function getprix(){
			return $this->prix;
		}
		
        function setID_log(string $id_log){
			$this->id_log=$id_log;
		}
	
		function setType_log(string $type_log){
			$this->type_log=$type_log;
		}
		function setNbreto(string $nbr_eto){
			$this->nbr_eto=$nbr_eto;
		}
		function setprix(float $prix){
			$this->prix=$prix;
		}
		
		
	}


?>