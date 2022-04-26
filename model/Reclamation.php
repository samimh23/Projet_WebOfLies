<?php
class Reclamation 
{

  
	private $id;
	private $email;
	private $objet;
	private $contenu;
	

	function __construct($email,$objet,$contenu)
	{
    
        $this->email=$email ;
        $this->objet=$objet;
		$this->contenu=$contenu;	
	}
    

	function getid()
	{
		return $this->id;
	}
    function getemail(){
		return $this->email;
	}
	function getobjet(){
		return $this->objet;
	}
	function getcontenu(){
		return $this->contenu;
	}
    
	
	
	

	function setemail($email){
		$this->email=$email;
	}
    function setobjet($objet){
		$this->objet=$objet;
	}
    function setcontenu($contenu)
    {
        $this->contenu=$contenu;
    }	
	
	

}

?>