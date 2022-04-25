<?php
	class reservation{
	
		private $date=null;
		private $jours=null;
		private $mat=null;
		
	
	
		function __construct( $date, $jours, $mat){
			
			$this->date=$date;
			$this->jours=$jours;
			$this->mat=$mat;
		}
			
	
		function getdate(){
			return $this->date;
		}
		function getjours(){
			return $this->jours;
		}
		
		function getmat(){
			return $this->mat;
		}
		
		
		function setdate(string $date){
			$this->date=$date;
		}
		function setjours(float $jours){
			$this->jours=$jours;
		}
		function setmat(string $mat){
			$this->mat=$mat;
		}
		
		}


?>