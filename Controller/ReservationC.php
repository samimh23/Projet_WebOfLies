<?php
	include '../config.php';
	include_once '../Model/Reservation.php';
	class ReservationC {
		function afficherreservation(){
			$sql="SELECT * FROM reservation";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}

		function recupererprix($matricule){
			$sql="SELECT * from voiture where matricule=:matricule";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute(['matricule'=>$matricule]);

				$prix=$query->fetch();
				return $prix;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function recuperermatricules(){
			$sql="SELECT * from voiture";
			$db = config::getConnexion();
			try{

				

				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		
		function supprimerreservation($code){
			$sql="DELETE FROM reservation WHERE code=:code";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':code', $code);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterreservation($reservation){
			$sql="INSERT INTO reservation ( datee, jours, matricule) 
			VALUES (:datee,:jours, :matricule)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					
					':datee' => $reservation->getdate(),
					':jours' => $reservation->getjours(),
					':matricule' => $reservation->getmat()
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererreservation($code){
			$sql="SELECT * from reservation where code=:code";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute(['code'=>$code]);

				$reservation=$query->fetch();
				return $reservation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierreservation($reservation, $code){
			$db = config::getConnexion();

			try {
				$query = $db->prepare(
					'UPDATE reservation SET 
						 
						datee= :datee, 
						jours= :jours, 
						mat= :mat
						
					WHERE code= :code'
				);
				$query->execute([
					
					'datee' => $reservation->getdate(),
					'jours' => $reservation->getjours(),
					'mat' => $reservation->getmat(),
					'code' => $code
					
				]);	
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>