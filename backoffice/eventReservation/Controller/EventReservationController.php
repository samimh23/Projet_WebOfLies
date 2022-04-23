<?php
    require 'database.php';
	include_once dirname(__FILE__).'/../Model/EventReservation.php';

    class EventReservationController {
        
        public function displayliste()
        {
            $sql = "SELECT er.id_client,er.name,er.prenom,er.email,e.name as eventName FROM eventreservation er INNER JOIN event e ON er.id_event=e.id";
            $db = database::getConnexiondb();
			try{
                return $db->query($sql);
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
        }

        /*public function getEvent($id)
        {
            $sql = "SELECT * FROM event WHERE id= :id LIMIT 1";
            $db = db::getConnexion();
			try{
                $query = $db->prepare($sql);
                $query->execute([
                    'id' => $id
                ]);
				return $query->fetch();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			} 
        }*/

        public function addReservation(EventReservation $eventReservation,$id)
        {
            $sql="INSERT INTO eventreservation (id_event,name, prenom, email) VALUES (:id,:name,:prenom,:email)";
			$db = database::getConnexiondb();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id' => $id,
					'name' => $eventReservation->getLastname(),
					'prenom' => $eventReservation->getFirstname(),
					'email' => $eventReservation->getEmail()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}	
        }
		/*public function updateEvent(Event $event, $id,$picture)
		{
            $targetDir = dirname(__DIR__).'\uploads\\';
            $fileName = uniqid() . '-' . basename($picture["name"]);
            $targetFilePath = $targetDir . $fileName;
            if(move_uploaded_file($picture["tmp_name"], $targetFilePath)){
                $event->setPicture($fileName);
            }
			$sql="UPDATE event SET name=:name, date=:date, location=:location, price=:price , description=:description, picture=:picture WHERE id=:id";
			$db = db::getConnexion();
			try
			{
				$query = $db->prepare($sql);
				$query->execute([
					'name' => $event->getName(),
					'date' => $event->getDate(),
					'location' => $event->getLocation(),
					'price' => $event->getPrice(),
					'description' => $event->getDescription(),
                    'picture' => $event->getPicture(),
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			}catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}	
		}*/
		public function supprimerEvent($email,$id)
		{
			$sql="DELETE FROM eventreservation WHERE email=:email AND id_event=:id_event";
			$db = db::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':email', $email);
			$req->bindValue(':id_event', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
    }
?>