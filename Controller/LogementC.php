<?php
	include '../config.php';
	include_once '../Model/Logement.php';
	class LogementC {
		function afficherLogement(){
			$sql="SELECT * FROM logement";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
	/*function supprimeradherent($NumAdherent){
			$sql="DELETE FROM adherent WHERE NumAdherent=:NumAdherent";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':NumAdherent', $NumAdherent);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}*/
		function ajouterlogement($logement){
			$sql="INSERT INTO logement (code_log, type_log, date_debut, nb_jours, email) 
			VALUES (:Cod,:Type_log,:Date_debut, :Nb_jours, :email)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					':Cod' => $logement->getCode_log(),
					':Type_log' => $logement->getType_log(),
					':Date_debut' => $logement->getDate_debut(),
					':Nb_jours' => $logement->getNb_jours(),
					':email' => $logement->getEmail()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		/*function recupereradherent($NumAdherent){
			$sql="SELECT * from adherent where NumAdherent=$NumAdherent";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$adherent=$query->fetch();
				return $adherent;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}*/
		
		function modifierlogement($logement, $code_log){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE logement SET 
						
						Date_debut= :Date_debut,
                        nb_jours=:nb_jours
					WHERE = :code_log'
				);
				$query->execute([
					
					'Date_debut' => $logement->getDate_debut(),
					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		public function supprimerlogement($email)
		{
			$sql="DELETE FROM logement WHERE email=:email";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':email', $email);
			
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}

	}
?>