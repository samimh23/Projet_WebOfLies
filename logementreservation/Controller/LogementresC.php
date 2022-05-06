e<?php
	include '../../config.php';
	include_once '../Model/Logementres.php';
	class LogementresC {
		function afficherLogementres(){
			$sql="SELECT * FROM logementreservation";
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
		function ajouterlogementres(Logementres $logementres){
			$sql="INSERT INTO logementreservation (type_log, nbr_eto, prix) 
			VALUES (:type_log, :Nbr_eto, :prix)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					':type_log' => $logementres->gettype_log(),
					':Nbr_eto' => $logementres->getNbreto(),
					':prix' => $logementres->getprix()
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
		public function getEvent($id)
        {
            $sql = "SELECT * FROM logementreservation WHERE id_log= :id_log LIMIT 1";
            $db = config::getConnexion();
			try{
                $query = $db->prepare($sql);
                $query->execute([
                    'id_log' => $id
                ]);
				return $query->fetch();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			} 
        }
		function modifierlogement(Logementres $Logementres, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE logementreservation SET 
						
						
                        nbr_eto=:nbr_eto,prix=:prix
					WHERE id_log= :id_log'
				);
				$query->execute([
					
					//':type_log' => $Logementres->gettype_log(),
					':Nbr_eto' => $Logementres->getNbreto(),
					':prix' => $Logementres->getprix(),
                    'id_log'=>$id
					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		/*public function supprimerlogement($email)
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
		}*/

	}
?>