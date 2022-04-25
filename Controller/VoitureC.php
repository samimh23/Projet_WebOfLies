<?php
	include '../config.php';
	include_once '../Model/Voiture.php';
	class VoitureC {

		function affichervoiture(){
			$sql="SELECT * FROM voiture";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimervoiture($matricule){
			$sql="DELETE FROM voiture WHERE matricule=:mat";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':mat', $matricule);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajoutervoiture($voiture){
			$sql="INSERT INTO voiture (matricule, marque,model,couleur,kilometrage,prix,etat) 
			VALUES (:matricule,:marque,:model,:couleur,:kilometrage,:prix,:etat)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					':matricule' => $voiture->getmatricule(),
					':marque' => $voiture->getmarque(),
					':model' => $voiture->getmodel(),
					':couleur' => $voiture->getcouleur(),
					':kilometrage' => $voiture->getkilometrage(),
					':prix' => $voiture->getprix(),
					':etat' => $voiture->getetat()
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function recuperervoiture($matricule){
			$sql="SELECT * from voiture where matricule=:matricule";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute(['matricule'=>$matricule]);

				$voiture=$query->fetch();
				return $voiture;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiervoiture($voiture, $matricule){
			$db = config::getConnexion();

			try {
				$query = $db->prepare(
					'UPDATE voiture SET 
						 
						marque= :marque, 
						model= :model,
						couleur= :couleur,
						kilometrage= :kilometrage, 
						prix= :prix, 
						etat= :etat
						
					WHERE matricule= :matricule'
				);
				$query->execute([
					
					'marque' => $voiture->getmarque(),
					'model' => $voiture->getmodel(),
					'couleur' => $voiture->getcouleur(),
					'kilometrage' => $voiture->getkilometrage(),
					'prix' => $voiture->getprix(),
					'etat' => $voiture->getetat(),
					'matricule' => $matricule
					
				]);	
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>