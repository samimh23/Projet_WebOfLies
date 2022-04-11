<?php
    require 'config.php';
	include_once dirname(__FILE__).'/../Model/Event.php';

    class EventController {
        
        public function index()
        {
            $sql = "SELECT * FROM event";
            $db = db::getConnexion();
			try{
                return $db->query($sql);
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
        }

        public function getEvent($id)
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
        }

        public function new(Event $event,$picture)
        {
            $targetDir = dirname(__DIR__).'\uploads\\';
            $fileName = uniqid() . '-' . basename($picture["name"]);
            $targetFilePath = $targetDir . $fileName;
            if(move_uploaded_file($picture["tmp_name"], $targetFilePath)){
                $event->setPicture($fileName);
            }
            $sql="INSERT INTO event (name, date, location, price, description, picture) VALUES (:name,:date,:location, :price, :description, :picture)";
			$db = db::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'name' => $event->getName(),
					'date' => $event->getDate(),
					'location' => $event->getLocation(),
					'price' => $event->getPrice(),
					'description' => $event->getDescription(),
                    'picture' => $event->getPicture()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}	
        }
		public function updateEvent(Event $event, $id,$picture)
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
		}
		public function supprimerEvent($id)
		{
			$sql="DELETE FROM event WHERE id=:id";
			$db = db::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
    }
?>